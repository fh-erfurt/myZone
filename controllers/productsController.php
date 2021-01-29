<?php


namespace dwp\controllers;


use dwp\models\Product;

/**
 * Class ProductsController
 *
 * Controller used to handle the products in the shopping cart using functions from the standard controller.
 *
 * @package dwp\controllers
 */
class ProductsController extends \dwp\core\Controller
{
    public function actionAll($searchfor = '')
    {
        # TODO TODO TODO Suche
        $products = \dwp\models\JoinedProduct::joinedSelect($searchfor);
        $this->setParam('products', $products);
        $this->setParam('searchfor', $searchfor);
    }

    public function actionSearch()
    {
        # TODO JGE illegale Suchen abfangen (' OR 1 = 1 OR brand like ' und so weiter)
        $this->actionAll(isset($_GET['s']) ? "'name' like '%".(trim($_GET['s']))."%' or 'brand' like '%".(trim($_GET['s']))."%'" : '');
        $this->action = 'all';
    }

    public function actionView()
    {
    }

    public function actionAddToCart()
    {
        // check if there even is a given GET parameter in the request
        if (isset ($_GET['id']))
        {
            // get the product id for later use
            $id = $_GET['id'];
            // if an entry for the given id already exists, just increase the count
            if(isset($_SESSION['cart'][$id])) $_SESSION['cartItemCount'][$id]++;
            else
            {

                // if the last added item is the same as the current item, we don't need to run another query (performance)
                if ($_SESSION['lastAdded']->{'id'} == $id) $product = $_SESSION['lastAdded'];
                else
                {
                    // get the product from the database by id
                    $product = Product::selectWhere('id = ' . $GLOBALS['db']->quote($id))[0];
                    $_SESSION['lastAdded'] = $product;
                }

                // add product to cart (objects need to be serialized in order to be saved into the $_SESSION array)
                $_SESSION['cart'][$id] = serialize($product);
                $_SESSION['cartItemCount'][$id] = 1;
            }
            // go back to the product page
            header('Location: index.php?c=products&a=view&id='.$id);
        }
        else header('Location: index.php?c=pages&a=home');
    }

    public function actionShoppingCart()
    {
    }

    public function actionClearCart()
    {
        $_SESSION['cart'] = null;
        header('Location: index.php?c=products&a=shoppingCart');
    }
}