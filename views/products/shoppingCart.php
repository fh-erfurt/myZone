<?php
include VIEWSPATH . 'navbar.php';
?>

<div class="shopping-cart-box">
    <h1 class="sc-headline">
        Dein Warenkorb
    </h1>
    <div class="shopping-cart-items">
        <?php if(!empty($_SESSION['cart'])) foreach($_SESSION['cart'] as $cartItem): $product = unserialize($cartItem);?>
            <a class="link" href="?c=pages&a=product&id=<?=$product->{'id'}?>">
                <div class="product">
                    <div class="upper">
                        <img class="img" src="<?=ROOTPATH.'assets/img/products/product_'.$product->{'id'}.'.jpg'?>">
                    </div>
                    <div class="lower">
                        <h1 class="brand"><?=$product->{'brand'}?></h1>
                        <h2 class="model"><?=$product->{'name'}?></h2>
                        <h3 class="price"><?=$product->{'price'}?>€</h3>
                        <h4 class="price">COUNT: <?=$_SESSION['cartItemCount'][$product->{'id'}]?></h4>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
    <div class="buy-or-delete">
        <div class="buy">
            <button class="buy-btn" type="button">Zur Kasse
            </button>
        </div>
        <form  action="?c=products&a=clearCart" method="post">
            <input class="delete-btn" type="submit" value="Warenkorb löschen">
        </form>
    </div>
</div>