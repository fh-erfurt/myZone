<?php if(isset($errMsg)) : # TODO $GLOBALS['errors'][...]?>
    <div class="error-message" style="background: red">
        ERROR MESSAGE: <?=$errMsg?>
    </div>
<?php endif; ?>
<?php if(isset($validateUserID)) : # TODO $GLOBALS['errors'][...]?>
    <div class="validate-user" style="background: green">
        <a href="?c=profile&a=validateNewUser&uid=<?=$validateUserID?>"><button>Nutzer valideren</button></a>
    </div>
<?php endif; ?>
<div class="login-inset">
    <div class="pop-up">
        <input class="close-btn" type="checkbox" id="close-btn" />
        <label class="close-icon" for="close-btn">
            <span class="x-icon"></span>
        </label>
        <div class="input-login">
            <label class="typein" for="password">
                Passwort</label>
            <div class="typein-box">
                <input id="password" name="password" type="password" placeholder="" required />
            </div>
        </div>
    </div>
    <img class="background-img" src="<?=ROOTPATH.'/assets/img/background.jpg'?>">
</div>
test account: testUser / 123456 <!-- TODO JGE-->