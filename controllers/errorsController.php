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
    }

    public function actionSql()
    {
        $this->setParam('errMsg', 'Upps, etwas ist schief gelaufen (SQL Fehler).'); # TODO SQL Fehler für Nutzer entfernen
    }
}
