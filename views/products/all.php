<?php
include VIEWSPATH . 'navbar.php';
include VIEWSPATH . 'filter.php';
?>

<section class="content">
    <h1 class="title">Schuhe Men:</h1>
    <div class="row">
        <?
        try
        {
            if(isset($products)) : foreach($products as $product): ?>
                <a class="link" href="?c=products&a=view&id=<?=$product->id?>">
                    <div class="product">
                        <div class="upper">
                            <img class="img" src="<?=ROOTPATH.'assets/img/products/product_'.$product->id?>.jpg">
                        </div>
                        <div class="lower">
                            <h1 class="brand"><?=$product->brand?></h1>
                            <h2 class="model"><?=$product->name?></h2>
                            <h3 class="price"><?=$product->price?>€</h3>
                        </div>
                    </div>
                </a>
            <? endforeach; else : echo 'Suche hat keine Ergebnisse.'; endif; #TODO DNA Container mit Anzeige
        }
        catch (Error $error)
        {
            echo 'Error caught: '.$error->getMessage();
        }
        catch (PDOException $exception)
        {
            echo 'Exception caught: '.$exception->getMessage();
        }
        ?>
    </div>
</section>