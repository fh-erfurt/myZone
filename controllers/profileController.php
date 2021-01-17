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
    public function updateCurrentUserInSessionWithLoginData($loginData)
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

    public function updateCurrentUserInSession()
    {
        $this->updateCurrentUserInSessionWithLoginData(UserLogin::selectWhere("id = ".$GLOBALS['db']->quote(trim($_SESSION['currentUser']['userId'])))[0]);
    }

    public function actionView()
    {
        if($this->loggedIn()) $this->setParam($this->action, 'view'); // TODO JGE Codeblock auslagern? (Redundanz)
        else                  header('Location: index.php?c=profile&a=login');
    }

    public function actionEdit()
    {
        if($this->loggedIn()) $this->setParam($this->action, 'edit');
        else                  header('Location: index.php?c=profile&a=login');
    }

    public function actionSubmitEdit()
    {
        $errors = [];
        if($this->loggedIn())
        {
            if(isset($_POST['submitNewData']))
            {
                $newUserLoginParams = [
                    'id'        =>      $_SESSION['currentUser']['userId'] ,
                    'username'  => trim($_POST['username']                )
                ];  # TODO passwort
                $newCustomerParams  = [
                    'id'        =>      $_SESSION['currentUser']['customerId'] ,
                    'firstName' => trim($_POST['firstName']                   ),
                    'lastName'  => trim($_POST['lastName']                    ),
                    'email'     => trim($_POST['email']                       ),
                    'phone'     => trim($_POST['phone']                       )
                ];
                $newUserLogin = new UserLogin($newUserLoginParams);
                $newCustomer  = new Customer($newCustomerParams);
                $newUserLogin->save($errors);
                $newCustomer-> save($errors);
            }
            $_SESSION['errors'] = $errors;
            $this->updateCurrentUserInSession();
            header('Location: index.php?c=profile&a=view');
        }
        else
        {
            header('Location: index.php?c=profile&a=login');
        }
    }

    public function actionLogin()
    {
        if($this->loggedIn()) header('Location: index.php?c=profile&a=view');

        // store error message
        $errMsg = null;
        $loginErrors = [];

        // check user send login field
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
                if(!empty($loginData) && ($loginData->{'passwordHash'}) && password_verify($password, $loginData->{'passwordHash'}))
                {
                    // check if user is validated & enabled
                    if(!$loginData->{'validated'}) $loginErrors[] = 'Bitte bestätigen Sie Ihre E-Mail Adresse.';
                    if(!$loginData->{'enabled'})   $loginErrors[] = 'Leider ist Ihr Account vorübergehend deaktiviert, bitte kontaktieren Sie uns für weitere Informationen.';

                    if(empty($loginErrors))
                    {
                        // important variables get stored into the session and loggedIn gets set to true
                        $errMsg = '';
                        $_SESSION['loggedIn'] = true;
                        $this->updateCurrentUserInSessionWithLoginData($loginData);
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

        // TODO finally put the error message into a global variable to display it TODO
        # $GLOBALS['errorMessages']['login'] = $errMsg;
    }

    public function actionSignup()
    {
        $signupErrors = [];
        if($this->loggedIn()) header('Location: index.php?c=profile&a=view');
        else
        {
            if(isset($_POST['submit']))
            {
                $requiredFields = [
                    // retrieve user inputs
                    'fn' => trim($_POST['firstName']),
                    'ln' => trim($_POST['lastName']),
                    'em' => trim($_POST['email']),

                    // retrieve customer inputs
                    'un' => trim($_POST['username']),
                    // not using trim on passwords because they can have spaces etc. at the beginning and end
                    'pw' =>      $_POST['password'],
                    'cpw' =>     $_POST['confirmPassword']
                ];

                // not required
                $ph = trim($_POST['phone']);
                // extract required fields for later use without declaring them twice
                extract($requiredFields);

                foreach ($requiredFields as $key => $value) {echo '<br>'.(empty($value) ? 1 : 0).$key.': '; var_dump($value);} # TODO debug

                // check if all required fields are set
                foreach ($requiredFields as $key => $value)
                {
                    if(empty($value))
                    {
                        $signupErrors[] = 'Alle Felder müssen ausgefüllt sein.';
                        break;
                    }
                }

                // check length of given inputs and setting errors on violation # TODO mindestlänge
                if(!empty($fn) && mb_strlen($fn) > 50)                        $signupErrors[] = 'Vorname darf maximal 50 Zeichen lang sein.';
                if(!empty($ln) && mb_strlen($ln) > 50)                        $signupErrors[] = 'Nachname darf maximal 50 Zeichen lang sein.';
                if(!empty($em) && mb_strlen($em) > 45)                        $signupErrors[] = 'E-Mail Adresse darf maximal 45 Zeichen lang sein.';
                # TODO email regex
                if(!empty($ph) && mb_strlen($ph) > 25)                        $signupErrors[] = 'Telefonnummer darf maximal 25 Zeichen lang sein.';

                if(!empty($un) && mb_strlen($un) > 25)                        $signupErrors[] = 'Nutzername darf maximal 25 Zeichen lang sein.';
                if(!empty($pw) && mb_strlen($pw) > 25 || mb_strlen($pw) < 8) $signupErrors[] = 'Passwort muss zwischen 8 und 25 Zeichen lang sein.'; #  TODO wie lang ?

                if (!empty($pw))
                {
                    $pwRegEx = '/^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m';
                    if ($pw !== $cpw)                    $signupErrors[] = 'Passwörter müssen übereinstimmen.';
                    else if (!preg_match($pwRegEx, $pw)) $signupErrors[] = 'Passwort zu schwach (jeweils 2 Groß- und Kleinbuchstaben, 2 Zahlen und 2 Sonderzeichen).';
                }

                // check for occured errors
                if(empty($signupErrors))
                {
                    // map customer inputs
                    $customerData = [
                        'firstName'       => $fn,
                        'lastName'        => $ln,
                        'email'           => $em,
                        'phone'           => $ph
                    ];

                    // map userLogin inputs
                    $userLoginData = [
                        'username'        => $un
                    ];

                    $db = $GLOBALS['db'];
                    $sqlErrors = [];

                    //add the password hash to the data which will get inserted into the database
                    $userLoginData['passwordHash'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

                    // look for users with given username and customers with given email
                    $foundUsers = UserLogin::selectWhere('username = '.$db->quote($userLoginData['username']))
                                + Customer:: selectWhere('email = '.   $db->quote($customerData ['email']   ));

                    // check if any users or customers have been found
                    if(empty($foundUsers))
                    {
                        // create and validate new customer from given data
                        $newCustomer = new Customer($customerData);
                        if ($newCustomer->validate($sqlErrors) === true)
                        {
                            # if customer valid
                            $newCustomer->save($sqlErrors);
                            if (empty($sqlErrors))
                            {
                                # if customer insert didn't fail
                                // get the id of the created customer and add field customer to user login to connect the table entries via foreign key
                                $userLoginData['customer'] = Customer::select('id','WHERE email ='.$db->quote($customerData ['email']))[0]->{'id'};

                                // set flags before activation in userLogin
                                $userLoginData['validated'] = 0;
                                $userLoginData['enabled']   = 1;

                                // create and validate new userLogin from given data
                                $newUserLogin = new UserLogin($userLoginData);
                                if ($newUserLogin->validate($sqlErrors) === true)
                                {
                                    $newUserLogin->save($sqlErrors);
                                    if (empty($sqlErrors))
                                    {
                                        # if userLogin insert didn't fail
                                        // TODO validate link pseudo email and head to login page
                                        // get user ID from db to generate a validation link
                                        $GLOBALS['validateUserID'] = UserLogin::select('id', 'WHERE username ='.$db->quote($userLoginData['username']))[0]->{'id'};
                                        header('Location: index.php?c=profile&a=login');
                                    }
                                    else $sqlErrors[] = 'DATABASE ERROR (INSERT USERLOGIN)';
                                }
                                else $sqlErrors[] = 'DATABASE ERROR (VALIDATE USERLOGIN)';
                            }
                            else $sqlErrors[] = 'DATABASE ERROR (INSERT CUSTOMER)';
                        }
                        else $sqlErrors[] = 'DATABASE ERROR (VALIDATE CUSTOMER)';
                    }
                    else $signupErrors[] = 'Nutzername oder E-Mail Adresse existiert bereits.';
                }
                else {} # TODO wenn es fehler in der eingabe gab

                # if submit

                if(isset($sqlErrors))   var_dump($sqlErrors);   echo '<br><br>';
                if(isset($newCustomer)) var_dump($newCustomer); echo '<br><br>';
            }
            # if nicht eingeloggt, kein submit
        }

        # TODO sqlErrors etc.

        $this->setParam($this->action, 'signup');
        $this->setParam('signupErrors',   $signupErrors   ?? null);
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
        $userID = $_GET['uid'];
    }
}