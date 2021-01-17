<? $debugMode = false ?>
<div class="error-box">
    <div class="error">
        <img class="sad-face" src="<?=ROOTPATH. '/assets/img/icons/sad-face.svg'?>">
        <h1 class="error-404">404</h1>
        <h2 class="error404-message">Sorry! Wir können die Seite nicht finden, die du suchst.</h2>
        <? if($debugMode ) echo (isset($errCause)) ? $errCause : 'no debug info'; #  && !empty($errCause)?>
        <a class="home-link" href="<?=$_SERVER['PHP_SELF']?>">Zur Startseite</a>
    </div>
    <img class="error-background-img" src="<?=ROOTPATH. '/assets/img/MyZone_Background_blurred.jpg'?>">
</div>
