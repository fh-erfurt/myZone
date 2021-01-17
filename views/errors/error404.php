<div class="error-box">
    <div class="error">
        <img class="sad-face" src="<?=ROOTPATH. '/assets/img/icons/sad-face.svg'?>">
        <?
            if(!isset($errMsg) || empty($errMsg))
            {
                $errMsg = 'Sorry! Wir können die Seite nicht finden, die du suchst.';
            }
            # in finaler Version vielleicht einfach so etwas wie 'Upps, irgendwas ist schief gelaufen...'
        ?>
        <h1 class="error-404">404</h1>
        <h2 class="error404-message"><?=$errMsg?></h2>
        <a class="home-link" href="<?=$_SERVER['PHP_SELF']?>">Zur Startseite</a>
    </div>
    <img class="error-background-img" src="<?=ROOTPATH. '/assets/img/MyZone_Background_blurred.jpg'?>">
</div>
