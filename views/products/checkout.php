<br>
<br>
<style>
    #a {
        background: orange;
        padding: 10px;
        align-self: center;
    }

    .checkout-item {
        background: grey;
        height: 71px;
        width: 1200px;
        border: solid 2px white;
        margin: 10px;
    }

    .attr {
        background: lightgrey;
    }
</style>
<div id="a">
<?
$totalPrice = 0;

foreach($_SESSION['cart'] as $id => $product) :
    $product = unserialize($product);
    $quantity = $_SESSION['cartItemCount'][$id];
    $totalPrice += $product->price * $quantity;
?>
    <div class="checkout-item">
        <div class="attr">
            <?='Produkt: '.$product->name?>
        </div>
        <div class="attr">
            <?='Anzahl: x'.$quantity?>
        </div>
        <div class="attr">
            <?='Preis: '.$product->price * $quantity.'€'?>
        </div>
    </div>
<?
endforeach;
echo '</div>';

echo '<br>TOTAL PRICE: '.$totalPrice.'€'; # TODO

global $controller;
$loggedIn = $controller->loggedIn();
echo '<br> loggedIn: ';
var_dump($loggedIn);
?>

    <form action="?c=products&a=pay" method="post">
<? if($loggedIn) : ?>
    <label for="shipmentDate">
        Vorname
    </label>
    <input type="date" id="shipmentDate" name="shipmentDate">
<? endif; ?>
    <label for="shipmentDate">
        gewünschtes Zustellungsdatum
    </label>
    <input type="date" id="shipmentDate" name="shipmentDate">
    <input class="checkout-pay-btn" type="submit" value="Jetzt bezahlen">
</form>
