<header class="header">
    <div class="inset">
        <a href="<?=$_SERVER['PHP_SELF']?>" class="logo">myZone</a>
        <a href="<?=$_SERVER['PHP_SELF']?>" class="logoMob">mZ</a>
        <div class="interact">
            <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Suchen">
                <button class="search-btn" type="submit">
                    <img class="search-icon" src="<?=ROOTPATH. '/assets/img/icons/search-icon.svg'?>">
                </button>
            </div>
            <div class="shopping-cart">
                <a class="shopping-cart-btn" href="#">
                    <img class="shopping-cart-icon" src="<?=ROOTPATH. '/assets/img/icons/shopping-cart-icon.svg'?>">
                </a>
            </div>
            <div class="user">
                <input class="pop-up-btn" type="checkbox" id="pop-up-btn" />
                <label class="pop-up-icon" for="pop-up-btn">
                    <div class="pop-icon">
                        <img class="user-icon" src="<?=ROOTPATH. '/assets/img/icons/user-icon.svg'?>">
                    </div>
                </label>
                <div class="pop-up">
                    <label class="close-icon" for="pop-up-btn">
                        <img class="x-icon" src="<?=ROOTPATH. '/assets/img/icons/close-icon.svg'?>">
                    </label>
                    <form class="login" action="index.php?c=profile&a=login" method="post">
                        <h1 class="login-headline">Login</h1>
                        <div class="input-login">
                            <label class="typein" for="username">
                                Nutzername
                            </label>
                            <div class="typein-box">
                                <input id="username" name="username" type="username" placeholder="" value="<?=isset($username) ? $username : ''?>" required />
                            </div>
                        </div>

                        <div class="input-login">
                            <label class="typein" for="password">
                                Passwort</label>
                            <div class="typein-box">
                                <input id="password" name="password" type="password" placeholder="" required />
                            </div>
                        </div>

                        <div class="input-submit">
                            <input class="submit-btn" name="submit" type="submit" value="Login"/>
                        </div>

                        <div class="login-footer">
                            <a class="login-footer-link" href="index.php?c=profile&a=signup">Konto erstellen</a>
                        </div>
                    </form>
                </div>
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
    <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=ProductPage"     >Produktseite</a>
    <? if($_SESSION['loggedIn']) :?> <p>-------------You are logged in!--</p> <? endif; ?>
    <? if(isset($GLOBALS['errorMessages']['login'])) : ?><div class="error-message"><?=$GLOBALS['errorMessages']['login']?></div>   <? endif; ?>
</nav>