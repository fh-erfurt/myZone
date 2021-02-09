<h1 class="checkout-headline">Kasse</h1>
<div class="Order">
    <div class="order-login">
        <form class="login-input-box" action="index.php?c=profile&a=login" method="post">
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
            <div class="input-wrapper">
                <div class="input-box-order">
                    <input class="input-txt-order" type="text" placeholder="Vorname*"/>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="input-box-order">
                    <input class="input-txt-order" type="text" placeholder="Nachname*"/>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="input-box-order">
                    <input class="input-txt-order" type="text" placeholder="Straßenname und Hausnummer*"/>
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
            <div class="input-wrapper">
                <div class="input-box-order">
                    <input class="input-txt-order" type="tel" placeholder="Telefon*"/>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="input-box-order">
                    <input class="input-txt-order" type="email" placeholder="E-Mail Adresse*"/>
                </div>
            </div>
        <div class="guest-submit">
            <input class="submit-btn" name="submit" type="submit" value="Als Gast bestellen"/>
        </div>
    </form>
    <div class="Order-overview-box">
        <div class="overview-upper">
            <h1 class="overview-headline">In deinem Warenkorb</h1>
        </div>
        <table class="overview-price">
            <tr class="subtotal-price">
                <td>Zwischensumme</td>
                <td class="price1">99,99</td>
            </tr>
            <tr class="total-price">
                <td>Gesamt</td>
                <td class="price1">99,99</td>
            </tr>
        </table>
        <div class="overview-lower">
            <div class="overview-img-box">
                <img class="overview-img" src="<?=ROOTPATH. '/assets/img/products/product_1.jpg'?>">
            </div>
            <div class="product-info">
                <h1 class="overview-description">Reebok</h1>
                <h1 class="overview-description">Club C85 Vintage</h1>
                <h1 class="overview-description">Calk / Paperwhite / Cya</h1>
                <h1 class="overview-description">99,99</h1>
                <h1 class="overview-description">Menge: 1</h1>
            </div>
        </div>
        <div class="edit-box">
            <a class="edit-order" href="">Bearbeiten</a>
        </div>
    </div>
</div>
