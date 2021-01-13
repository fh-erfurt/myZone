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
        $this->setParam($this->action, 'home');
    }

    public function actionSearch()
    {
        $this->setParam($this->action, 'search');
    }

    public function actionAllProducts()
    {
        $this->setParam($this->action, 'allProducts');
    }

    public function actionProductPage()
    {
        $this->setParam($this->action, 'ProductPage');
    }


}