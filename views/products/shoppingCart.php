<?php
include VIEWSPATH . 'navbar.php';
?>

<div class="shopping-cart-box">
    <h1 class="sc-headline">
        Dein Warenkorb
    </h1>
    <div class="shopping-cart-items">
        <?php if(!empty($_SESSION['cart'])) foreach($_SESSION['cart'] as $cartItem): $product = unserialize($cartItem);?>
        <div class="sc-product">
            <div class="sc-product-left">
                <a class="" href="?c=products&a=view&id=<?=$product->id?>">
                    <img class="sc-image" src="<?=ROOTPATH.'assets/img/products/product_'.$product->id.'.jpg'?>">
                </a>
                <div class="sc-product-info">
                    <div class="sc-pinfo-upper">
                        <div class="sc-brand"><?=$product->brand?></div>
                        <div class="sc-model"><?=$product->name?></div>
                        <div class="sc-color"><?=$product->descriptionColor?></div>
                        <div class="sc-amount">Stückzahl: <?=$_SESSION['cartItemCount'][$product->id].' x '?></div>
                    </div>
                    <button class="delete-product">Artikel entfernen</button>
                </div>
            </div>
            <div class="sc-product-right">
                <div class="sc-price"><?=$product->price?> €</div>
                <div class="sc-info">Versandfertig</div>
            </div>
        </div>

        <?php endforeach ?>
    </div>
    <div class="buy-or-delete">
        <div class="buy">
            <form action="?c=products&a=checkout" method="post">
                <input class="buy-btn" type="submit" value="Zur Kasse">
            </form>
        </div>
        <form  action="?c=products&a=clearCart" method="post">
            <input class="delete-btn" type="submit" value="Warenkorb löschen">
        </form>
    </div>
</div>