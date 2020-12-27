<?php



namespace dwp\controllers;


class ErrorsController extends \dwp\core\Controller
{
    public function actionError404()
    {
        $this->setParam('errMsg', 'Error 404: The method for your called controller is missing');
        // TODO add functionality to display the parameters that caused the error
    }
}
