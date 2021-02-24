<?php

use \dwp\controllers\ErrorsController;
use \dwp\core\Controller;

session_start();

// load configurations
require_once './config/paths.php';
require_once './config/database.php';

// load controllers
require_once COREPATH.'controller.php';
require_once COREPATH.'baseModel.php';
require_once COREPATH.'joinedModel.php';
# require_once COREPATH.'functions.php';

require_once CONTROLLERSPATH.'errorsController.php';

// load DB models
require_once MODELSPATH.'userLogin.php';
require_once MODELSPATH.'customer.php';
require_once MODELSPATH.'product.php';
require_once MODELSPATH.'joinedProduct.php';
require_once MODELSPATH.'address.php';
require_once MODELSPATH.'brand.php';
require_once MODELSPATH.'color.php';

// check get parameters and assign variables to determine controller and action to run
$controllerName = $_GET['c'] ?? 'pages';
$actionName     = $_GET['a'] ?? 'home';
$loggedIn       = Controller::loggedIn();

if(file_exists(CONTROLLERSPATH.$controllerName.'Controller.php'))
{
    // include the controllers file
    require_once CONTROLLERSPATH.$controllerName.'Controller.php';

    // generate controller
    $className = '\\dwp\\controllers\\'.ucfirst($controllerName).'Controller';
    $controller = new $className($controllerName, $actionName);
    $actionMethod = 'action'.ucfirst($actionName);

    // call action method if it exists
    if(method_exists($controller, $actionMethod)) $controller->{$actionMethod}();
    else $errCause = 'The method for your called controller is missing';
}
else $errCause = 'The controller for your called controller is missing';

if(isset($errCause) && !empty($errCause)) $controller = new ErrorsController('errors', 'error404', $errCause);

// set the shown title for the page
$title = 'myZone';
#$title = ucfirst($actionName); # TODO JGE dynamic title switch case?
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="<?=ROOTPATH.'assets/css/jakob.css'?>">
    <link rel="stylesheet" href="<?=ROOTPATH.'assets/css/style.css'?>" type="text/css" />
    <title><?=$title?></title>
</head>
<body>

<?
include VIEWSPATH.'header.php';

$controller->render();

include VIEWSPATH.'footer.php';
?>

</body>
</html>