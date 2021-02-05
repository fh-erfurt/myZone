<?php


namespace dwp\controllers;

use dwp\models\UserLogin;
use dwp\models\Customer;

/**
 * Class ProfileController
 *
 * Controller used for all functions affecting the session and current user like login and edit.
 *
 * @package dwp\controllers
 */
class ProfileController extends \dwp\core\Controller
{
    private $validationErrorMessages = [
        'firstName'       =>       'Vorname ungültig. (max. 50 Zeichen, Groß- und Kleinbuchstaben)',
        'lastName'        =>      'Nachname ungültig. (max. 50 Zeichen, Groß- und Kleinbuchstaben)',
        'email'           =>         'Email ungültig. (max. 45 Zeichen)',
        'phone'           => 'Telefonnummer ungültig. (max. 25 Zeichen)',
        'username'        =>    'Nutzername ungültig. (3-25 Zeichen: Buchstaben, Zahlen, Bindestriche.)',
        'newPassword'     =>      'Passwort ungültig. (8-25 Zeichen, jeweils 2 Groß- und Kleinbuchstaben, 2 Zahlen und 2 Sonderzeichen benötigt)',
        'confirmPassword' => 'Passwörter müssen übereinstimmen.',
        'password'     => 'Passwort ist falsch! Bitte versuchen Sie es noch einmal.'
    ];

    /**
     * validates the given string based on the given type.
     * @param String $validationType    type of the string to be validated
     * @param String $input             string to be validated
     * @return false|int
     */
    public function validateInput(String $validationType, String $input)
    {
        // regular expressions to be used for input validation
        $nameRegEx        = '/^[a-zA-Z]+$/m';
        $emailRegEx       = '/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/m';
        $phoneRegEx       = '/^[0-9]*$/m';
        $usernameRegEx    = '/^([a-zA-Z0-9-]){3,25}$/m';
        $newPasswordRegEx = '/^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,25}$/m';

        // decide which conditions need to be met for a valid input
        switch($validationType)
        {
            case 'firstName':
            case 'lastName' :
                return                  preg_match($nameRegEx,     $input) && mb_strlen($input) <= 50;
            case 'email':
                return                  preg_match($emailRegEx,    $input) && mb_strlen($input) <= 45;
            case 'phone':
                return empty($phone) || preg_match($phoneRegEx,    $input) && mb_strlen($input) <= 25;
            case 'username':
                return                  preg_match($usernameRegEx, $input); # length in RegEx
            case 'newPassword':
                return                  preg_match($newPasswordRegEx, $input); # length in RegEx
            default:
                return false;
        }
    }

    /**
     * used to validate all fields in the given form (given that the array indexes match those in the validateInput() function)
     * and also compare the password and confirm password fields.
     * sets errors in given array.
     * @param $fields
     * @param $errors
     * @param string[] $except
     */
    public function validateForm($fields, &$errors, $except = ['confirmPassword'])
    {
        foreach($fields as $key => $value)
        { if(!in_array($key, $except) && !$this->validateInput($key, $value)) $errors[] = $this->validationErrorMessages[$key]; }
    }

    /**
     * used to check if any field in the given form are empty
     * sets errors in given array.
     * @param $fields
     * @param $errors
     * @param array $except
     */
    public function checkIfFieldsAreSet($fields, &$errors, $except = [])
    {
        foreach($fields as $key => $value)
        {
            // don't check fields in the exceptions array
            if(!in_array($key, $except) && (empty($value) || mb_strlen($value) < 2))
            { $errors[] = 'Alle Felder, die mit * markiert sind, müssen ausgefüllt sein.'; break; }
        }
    }

    public function findExistingUsersAndCustomers($email, $username)
    {
        $db = $GLOBALS['db'];
        return Customer:: selectWhere('email = '.   $db->quote($email))
             + UserLogin::selectWhere('username = '.$db->quote($username));
    }

    /**
     * takes an array of data with user and customer information and saves it into the database, if inputs are valid.
     * if given, looks for id first to decide between INSERT and UPDATE.
     * @param $customerData
     * @param $userLoginData
     * @param $sqlErrors
     */
    public function validateCustomerAndUserLoginAndSaveToDB($customerData, $userLoginData, &$sqlErrors)
    {
        $db = $GLOBALS['db'];
        // create and validate new customer and user login objects from given data
        $newCustomer  = new Customer($customerData);
        $newUserLogin = new UserLogin($userLoginData);
        // validate objects before saving them
        if ($newCustomer->validate($sqlErrors) === true && $newUserLogin->validate($sqlErrors) === true)
        {
            $newCustomer->save($sqlErrors);
            if (empty($sqlErrors) && !empty($userLoginData))
            {
                // get the id of the created customer and add field customer to user login to connect the table entries via foreign key
                // if the user is logged in, get the customer id from the session
                $newUserLogin->customer = $this->loggedIn()
                    ? $_SESSION['currentUser']['customerId']
                    : Customer::select('id','WHERE email ='.$db->quote($customerData['email']))[0]->id;

                $newUserLogin->save($sqlErrors);
            }
        }
    }

    public function updateCurrentUserInSessionWithUserLoginData($loginData)
    {
        $customerData = Customer::selectWhere("id = ".$loginData->{'customer'})[0];
        $_SESSION['currentUser'] = [
            'username'   => $loginData->{'username'},
            'userId'     => $loginData->{'id'},
            'customerId' => $customerData->{'id'},
            'firstName'  => $customerData->{'firstName'},
            'lastName'   => $customerData->{'lastName'},
            'email'      => $customerData->{'email'},
            'phone'      => $customerData->{'phone'}
        ];
    }

    public function updateCurrentUserInSession() # TODO
    {
        $this->updateCurrentUserInSessionWithUserLoginData(UserLogin::selectWhere("id = ".$GLOBALS['db']->quote(trim($_SESSION['currentUser']['userId'])))[0]);
    }


    ##             ##
    # ActionMethods #
    ##             ##

    public function actionView()
    {
        if(!$this->loggedIn()) header('Location: index.php?c=profile&a=login');
    }

    public function actionEdit()
    {
        if(!$this->loggedIn()) header('Location: index.php?c=profile&a=login');
        else
        {
            // check for a submitted post form
            if(isset($_POST['submitNewData']))
            {
                // initialize array to store errors
                $editErrors = [];

                $passwordShouldBeEdited = isset($_POST['changePassword']);

                $editFields = [
                    // retrieve user inputs
                    'firstName' => trim($_POST['firstName']),
                    'lastName'  => trim($_POST['lastName']),
                    'email'     => trim($_POST['email']),
                    'phone'     => trim($_POST['phone']),
                ];

                // check if the password should be changed
                if($passwordShouldBeEdited)
                {
                    // add password fields to array
                    $editFields['newPassword']     = $_POST['newPassword'];
                    $editFields['confirmPassword'] = $_POST['confirmPassword'];
                }

                // set required field and check if everything is set
                $notRequiredFields  = $passwordShouldBeEdited ? ['phone', 'newPassword', 'confirmPassword'] : ['phone'];
                $this->checkIfFieldsAreSet($editFields, $editErrors, $notRequiredFields);
                // compare passwords
                if($passwordShouldBeEdited && $editFields['newPassword'] !== $editFields['confirmPassword']) $editErrors[] = $this->validationErrorMessages['confirmPassword'];

                if(empty($editErrors))
                {
                    // validate form by calling the function
                    $this->validateForm($editFields, $editErrors, ['oldPassword', 'confirmPassword']);

                    if(empty($editErrors))
                    {
                        $currentUserFromDB = UserLogin::selectWhere('id = '.$_SESSION['currentUser']['userId'])[0];
                        if(password_verify($_POST['oldPassword'], $currentUserFromDB->passwordHash))
                        {
                            // map customer inputs if they are different from current values
                            $customerData = [
                                'id'           => $_SESSION['currentUser']['customerId'],
                                'firstName'    => $editFields['firstName'] == $_SESSION['currentUser']['firstName'] ? null : $editFields['firstName'],
                                'lastName'     => $editFields['lastName']  == $_SESSION['currentUser']['lastName']  ? null : $editFields['lastName'],
                                'email'        => $editFields['email']     == $_SESSION['currentUser']['email']     ? null : $editFields['email'],
                                'phone'        => $editFields['phone']     == $_SESSION['currentUser']['phone']     ? null : $editFields['phone']
                            ];

                            // map password IF password should be changed
                            $userLoginData =
                                $passwordShouldBeEdited ?
                                    [
                                        'id'           => $_SESSION['currentUser']['userId'],
                                        'passwordHash' => password_hash($editFields['newPassword'], PASSWORD_DEFAULT),
                                    ]
                                :
                                    [];

                            // look for users with given username and customers with given email
                            if(empty($this->findExistingUsersAndCustomers($customerData['email'], '')))
                            {
                                $sqlErrors = [];
                                $this->validateCustomerAndUserLoginAndSaveToDB($customerData, $userLoginData, $sqlErrors);

                                if (empty($sqlErrors))
                                {
                                    // update user data in session and redirect to view profile page
                                    $this->updateCurrentUserInSessionWithUserLoginData($currentUserFromDB);
                                    header('Location: index.php?c=profile&a=view');
                                }
                            }
                            else $editErrors[] = 'E-Mail Adresse existiert bereits.';
                        }
                        else $editErrors[] = $this->validationErrorMessages['password'];
                    }
                }
            }

            $this->setParam('sqlErrors' , $sqlErrors  ?? null);
            $this->setParam('editErrors', $editErrors ?? null);
        }
    }

    public function actionLogin()
    {
        if($this->loggedIn()) header('Location: index.php?c=profile&a=view');
        else
        {
            // initialize array to store errors
            $loginErrors = [];

            // check for a submitted post form
            if(isset($_POST['submit']))
            {
                // retrieve inputs
                $username = trim($_POST['username']) ?? '';
                $password = trim($_POST['password']) ?? '';

                if(!empty($username) && !empty($password))
                {
                    // get user data from db
                    $loginData = UserLogin::selectWhere("username = ".$GLOBALS['db']->quote($username))[0] ?? null;

                    // check password
                    if(!empty($loginData) && ($loginData->passwordHash) && password_verify($password, $loginData->passwordHash))
                    {
                        // check if user is validated & enabled
                        if(!$loginData->validated) $loginErrors[] = 'Bitte bestätigen Sie Ihre E-Mail Adresse.';
                        if(!$loginData->enabled)   $loginErrors[] = 'Leider ist Ihr Account vorübergehend deaktiviert, bitte kontaktieren Sie uns für weitere Informationen.';

                        if(empty($loginErrors))
                        {
                            // important variables get stored into the session and loggedIn gets set to true
                            $_SESSION['loggedIn'] = true;
                            $this->updateCurrentUserInSessionWithUserLoginData($loginData);
                            // delete login data to prevent leaks before reloading home page
                            $loginData = null;
                            header('Location: index.php?c=pages&a=home');
                        }
                    }
                    else $loginErrors[] = 'Nutzername oder Passwort ist falsch! Bitte versuchen Sie es noch einmal.';
                }
                else $loginErrors[] = 'Bitte Nutzernamen sowie Passwort eingeben!';
            }

            // set param username to prefill login input field and login errors to be displayed
            $this->setParam('username',    $username    ?? null);
            $this->setParam('loginErrors', $loginErrors ?? null);
        }
    }

    public function actionSignup()
    {
        if($this->loggedIn()) header('Location: index.php?c=profile&a=view');
        else
        {
            // initialize array to store errors
            $signupErrors = [];

            // check for a submitted post form
            if(isset($_POST['submit']))
            {
                $signupFields = [
                    // retrieve user inputs
                    'firstName'       => trim($_POST['firstName']),
                    'lastName'        => trim($_POST['lastName']),
                    'email'           => trim($_POST['email']),
                    'phone'           => trim($_POST['phone']),

                    // retrieve customer inputs
                    'username'        => trim($_POST['username']),
                    // not using trim on passwords because they can have spaces etc. at the beginning and end
                    'newPassword'     =>      $_POST['newPassword'],
                    'confirmPassword' =>      $_POST['confirmPassword']
                ];

                $this->checkIfFieldsAreSet($signupFields, $signupErrors, ['phone']);

                if(empty($signupErrors))
                {
                    // validate form by calling the function
                    $this->validateForm($signupFields, $signupErrors);
                    // compare passwords
                    if($signupFields['newPassword'] !== $signupFields['confirmPassword']) $signupErrors[] = $this->validationErrorMessages['confirmPassword'];

                    // check for occurred errors
                    if(empty($signupErrors))
                    {
                        // map customer inputs
                        $customerData = [
                            'firstName'    => $signupFields['firstName'],
                            'lastName'     => $signupFields['lastName'],
                            'email'        => $signupFields['email'],
                            'phone'        => $signupFields['phone']
                        ];

                        // map userLogin inputs
                        $userLoginData = [
                            'username'     =>               $signupFields['username'],
                            'passwordHash' => password_hash($signupFields['newPassword'], PASSWORD_DEFAULT),
                            'validated'    => 0,
                            'enabled'      => 1
                        ];

                        // look for users with given username and customers with given email
                        if(empty($this->findExistingUsersAndCustomers($customerData['email'], $userLoginData['username'])))
                        {
                            $sqlErrors = [];
                            $this->validateCustomerAndUserLoginAndSaveToDB($customerData, $userLoginData, $sqlErrors);

                            if (empty($sqlErrors))
                            {
                                // get user ID from db to generate a validation link
                                $_SESSION['validateUserID'] = UserLogin::select('id', 'WHERE username ='.$GLOBALS['db']->quote($userLoginData['username']))[0]->id;
                                header('Location: index.php?c=profile&a=login');
                            }
                        }
                        else $signupErrors[] = 'Nutzername oder E-Mail Adresse existiert bereits.';
                    }
                }
            }

            $this->setParam('sqlErrors'   , $sqlErrors    ?? null);
            $this->setParam('signupErrors', $signupErrors ?? null);
        }
    }

    public function actionLogout()
    {
        if(isset($_POST['submit'])) # logout nur über button möglich
        {
            $_SESSION['loggedIn'] = false;
            $_SESSION['currentUser'] = null;
        }
        header('Location: index.php?c=pages&a=home');
    }

    public function actionValidateNewUser()
    {
        $sqlErrors = [];
        $newUserLogin = new UserLogin(['id' => $_GET['uid'], 'validated' => 1]);
        if ($newUserLogin->validate($sqlErrors) === true)
        {
            $newUserLogin->save($sqlErrors);
        }
        else echo $sqlErrors;
        $_SESSION['validateUserID'] = null;
        header('Location: index.php?c=profile&a=login');
    }
}