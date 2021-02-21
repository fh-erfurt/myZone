<?php



namespace dwp\controllers;

/**
 * Class ErrorsController
 *
 * Controller used to handle and process errors.
 *
 * @package dwp\controllers
 */
class ErrorsController extends \dwp\core\Controller
{
    public function __construct($controller, $action, $errCause)
    {
        parent::__construct($controller, $action);
        $this->setParam('errCause', $errCause);
    }

    public function actionError404()
    {
        $this->setParam('errMsg', 'Error 404: The method for your called controller is missing');
    }

    public function actionSql()
    {
        $this->setParam('errMsg', 'Upps, etwas ist schief gelaufen (4).');
    }
}
