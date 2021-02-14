<? global $loggedIn; ?>
<h1 class="checkout-headline">Kasse</h1>
<div class="Order">
    <? if($loggedIn) :
        if($_SESSION['currentUser']['address'] != NULL) :?>
    ADRESSE AUSWäHLEN TODO DNA <!-- TODO DNA -->
    <br><br>
    <? var_dump($_SESSION['currentUser']['address']);
        endif; ?>
    <form class="guest-Order">
        <h1 class="Order-Headline">Neue Adresse hinzufügen</h1>

    <?
        else :
        #array
        #foreach
        # TODO
        ?>
    <div class="order-login">
        <form class="login-input-box" action="index.php?c=profile&a=loginAtCheckout" method="post">
            <h2 class="second-login-headline2">Ich bin bereits Kunde</h2>
            <div class="input-login">
                <label class="typein" for="username">
                    Nutzername
                </label>
                <div class="second-typein-box">
                    <input id="second-username" name="username" type="username" placeholder="" value="<?=isset($username) ? $username : ''?>" required />
                </div>
            </div>

            <div class="input-login">
                <label class="typein" for="password">
                    Passwort</label>
                <div class="second-typein-box">
                    <input id="second-password" name="password" type="password" placeholder="" required />
                </div>
            </div>

            <div class="input-submit">
                <input class="submit-btn" name="submit" type="submit" value="Login"/>
            </div>
        </form>
    </div>
    <form class="guest-Order">
        <h1 class="Order-Headline">Als Gast bestellen</h1>

        <?
        $signupFields = [
            'firstName'       => ['Vorname*',             'text',     true,  true ],
            'lastName'        => ['Nachname*',            'text',     true,  true ],
            'email'           => ['E-Mail*',              'text',     true,  true ],
            'phone'           => ['Telefonnummer',        'text',     true,  false]
        ];
        foreach($signupFields as $attribute => [$placeholder, $type, $remember, $required]) :
            // if the remember value is true AND the post parameter is set save it into the variable, which is written into the textfield.
            $value = $remember ? $_POST[$attribute] ??  '' : ''; ?>
            <div class="input-wrapper">
                <div class="input-box-order">
                    <input class="input-txt-order" id="<?=$attribute?>" name="<?=$attribute?>" type="<?=$type?>" placeholder="<?=$placeholder?>" value="<?=htmlspecialchars($value)?>"<?=$required ? ' required' : ''?> />
                </div>
            </div>
        <?php endforeach; endif; ?>
        <div class="input-wrapper">
            <div class="input-box-order-street">
                <input class="input-txt-order-street" type="text" placeholder="Straßenname*"/>
            </div>
            <div class="input-box-order-number">
                <input class="input-txt-order-number" type="text" placeholder="Hs.-Nr.*">
            </div>
        </div>
        <div class="input-wrapper">
            <div class="input-box-order">
                <input class="input-txt-order" type="text" placeholder="Postleitzahl*"/>
            </div>
        </div>
        <div class="input-wrapper">
            <div class="input-box-order">
                <input class="input-txt-order" type="text" placeholder="Ort/Stadt*"/>
            </div>
        </div>
        <div class="guest-submit">
            <input class="submit-btn" name="submit" type="submit" value="<?= $loggedIn ? 'Jetzt bestellen' : 'Als Gast bestellen'?>"/>
        </div>
    </form>
    <div class="Order-overview-box">
        <div class="overview-upper">
            <h1 class="overview-headline">Warenkorb</h1>
        </div>
        <?
            $totalPrice = 0;

            foreach($_SESSION['cart'] as $id => $product) :
            $product      = unserialize($product);
            $quantity     = $_SESSION['cartItemCount'][$id];
            $prodSumPrice = $product->price * $quantity;
            $totalPrice  += $prodSumPrice;
        ?>
        <div class="overview-lower">
            <div class="overview-img-box">
                <img class="overview-img" src="<?=ROOTPATH.'/assets/img/products/product_'.$product->id.'.jpg'?>">
            </div>
            <div class="product-info">
                <h1 class="overview-description"><?=$product->brand?></h1>
                <h1 class="overview-description"><?=$product->name?></h1>
                <h1 class="overview-description"><?=$product->descriptionColor?></h1>
                <h1 class="overview-description">Menge: <?=$quantity?></h1>
                <h1 class="overview-description"><?=$prodSumPrice?>€</h1>
            </div>
        </div>
        <?
            endforeach;
        ?>
        <table class="overview-price">
            <tr class="subtotal-price">
                <td>kostenloser Versand</td>
                <td class="price1">0,00€</td>
            </tr>
            <tr class="total-price">
                <td>Gesamt</td>
                <td class="price1"><?=$totalPrice?>€</td>
            </tr>
        </table>
        <div class="edit-box">
            <a class="edit-order" href="<?=ROOTPATH.'/index.php?c=products&a=shoppingCart'?>">Bearbeiten</a>
        </div>
    </div>
</div>
<?

    global $controller;
    $loggedIn = $controller->loggedIn();
    echo '<br> loggedIn: ';
    var_dump($loggedIn);
?>

    <form action="?c=products&a=pay" method="post">
<?  if($loggedIn) : ?>
    <label for="shipmentDate">
        Vorname
    </label>
    <input type="date" id="shipmentDate" name="shipmentDate">
<?  endif; ?>
    <label for="shipmentDate">
        gewünschtes Zustellungsdatum
    </label>
    <input type="date" id="shipmentDate" name="shipmentDate">
    <input class="checkout-pay-btn" type="submit" value="Jetzt bezahlen">
</form>
