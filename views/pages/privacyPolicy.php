<div class="doc-box">
    <h1 class="doc-headline">Dokumentation</h1>
    <h2 class="doc-subhead">1. Idee</h2>
    <p>
        Aufgrund gemeinsamer Interessen haben wir uns entschieden im Rahmen der Veranstaltungen Grundlagen
        der Webprogrammierung und Dynamische Webprogrammierung einen Streetwear Online-Shop zu erstellen.
        <h2 class="doc-subsubhead">1.1 Zielgruppe:</h2>
        Wie für einen Streetwear Online-Shop üblich soll auch unser Shop vorwiegend modebewusste jugendliche und junge Erwachsene ansprechen, die
        auf der Suche nach lässiger Alltagskleidung oder bequemen Sneakern sind. Unsere Kunden können auf unserer Shopseite nach Produkten suchen und
        sie entweder als Gast oder als registrierter Benutzer bestellen.
    </p>
    <h2 class="doc-subhead">2. Recherche</h2>
    <p>
        Um einen Einblick in die Gestaltung und den Funktionsumfang anderer Shopseiten zu erhalten, haben wir uns verschiedene
        Webshops angeschaut. Nach eingehender Analyse verschiedener Seiten, sind uns folgende Dinge aufgefallen, die wir bei der Umsetzung unseres Projektes beachten wollen:
    </p>
    <ul>
        <li><b>1.</b> Ein schlichtes und modernes Design mit dezenten Farben trägt dazu bei, dass sich die Aufmerksamkeit des Kunden auf die Produkte richtet.</li>
        <li><b>2.</b> Ansprechende und passende Bilder, die zu unsere Zielgruppe passen, erzeugen eine zusätzliche Bindung mit unserer Seite.</li>
        <li><b>3.</b> Leicht verständliche und intuitive Bedienung um das Suchen und Kaufen von Produkten so einfach wie möglich zu gestalten.</li>
    </ul>
    <div class="website-screenshot-box">
        <a class="website-link" href="https://www.adidas.de/" target=”_blank”>
            <img class="screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/AdidasScreenshot.png'?>">
            <div class="screenshot-info">Adidas Webshop</div>
        </a>
        <a class="website-link" href="https://www.hhv.de/shop/de" target=”_blank”>
            <img class="screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/hhvScreenshot.png'?>">
            <div class="screenshot-info">HHV Webshop</div>
        </a>
        <a class="website-link" href="https://www.mifcom.de/" target=”_blank”>
            <img class="screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/MifComScreenshot.png'?>">
            <div class="screenshot-info">MifCom Webshop</div>
        </a>
    </div>
    <h2 class="doc-subhead">3. Design</h2>
    <p>
        <h2 class="doc-subsubhead">3.1 Farben</h2>
        Wie bereits erwähnt, haben wir uns für ein modernes und schlichtes Design entschieden um unseren
        Produkten den größtmöglichen Raum zu geben. Auf Grund dessen haben wir hauptsächlich dezente Farben verwendet.
        Um Buttons oder andere wichtige Interaktionen hervorzuheben haben jegliche Buttons und Links einen etwas auffälligen Blauton.
    </p>
    <div class="colors">
        <div class="colorbox">
            <img src="<?=ROOTPATH. '/assets/img/docu-images/HeaderColor.png'?>">
            <ul>
                <li>Header Color</li>
                <li>Grey 25</li>
                <li>Hex.: #404040</li>
                <li>RGB: R64 G64 B64</li>
                <li>CMYK: C0% M0% Y0% K75%</li>
            </ul>
        </div>
        <div class="colorbox">
            <img src="<?=ROOTPATH. '/assets/img/docu-images/FooterColor.png'?>">
            <ul>
                <li>Footer Color</li>
                <li>Grey 28</li>
                <li>Hex.: #dedede</li>
                <li>RGB: R222 G222 B222</li>
                <li>CMYK: C0% M0% Y0% K13%</li>
            </ul>
        </div>
        <div class="colorbox">
            <img src="<?=ROOTPATH. '/assets/img/docu-images/btnColor.png'?>">
            <ul>
                <li>Button Color</li>
                <li>Blue</li>
                <li>Hex.: #1122db</li>
                <li>RGB: R17 G34 B219</li>
                <li>CMYK: C92% M84% Y0% K14%</li>
            </ul>
        </div>
    </div>
    <p> <h2 class="doc-subsubhead">3.2 Schrift</h2>
        Als Hausschrift für unseren Webshop haben wir uns für die Schriftart Roboto entschieden. Sie zeichnet sich vor allem durch ihren modernen, grafisch sauberen und gut lesbaren Charakter aus.
        Somit passt diese Schriftart perfekt zu unserem schlichten und funktionalen Design.
    </p>
    <h2 class="doc-subsubhead">3.3 Layout</h2>
    <p>Die abgebildeten Wireframes wurden mittels Figma erstellt.</p>
    <div class="website-screenshot-box">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/WireframeHomepage.png'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/WireframeProducts.png'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/WireframeMobile.png'?>">
    </div>
    <p><b>Finales Layout:</b><br><br>
        Das Layout unserer Seite ähnelt dem vieler Webshops und wurde mittels CSS <b>Flexboxen</b> realisiert.<br> Der <b>Header</b> beinhaltet unser Logo, welches gleichzeitig auch als Link zu unserer Homepage fungiert,
        eine Suchleiste, sowie Links zum Warenkorb und zum Login/ zur Profilübersicht. Auf spezielle Funktionen gehen wir im späteren Verlauf noch ein.<br>
        Die <b>Navigationsleiste</b> unterhalb des Headers führt zu den beiden zentralen Kategorien unseres Webshops (Schuhe / Streetwear). Ein Dropdown Menü mit weiteren Unterkategorien konnten wir leider nicht implementieren, da wir einerseits erst eine überschaubare Menge an Produkten hinzugefügt haben und uns andererseits die Zeit gefehlt hat.
        Unter der Navigationsleiste befindet sich auf der Seite aller Schuhe der <b>Filter</b>. Dieser filtert die Suche nach verschiedenen Marken, Farben oder sortiert das Ergebnis alphabetisch / anhand des Preises*.
        Auf der Homepage befindet sich eine Auswahl der <b>Topseller</b> um den Kunden direkt die am besten verkauften Produkte zu präsentieren. Der aufklappbare Text unterhalb der Topseller soll dem Besucher unser “Unternehmen” näher bringen.
    </p>
    <div class="website-screenshot-box">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/Layout1.png'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/Layout2.png'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/Layout3.png'?>">
    </div>
    <p>
    <h2 class="doc-subsubhead">3.4 Hintergrundbilder:</h2>
        Die Hintergrundbilder zeigen typische Motive urbaner Hip-Hop Kultur: Street Art, Basketball, Caps und entspannte Alltagskleidung. Unsere Zielgruppe, die mit dieser Kultur aufgewachsen ist, soll sich durch diese Bildauswahl auf unserer Website wohlfühlen und sich angesprochen fühlen.
    </p>
    <div class="website-screenshot-box">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/Background/Homepage.jpeg'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/Background/profile.jpg'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/Background/BackgroundSignup.jpg'?>">
    </div>
    <p>
        <h2 class="doc-subsubhead">3.5 Responsive Design</h2>
        Bei der Gestaltung unseres Webshops war uns das responsive Design sehr wichtig, da unsere Zielgruppe vorwiegend mobile Geräte nutzt.
        Wesentliche Änderungen mussten wir bei der Suchleiste und bei der Filterleiste vornehmen. Diese Funktionen werden bei mobilen Geräten verkleinert dargestellt und vergrößern, wenn man auf das jeweilige Symbol klickt.
        Für diese Änderungen wurden Checkboxen verwendet.
    </p>
    <div class="website-screenshot-box">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/ResponsiveDesign.png'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/ResponsiveDesign2.png'?>">
        <img class="wireframe-screenshot" src="<?=ROOTPATH. '/assets/img/docu-images/ResponsiveDesign3.png'?>">
    </div>
    <h2 class="doc-subhead">4. Navigationsstruktur</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/Seitenhierachie.png'?>">
    <h2 class="doc-subhead">5. Datenbankmodell</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/Datenbankmodell.png'?>">
    <h2 class="doc-subhead">6. Funktionen</h2>
    <h2 class="doc-subsubhead">6.1 Homepage</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenHome.png'?>">
    <h2 class="doc-subsubhead">6.2 Signup</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenSignup.png'?>">
    <h2 class="doc-subsubhead">6.3 Produktübersicht</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenProductsAll.png'?>">
    <h2 class="doc-subsubhead">6.4 Produktseite</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenView.png'?>">
    <h2 class="doc-subsubhead">6.5 Warenkorb</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenShoppingCart.png'?>">
    <h2 class="doc-subsubhead">6.6 Kasse</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenCheckout.png'?>">
    <h2 class="doc-subsubhead">6.7 Profil bearbeiten</h2>
    <img class="big-img" src="<?=ROOTPATH. '/assets/img/docu-images/FunktionenProfileEdit.png'?>">
    <p>
        <b>Legende:</b><br>
        Blau: CSS <br>
        Lila: PHP <br>
        Gelb: Java <br>
        Orange: MySQL Datenbank <br>

    </p>
    <h2 class="doc-subhead">7. Besonderheiten</h2>
    <p>Da wir uns auf die fehlerfreie Implementierung aller wichtigen Features konzentriert haben, mussten wir auf die komplette Kategorie
      Streetwear verzichten. Aufgrund der wenigen unterschiedlichen Produkte konnten wir zudem kein Dropdown Menü für eine feinere Kategorisierung unserer Produkte einbauen. Zusätzlich konnten wir mit Javascript den Blureffekt für den Login Pop-up nicht auf den Header anwenden, weil sich
    der Pop-up-Container im Header befindet. Zudem konnten wir wegen mangelnder Zeit keinen count für die Stückzahl im Warenkorb implementieren. Obwohl es in der Datenbank möglich ist, verschiedenen Usern die selbe Adresse zuzuordnen, haben wir uns aus Zeitgründen dazu entschieden, dies in den PHP Funktionen als 1:1 Beziehung zu nutzen.
    Da die Funktionen "Bestellung" und "Filter" unter einem gewissen Zeitdruck implementiert wurden, könnten diese eventuell unsauber umgesetzt worden sein.<br>
    <b>Error Codes:</b> Wir haben bewusst bestimmte Fehlerfälle in Form von Fehlercodes für den Nutzer sichtbar gemacht, um diese an den Support weitergeben zu können.
    </p>
    <h2 class="doc-subhead">8. Lessons Learned</h2>
    <p>
        Der <b>Git-Workflow</b> hat Dariush Naghed und Felix Zwicker am Anfang des Projektes noch etwas Probleme bereitet. Jedoch konnte Jakob Gensel dem Team mit Erfahrung und Geduld bei dieser Hürde weiterhelfen.<br><br>
        Im folgenden haben wir einige Erfahrungen, die wir bei den verschiedenen Teilbereichen gesammelt haben, aufgelistet:<br>
        <b>CSS:</b> Die Nutzung von Flexbox-Layout; Checkbox als workaround für das Ein- und Ausblenden von Containern; Bildimplementierung; einbinden von Fonts etc. <br>
        <b>PHP:</b> Aufbau, Nutzung und Pflege der MVC-Struktur (Wie teile ich meine Controller auf?); Joined SQL Models in MVC implementieren; Codestyle PHP/HTML; das Abfangen von Fehlern ist in Skriptsprachen sehr aufwendig <br>
        <b>MySQL:</b> ER: Zuhammenhang zwischen User, Customer und Address in einem Shop-System; Foreign Key immer mit Suffix nutzen, da Spaltennamen sonst Keywords enthalten können (order)<br>
        <b>JavaScript:</b> Umgang mit getElementsByClassName; Funktionen, die nur auf gewissen Seiten funktionieren; EventListener; Manipulation des Styles</b>

    </p>
    <h2 class="doc-subhead">9. Projektmanagement</h2>
    <p>
        Die <b>Kommunikation</b> in unserem Team lief gut und konstant. Wir kommunizierten regelmäßig in unserer WhatsApp-Gruppe oder auf dem Discord-Server unseres Jahrgangs. Dabei tauschten wir Ideen aus und verteilten die zu erledigenden Aufgaben.<br>
        Im folgenden ist die Einteilung der Arbeitsbereiche aufgelistet:<br>
        <b>Jakob Gensel: </b> PHP, SQL, Projektstruktur, Aufgabenverteilung;<br>
        <b>Dariush Naghed: </b> Idee, HTML, CSS, Design, Wireframes, Dokumentation, Produkte, Texte;<br>
        <b>Felix Zwicker: </b> Idee, Javascript, Präsentationen, Wireframes, Navigationsstruktur;
    </p>
</div>




