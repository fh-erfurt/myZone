<? global $loggedIn; ?>
<header class="header">
    <? if(isset($_SESSION['cart'])) echo '<div id="cart-count" hidden>'.sizeof($_SESSION['cart']).'</div>'?>
    <div class="inset">
        <a href="<?=$_SERVER['PHP_SELF']?>" class="logo">myZone</a>
        <a href="<?=$_SERVER['PHP_SELF']?>" class="logoMob">mZ</a>
        <div class="interact">
            <input class="search-btn-mob" type="checkbox" id="search-btn-mob"/>
            <label class="search-mob-box" for="search-btn-mob">
                <img class="search-icon-mob" src="<?=ROOTPATH. '/assets/img/icons/search-icon.svg'?>">
            </label>
            <form class="search-pop-up" method="get">
                <input name="c" value="products" hidden>
                <input name="a" value="search" hidden>
                <div class="search-box">
                    <input class="search-txt" type="text" name="s" placeholder="Suchen">
                    <button class="search-btn" type="submit">
                        <img class="search-icon" src="<?=ROOTPATH. '/assets/img/icons/search-icon.svg'?>">
                    </button>

                </div>
            </form>
            <div class="shopping-cart">
                <a class="shopping-cart-btn" href="<?$_SERVER['PHP_SELF']?>?c=products&a=shoppingCart">
                    <img class="shopping-cart-icon" src="<?=ROOTPATH. '/assets/img/icons/shopping-cart-icon.svg'?>">
                </a>
            </div>
            <div class="user">
                <? # if no user is logged in, generate the element to display the login popup on click. if you are on the login page, you don't need another form
                if(!$loggedIn && $actionName != 'login' && $actionName != 'signup') : ?><input class="pop-up-btn" type="checkbox" id="pop-up-btn" /><? endif; ?>
                <label class="pop-up-icon" for="pop-up-btn">
                    <div class="pop-icon">
                        <? # if a user is logged in, generate a link to the view profile page
                        if($loggedIn) echo '<a href="'.$_SERVER['PHP_SELF'].'?c=profile&a=view">'; ?>
                            <img class="user-icon" src="<?=ROOTPATH. '/assets/img/icons/user-icon.svg'?>">
                        </a>
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
            <label class="close-search-icon" for="search-btn-mob">
                <img class="x-search-icon" src="<?=ROOTPATH. '/assets/img/icons/white-close-icon.svg'?>">
            </label>
        </div>
    </div>
</header>
<nav class="jakob"><!-- TODO remove in final version -->
    <a href="<?=$_SERVER['PHP_SELF']?>"                           >HOME</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=products&a=shoppingCart" >CART</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=products&a=all"          >ALLE PRODUKTE</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=wrongController&a=page3" >ERROR</a>
    <? if($loggedIn) :?><p>-------------You are logged in as <?=$_SESSION['currentUser']['username'] ?? 'ERROR'?>!--</p> <? endif; ?>
    <? if(isset($GLOBALS['errorMessages']['login'])) : ?><div class="error-message"><?=$GLOBALS['errorMessages']['login']?></div>   <? endif; ?>
</nav>