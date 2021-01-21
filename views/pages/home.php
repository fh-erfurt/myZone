<?php /** @noinspection SqlResolve */
# TODO JGE echo password_hash('123456', PASSWORD_DEFAULT);
?>
<?
use \dwp\models\Product;
include VIEWSPATH . 'navbar.php';
?>
<div class="home">
    <div class="home-input">
        <div class="top-seller">
            <h1 class="top-seller-headline">Topseller:</h1>
            <div class="collum">
                <?
                try
                {
                    $products = [];
                    $products = Product::select('`name`, `price`, `category`, `brand`, `color`, `products`.`id`, sum(`quantity`) as `sum`',
                                           'INNER JOIN `orderItems` ON `products`.id = `orderItems`.product GROUP BY `product` ORDER BY `sum` DESC');
                foreach($products as $product): ?>
                <a class="link-topseller" href="?c=pages&a=product&id=<?=$product->{'id'}?>">
                    <div class="product-topseller">
                        <div class="upper-topseller">
                            <img class="img-topseller" src="<?=ROOTPATH.'assets/img/products/product_'.$product->{'id'}.'.jpg'?>">
                        </div>
                        <div class="lower-topseller">
                            <h1 class="brand"><?=$product->{'brand'}?></h1>
                            <h2 class="model"><?=$product->{'name'}?></h2>
                            <h3 class="price"><?=$product->{'price'}?>€</h3>
                        </div>
                    </div>
                </a>
                <? endforeach;
                }
                catch (Error $error)
                {
                    echo 'Error caught: '.$error->getMessage(); # TODO
                }
                catch (PDOException $exception)
                {
                    echo 'Exception caught: '.$exception->getMessage(); # TODO
                }
                ?>
            </div>
        </div>
        <div class="about-us">
            <h1 class="about-us-headline">Dein Online-shop für Sneaker und Streetwear</h1>
            <p class="about-us-text">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>
    <img class="background-img" src="<?=ROOTPATH.'/assets/img/background2.jpeg'?>">
</div>
<div class="about-us-mob">
    <h1 class="about-us-headline">Dein Online-shop für Sneaker und Streetwear</h1>
    <p class="about-us-text">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </p>
</div>