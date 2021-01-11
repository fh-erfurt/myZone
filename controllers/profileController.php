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
        $customerData = Customer::select("id = ".$loginData->{'customer'})[0];
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
        $this->updateCurrentUserInSessionWithLoginData(UserLogin::select("id = ".$GLOBALS['db']->quote(trim($_SESSION['currentUser']['userId'])))[0]);
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

        // retrieve inputs
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // check user send login field
        if(isset($_POST['submit']))
        {
            if(!empty($username) && !empty($password))
            {
                $loginData = UserLogin::select("username = ".$GLOBALS['db']->quote(trim($username)))[0];
                if(($loginData->{'passwordHash'}) && password_verify($password, $loginData->{'passwordHash'}))
                {
                    // TODO: Store useful variables into the session like account and also set loggedIn = true
                    $errMsg = '';
                    $_SESSION['loggedIn'] = true;
                    $this->updateCurrentUserInSessionWithLoginData($loginData);
                    header('Location: index.php?c=pages&a=home'); // TODO eventuell auf Profil weiterleiten? Aufgerudfene Seite merken?
                }
                else
                {
                    $errMsg = 'Nutzername oder Passwort ist falsch!';
                }
            }
            else
            {
                $errMsg = 'Bitte Nutzernamen sowie Passwort eingeben!';
            }

            // if there is no error reset mail
            if($errMsg === null)
            {
                $username = '';
            }

        }

        // set param email to prefill login input field
        $this->setParam('username', $username);
        $this->setParam('errMsg', $errMsg);
    }

    public function actionSignup()
    {
        if($this->loggedIn()) header('Location: index.php?c=pages&a=home');
        else                  $this->setParam($this->action, 'signup');
        $errMsg = 'kein Fehler';
        $this->setParam('errMsg', $errMsg);
    }

    public function actionLogout()
    {
        if(isset($_POST['submit'])) # logout nur über button möglich
        {
            $_SESSION['loggedIn'] = false;
            $_SESSION['currentUser'] = null;
            $loginData = null;
        }
        header('Location: index.php?c=pages&a=home');
    }
}