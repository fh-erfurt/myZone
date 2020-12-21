<?php
#session_save_path(__DIR__.DIRECTORY_SEPARATOR.'data');
session_start();

require_once './config/paths.php';
# require_once './core/functions.php';

require_once COREPATH.'controller.php';

$loggedIn = isset($_SESSION['user']);

$title = 'myZone';
// TODO JGE dynamic title?

// check get parameters and assign variables
$controllerName = isset($_GET['c']) ? $_GET['c'] : 'pages';
$actionName     = isset($_GET['a']) ? $_GET['a'] : 'home'; # TODO JGE error als standard?

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
        require_once 'controllers\errorsController.php';
        $controller = new \dwp\controllers\ErrorsController('pages', 'error404');
        $controller->actionError404();
    }
}
else
{
    // redirect to an error page
    require_once 'controllers\errorsController.php';
    $controller = new \dwp\controllers\ErrorsController('pages', 'error404');
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOTPATH.'assets/css/style.css'?>">
    <title><?=$title?></title>
</head>
<body>

<?
include VIEWSPATH . 'navbar.php';

$controller->render();

include VIEWSPATH . 'bottom.php';
?>

</body>
</html>