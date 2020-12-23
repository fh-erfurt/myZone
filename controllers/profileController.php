<?php


namespace dwp\controllers;


class ProfileController extends \dwp\core\Controller
{
    public function actionView()
    {
        if($this->loggedIn())
        {
            $this->setParam($this->action, 'view');
        }
        else
        {
            header('Location: index.php?c=profile&a=login');
        }
    }

    public function actionEdit()
    {
        $this->setParam($this->action, 'edit');
    }

    public function actionLogin()
    {
        if(isset($_SESSION['currentUser']))
        header('Location: index.php?c=pages&a=home'); // TODO eventuell auf Profil weiterleiten?

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
                #$passwordFromDB = mysqli_query($GLOBALS['db'], "SELECT passwordHash from login where "username = ".trim($username)); TODO
                $loginData = \dwp\models\UserLogin::select("username = ".$GLOBALS['db']->quote(trim($username)))[0];
                if(isset($loginData['passwordHash']) && password_verify($password, $loginData['passwordHash']))
                {
                    // TODO: Store useful variables into the session like account and also set loggedIn = true
                    $errMsg = '';
                    $customerData = \dwp\models\Customer::select("id = ".$loginData['customer'])[0];
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['currentUser'] = [
                        'username'  => $loginData['username'],
                        'userId'    => $loginData['id'],
                        'firstName' => $customerData['firstName'],
                        'lastName'  => $customerData['lastName'],
                        'email'     => $customerData['email'],
                        'phone'     => $customerData['phone']
                    ];
                    header('Location: index.php?c=pages&a=home'); // TODO eventuell auf Profil weiterleiten?
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