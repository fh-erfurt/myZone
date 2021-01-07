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
    public function actionError404()
    {
        $this->setParam('errMsg', 'Error 404: The method for your called controller is missing');
        // TODO add functionality to display the parameters that caused the error
    }

    public function actionSql()
    {
        $this->setParam('errMsg', 'SQL Error: Something went wrong in the database');
    }
}
