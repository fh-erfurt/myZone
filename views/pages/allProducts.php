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
            $searchfor = isset($_GET['s']) ? 'name like \'%'.(trim($_GET['s'])).'%\' or brand like \'%'.(trim($_GET['s'])).'%\'' : '';
            $products = [];
            $products = \dwp\models\Product::selectWhere($searchfor);
            if(empty($products))
            {
                echo 'Suche hat keine Ergebnisse.'; #TODO DNA Container mit Anzeige
            }
        foreach($products as $product): ?>
            <a class="link" href="?c=pages&a=product&id=<?=$product->{'id'}?>">
                <div class="product">
                    <div class="upper">
                        <img class="img" src="<?=ROOTPATH.'assets/img/products/product_'.$product->{'id'}?>.jpg">
                    </div>
                    <div class="lower">
                        <h1 class="brand"><?=$product->{'brand'}?></h1>
                        <h2 class="model"><?=$product->{'name'}?></h2>
                        <h3 class="price"><?=$product->{'price'}?>€</h3>
                    </div>
                </div>
            </a>
        <? endforeach;
        }   # TODO JGE illegale Suchen abfangen (' OR 1 = 1 OR brand like ' und so weiter)
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
</section>