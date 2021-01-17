<?php
# TODO JGE Login
?>
<div class="login-inset">
    <div class="second-login">
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
    <img class="background-img" src="<?=ROOTPATH.'/assets/img/background.jpg'?>">
</div>
test account: testUser / 123456 <!-- TODO JGE-->