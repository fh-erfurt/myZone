<?php

use \dwp\controllers\ErrorsController;
#session_save_path(__DIR__.DIRECTORY_SEPARATOR.'data');
session_start();

// load configurations
require_once './config/paths.php';
require_once './config/database.php';

// load controllers
require_once COREPATH.'controller.php';
require_once COREPATH.'baseModel.php';
# require_once COREPATH.'functions.php';

require_once CONTROLLERSPATH.'errorsController.php';

// load DB models
require_once MODELSPATH.'userLogin.php';
require_once MODELSPATH.'customer.php';
require_once MODELSPATH.'product.php';

// check if a user is logged in
$loggedIn = isset($_SESSION['user']);

// check get parameters and assign variables
$controllerName = $_GET['c'] ?? 'pages';
$actionName     = $_GET['a'] ?? 'home';

// set the shown title for the page
$title = 'myZone'; # TODO JGE dynamic title?

if(file_exists(CONTROLLERSPATH.$controllerName.'Controller.php'))
{
    // include the controllers file
    require_once CONTROLLERSPATH.$controllerName.'Controller.php';

    // generate controller
    $className = '\\dwp\\controllers\\'.ucfirst($controllerName).'Controller';
    $controller = new $className($controllerName, $actionName);
    $actionMethod = 'action'.ucfirst($actionName);
    if(method_exists($controller, $actionMethod))
    {
        // call action method
        $controller->{$actionMethod}();
    }
    else
    {
        // redirect to an error page
        $controller = new ErrorsController('errors', 'error404');
        $controller->actionError404();
    }
}
else
{
    // redirect to an error page
    $controller = new ErrorsController('errors', 'error404');
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://kit.fontawesome.com/d97dcc17bd.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="<?=ROOTPATH.'assets/css/jakob.css'?>">
    <link rel="stylesheet" href="<?=ROOTPATH.'assets/css/style.css'?>" type="text/css" />
    <title><?=$title?></title>
</head>
<body>

<?
include VIEWSPATH . 'header.php';

$controller->render();

include VIEWSPATH . 'bottom.php';
?>

</body>
</html>