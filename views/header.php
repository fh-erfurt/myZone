<header class="header">
    <div class="inset">
        <a href="<?=$_SERVER['PHP_SELF']?>" class="logo">myZone</a>
        <a href="<?=$_SERVER['PHP_SELF']?>" class="logoMob">mZ</a>
        <div class="interact">
            <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Suchen">
                <a class="search-btn" href="#"><i class="fas fa-search"></i></a>
            </div>
            <div class="shopping-cart">
                <a class="shopping-cart-btn" href="#"><i class="fas fa-shopping-cart fa-2x"></i></a>
            </div>
            <div class="user">
                <a class="user-btn" href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=view" ><i class="far fa-user-circle fa-2x"></i></a>
            </div>
        </div>
    </div>
</header>
<nav class="jakob">
    <a href="<?=$_SERVER['PHP_SELF']?>"                           >HOME</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=search"          >SEARCH</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=allProducts"     >ALLE PRODUKTE</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=page3"           >SEITE3</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=wrongController&a=page3" >SEITE4</a>
    <? if($_SESSION['loggedIn']) :?> <p>-------------You are logged in!--</p> <?endif;?>
</nav>