<header>
    <h1>MyZone</h1>
    <!--<img src="img.png" alt="Cover">-->
    <?=isset($_SESSION['currentUser']['username']) ? $_SESSION['currentUser']['username'] : ''?>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=view"><img id="profileIcon" src="<?=ROOTPATH?>assets/img/profile.png"></a>
    <? if($_SESSION['loggedIn']) : ?>
    <form action="index.php?c=profile&a=logout" method="post">
        <input name="submit" type="submit" value="Logout"/>
    </form>
    <? endif; ?>
    <nav>
        <a href="<?=$_SERVER['PHP_SELF']?>"                           >HOME</a>
        <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=search"          >SEARCH</a>
        <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=allProducts"     >ALLE PRODUKTE</a>
        <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=page3"           >SEITE3</a>
        <a href="<?=$_SERVER['PHP_SELF']?>?c=wrongController&a=page3" >SEITE4</a>
    </nav>
</header>