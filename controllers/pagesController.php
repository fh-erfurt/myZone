<?php


namespace dwp\controllers;


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
}