<?php


namespace dwp\controllers;


use dwp\models\Product;

/**
 * Class PagesController
 *
 * Controller used to link and render requested pages using functions from the standard controller.
 *
 * @package dwp\controllers
 */
class PagesController extends \dwp\core\Controller
{
    public function actionHome()
    {
    }

    public function actionSearch()
    {
        $this->action = 'allProducts';
    }

    public function actionAllProducts()
    {
    }

    public function actionProduct()
    {
    }
}