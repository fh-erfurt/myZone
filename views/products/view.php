<?php

use \dwp\models\JoinedProduct;

include VIEWSPATH.'navbar.php';
$db = $GLOBALS['db'];

    $products = JoinedProduct::joinedSelect(' WHERE products.id = '.$db->quote($_GET['id'] ?? 0));
    if($products) :
        $product = $products[0];
    ?>
<div class="main">
    <div class="inset-product">
        <div class="product-img-box">
            <img class="product-img" src="<?=ROOTPATH.'assets/img/products/product_'.$product->id.'.jpg'?>">
        </div>
        <div class="product-description-box">
            <div class="pp-input">

                <div class="product-data">
                    <h1 class="pp-brand"><?=$product->brand?></h1>
                    <h2 class="pp-model"><?=$product->name?></h2>
                    <h3 class="pp-color"><?=$product->descriptionColor ?? $product->color?></h3>
                    <h4 class="pp-price"><?=$product->price?>€</h4>
                </div>
                <img class="brand-logo" src="<?=ROOTPATH. '/assets/img/brand_logos/'.$product->brand.'_logo.png'?>">
            </div>
            <div class="add-to-cart">
                <div class="add-to-cart-box">
                    <form action="<?='?c=products&a=addToCart&id='.$product->id?>" method="post">
                        <button class="add-to-cart-btn">
                            <img class="shopping-bag-icon" src="<?=ROOTPATH.'/assets/img/icons/shopping-bag-icon.svg'?>">In den Warenkorb
                        </button>
                    </form>
                </div>
            </div>
            <div class="product-description-text-box">
                <h1 class="product-description-headline">Artikelbeschreibung</h1>
                <p class="product-description-text">
                    <?=$product->description ?? 'PrOdUkTbEsChReIbUnG'?>
                </p>
            </div>
        </div>
    </div>
    <div class="product-description-box-mob">
        <h1 class="product-description-headline">Artikelbeschreibung</h1>
        <p class="product-description-text">
            <?=$product->description ?? 'PrOdUkTbEsChReIbUnG'?>
        </p>
    </div>
    <div class="all-Products-brand">
        <div class="all-Products-box">
            <h1 class="all-Products-headline">Alle Artikel von <?=$product->brand?></h1>
            <div class="collum">
                <?
                $listProducts = JoinedProduct::joinedSelect(' WHERE brands.name = '.$db->quote($product->brand)); # #TODO JGE .'AND id NOT '.$db->quote($product->{'id'})
                if(empty($listProducts)) echo 'keine Produkte gefunden (wahrscheinlich gibt es nur das eine und es wird ausgeschlossen TODO TODO TODO)'; #TODO JGE
                foreach($listProducts as $listProduct) :
                    ?>


                <a class="link" href="#">
                    <div class="product">
                        <div class="upper">
                            <img class="img" src="<?=ROOTPATH.'/assets/img/products/product_'.$listProduct->id.'.jpg'?>">
                        </div>
                        <div class="lower">
                            <h1 class="brand"><?=$listProduct->brand?></h1>
                            <h2 class="model"><?=$listProduct->name?></h2>
                            <h3 class="price"><?=$listProduct->price?>€</h3>
                        </div>
                    </div>
                </a>
                <? endforeach; ?>

            </div>
        </div>
    </div>
</div>

<?php
    else : echo 'Es tut uns leid. Das gesuchte Produkt konnten wir leider nicht finden.';
    endif;?>

