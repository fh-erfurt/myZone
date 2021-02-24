<?
    use dwp\models\Address;
    global $loggedIn;
?>
<h1 class="checkout-headline">Kasse</h1>
<div class="Order">
    <div class="order-adress">
        <?
            if($loggedIn) :
            if($_SESSION['currentUser']['deliveryAddress'] != NULL) :
            $address = Address::selectWhere('id = '.$_SESSION['currentUser']['deliveryAddress'])[0];
        ?>
            <div class="guest-Order">
                <h1 class="Order-Headline">Lieferadresse</h1>
                <div class="view-order-content">
                    <label class="order-label" for="Straßenname">Straßenname und Hausnummer</label>
                    <div class="input-wrapper">
                        <div class="input-box-order-street">
                            <input class="input-txt-order-street" type="text" value="<?=$address->street?>" readonly>
                        </div>
                        <div class="input-box-order-number">
                            <input class="input-txt-order-number" type="text" value="<?=$address->number?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="view-order-content">
                    <label class="order-label" for="Straßenname">Postleitzahl</label>
                    <div class="input-wrapper">
                        <div class="input-box-order">
                            <input class="input-txt-order" type="text" value="<?=$address->zipCode?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="view-order-content">
                    <label class="order-label" for="Straßenname">Ort/Stadt</label>
                    <div class="input-wrapper">
                        <div class="input-box-order">
                            <input class="input-txt-order" type="text" value="<?=$address->city?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <input class="new-adress-btn" id="new-adress-btn" name="new-adress-btn" type="checkbox">
            <label class="new-adress-label" for="new-adress-btn">Lieferadresse ändern</label>
        <form class="guest-Order" action="index.php?c=profile&a=changeAddressAtCheckout" method="post">
            <input name="address-id" value="<?=$_SESSION['currentUser']['address']?>" hidden>
        <? else : ?>
            <form class="guest-Order" action="index.php?c=profile&a=changeAddressAtCheckout" method="post">
                <input name="address-id" value="<?=$_SESSION['currentUser']['address']?>" hidden>

        <? endif; else : ?>
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
            <form class="guest-Order" action="?c=products&a=pay" method="post"> <!-- TODO JGE -->
                <h1 class="Order-Headline">Als Gast bestellen</h1>
                <?
                $customerFields = [
                    'firstName'       => ['Vorname*',             'text',     true,  true ],
                    'lastName'        => ['Nachname*',            'text',     true,  true ],
                    'email'           => ['E-Mail*',              'text',     true,  true ],
                    'phone'           => ['Telefonnummer',        'text',     true,  false]
                ];
                foreach($customerFields as $attribute => [$placeholder, $type, $remember, $required]) :
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
                        <input class="input-txt-order-street" type="text" name="street" placeholder="Straßenname*"/>
                    </div>
                    <div class="input-box-order-number">
                        <input class="input-txt-order-number" type="text" name="number" placeholder="Hs.-Nr.*">
                    </div>
                </div>
                <div class="input-wrapper">
                    <div class="input-box-order">
                        <input class="input-txt-order" type="text" name="zipCode" placeholder="Postleitzahl*"/>
                    </div>
                </div>
                <div class="input-wrapper">
                    <div class="input-box-order">
                        <input class="input-txt-order" type="text" name="city" placeholder="Ort/Stadt*"/>
                    </div>
                </div>
                <? if(!$loggedIn) : ?>
                    <label for="shipmentDate">
                        gewünschtes Zustellungsdatum
                    </label>
                    <input type="date" id="shipmentDate" name="shipmentDate">
                <? else : ?>
                    <input class="submit-btn" name="submit" type="submit" value="Neue Adresse speichern"/>
                </form>
                <form class="checkout-submit" action="?c=products&a=pay" method="post">
                    <label for="shipmentDate">
                        gewünschtes Zustellungsdatum
                    </label>
                    <input type="date" id="shipmentDate" name="shipmentDate">
                <? endif; ?>
                <input class="submit-btn" name="submit" type="submit" value="<?= $loggedIn ? 'Jetzt bestellen' : 'Als Gast bestellen'?>"/>
            </form>
    </div>

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
