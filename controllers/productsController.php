<?php


namespace dwp\controllers;


use dwp\models\Order;
use dwp\models\OrderItem;
use dwp\models\Customer;
use dwp\models\JoinedProduct;

/**
 * Class ProductsController
 *
 * Controller used to handle the products in the shopping cart using functions from the standard controller.
 *
 * @package dwp\controllers
 */
class ProductsController extends \dwp\core\Controller
{
    public function actionAll($whereStr = '')
    {
        # TODO TODO TODO Suche
        $products = \dwp\models\JoinedProduct::joinedSelect($whereStr);
        $this->setParam('products', $products);
        $this->setParam('searchfor', $whereStr); # TODO remove
    }

    public function actionSearch()
    {
        # TODO JGE illegale Suchen abfangen (' OR 1 = 1 OR brand like ' und so weiter)
        $this->actionAll(isset($_GET['s']) ? " WHERE products.name like '%".(trim($_GET['s']))."%' OR brands.name like '%".(trim($_GET['s']))."%'" : '');
        $this->action = 'all';
    }

    public function actionView()
    {
    }

    public function actionAddToCart()
    {
        $db = $GLOBALS['db'];
        // check if there even is a given GET parameter in the request
        if (isset ($_GET['id']))
        {
            // get the product id for later use
            $id = $_GET['id'];
            // if an entry for the given id already exists, just increase the count
            if(isset($_SESSION['cart'][$id])) $_SESSION['cartItemCount'][$id]++;
            else
            {
                // get the product from the database by id
                $product = JoinedProduct::joinedSelect(' WHERE products.id = '.$db->quote($id))[0];

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

    public function actionCheckout()
    {
        if(empty($_SESSION['cart'])) header('Location: index.php?c=pages&a=home');
    }

    /**
     * handles checkout payment based on the loggedIn status of the session
     */
    public function actionPay()
    {
        // TODO calculate information
        if(empty($_SESSION['cart'])) header('Location: index.php?c=pages&a=home');
        else
        {
            $sqlErrors = [];
            # if it is a guest order
            if(!$this->loggedIn())
            {
                $addressFields = [
                    // retrieve user inputs
                    'street'  => trim($_POST['street']),
                    'number'  => trim($_POST['number']),
                    'zipCode' => trim($_POST['zipCode']),
                    'city'    => trim($_POST['city'])
                ];

                $customerFields = [
                    'firstName'       => trim($_POST['firstName']),
                    'lastName'        => trim($_POST['lastName']),
                    'email'           => trim($_POST['email']),
                    'phone'           => trim($_POST['phone'])
                ];

                require_once CONTROLLERSPATH.'profileController.php';
                ProfileController::validateAddressAndCustomerAndSaveToDB($addressFields, $customerFields, $sqlErrors);
            }
            $orderData  = [
                'customer'     => $this->loggedIn() ? $_SESSION['currentUser']['customerId'] : Customer::lastInsertedId(),
                'shipmentDate' => $_POST['shipmentDate'] ?? null
            ];

            require_once MODELSPATH.'order.php';
            $newOrder = new Order($orderData);
            if ($newOrder->validate($sqlErrors))
            {
                # save the order into the database and get the id for later use in the orderItems
                $newOrder->save($sqlErrors);
                $orderId = Order::lastInsertedId();

                if(empty($sqlErrors))
                {
                    # insert each ordered item from the cart into the database
                    require_once MODELSPATH.'orderItem.php';
                    foreach($_SESSION['cart'] as $id => $product)
                    {
                        $product = unserialize($product);
                        $qty = $_SESSION['cartItemCount'][$id];
                        $orderItemData = [
                            'quantity'    => $qty,
                            'actualPrice' => $qty * $product->price,
                            '`order`'       => $orderId,
                            'product'     => $id
                        ];

                        $newOrderItem = new OrderItem($orderItemData);
                        if ($newOrderItem->validate($sqlErrors))
                        {
                            $newOrderItem->save($sqlErrors);
                        }
                    }

                    // do payment magic

                    // delete cart
                    $_SESSION['cart'] = null;
                    $_SESSION['cartItemCount'] = null;
                    header('Location: index.php?c=pages&a=thankYou');
                }
            }
        }
    }
}