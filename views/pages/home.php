<?
use \dwp\models\JoinedProduct;
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
                    $products = JoinedProduct::joinedSelect(' INNER JOIN orderItems ON products.id = orderItems.product GROUP BY product ORDER BY sum(orderitems.quantity) DESC');
                foreach($products as $product): ?>
                <a class="link-topseller" href="?c=products&a=view&id=<?=$product->id?>">
                    <div class="product-topseller">
                        <div class="upper-topseller">
                            <img class="img-topseller" src="<?=ROOTPATH.'assets/img/products/product_'.$product->id.'.jpg'?>">
                        </div>
                        <div class="lower-topseller">
                            <h1 class="brand"><?=$product->brand?></h1>
                            <h2 class="model"><?=$product->name?></h2>
                            <h3 class="price"><?=$product->price?>€</h3>
                        </div>
                    </div>
                </a>
                <? endforeach;
                }
                // PDOExceptions are caught in the BaseModel::select() function already
                catch (Error $error) { echo 'Leider ist ein Fehler aufgetreten (2)'.$error->getMessage(); }

                ?>
            </div>
        </div>
        <div class="about-us">
            <h1 class="about-us-headline">Dein Online-shop für Sneaker und Streetwear</h1>
            <p class="about-us-text">
                Hi, wir von <b>MyZone</b> leben und lieben den urbanen Lifestyle. Diese Leidenschaft wollen wir nun auch mit euch teilen!<br>
                Der 2020 eröffnete Webshop, sowie eine neu eröffnete Filiale in Erfurt, halten dich mit von uns ausgesuchten Produkten immer auf dem laufendem.
                Stöbere durch unser Online-Angebot oder besuche unsere Filiale - Wir hoffen, dass du dich bei uns wohlfühlst und freuen uns auf deinen nächsten Besuch!
            </p>
            <input class="show-more-checkbox" type="checkbox" id="show-more-btn">
            <label class="show-more-link" for="show-more-btn">mehr Anzeigen</label>
            <p class="about-us-text2">
                <b>Der Beginn</b><br>
                Alles began mit einem Studium Projekt von drei Hip-Hop begeisterten Studenten. Doch nun wollen wir unsere Idee allen zugänglich machen! <br><br>
                <b>Unsere Wurzeln: Hip-Hop</b><br>
                Wer etwas mit Grafiti, skaten oder im allgemeinen mit der Hip-Hop Kultur anfangen kann, ist bei uns genau richtig!
                Wir wollen für Hip-Hop Fans die erste Anlaufstelle sein, wenn es um lässige Kleidung oder bequeme Sneaker geht.<br><br>
                <b>Streetwear und Urban Fashion von Top-Marken</b><br>
                Aufgrund unserer erst vor kurzem gestarteten Verkauf ist unser Markenspektrum noch recht begrenzt. Jedoch planen wir in naher Zukunft neben Klassikern wie <i>Carhartt WIP</i> oder <i>Stüssy</i> auch jüngere Brands wie z.B.: <i>Wemoto, Ucon Acrobatics</i> und <i>HUF</i> abzudecken.<br>
                Wir sollen ständig aktuelle Trends verfolgen und frische Kollektionen zu unserem Bestand hinzufügen. Also bleib gespannt und schaue gerne in Zkunft nochmal vorbei!
            </p>
            <label class="show-less-link" for="show-more-btn">weniger Anzeigen</label>
        </div>
    </div>
</div>
<div class="about-us-mob">
    <h1 class="about-us-headline">Dein Online-shop für Sneaker und Streetwear</h1>
    <p class="about-us-text">
        Hi, wir von <b>MyZone</b> leben und lieben den urbanen Lifestyle. Diese Leidenschaft wollen wir mit euch teilen!<br>
        Der 2020 eröffnete Webshop, sowie eine neu eröffnete Filiale in Erfurt, halten dich mit von uns ausgesuchten Produkten immer auf dem laufendem.
        Stöbere durch unser Online-Angebot oder besuche unsere Filiale - wir hoffen, dass du dich bei uns wohlfühlst und freuen uns auf deinen nächsten Besuch!
    </p>
    <input class="show-more-checkbox-mob" type="checkbox" id="show-more-btn-mob">
    <label class="show-more-link-mob" for="show-more-btn-mob">mehr Anzeigen</label>
    <p class="about-us-text2">
        <b>Der Beginn</b><br>
        Alles began mit einem Studium Projekt von drei Hip-Hop begeisterten Studenten. Doch nun wollen wir unsere Idee allen zugänglich machen! <br><br>
        <b>Unsere Wurzeln: Hip-Hop</b><br>
        Wer etwas mit Grafiti, skaten oder im allgemeinen mit der Hip-Hop Kultur anfangen kann, ist bei uns genau richtig!
        Wir wollen für Hip-Hop Fans die erste Anlaufstelle sein, wenn es um lässige Kleidung oder bequeme Sneaker geht.<br><br>
        <b>Streetwear und Urban Fashion von Top-Marken</b><br>
        Aufgrund unserer erst vor kurzem gestarteten Verkauf ist unser Markenspektrum noch recht begrenzt. Jedoch planen wir in naher Zukunft neben Klassikern wie <i>Carhartt WIP</i> oder <i>Stüssy</i> auch jüngere Brands wie z.B.: <i>Wemoto, Ucon Acrobatics</i> und <i>HUF</i> abzudecken.<br>
        Wir sollen ständig aktuelle Trends verfolgen und frische Kollektionen zu unserem Bestand hinzufügen. Also bleib gespannt und schaue gerne in Zkunft nochmal vorbei!
    </p>
    <label class="show-less-link-mob" for="show-more-btn-mob">weniger Anzeigen</label>
</div>