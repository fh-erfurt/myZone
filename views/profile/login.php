<?php
    # TODO JGE Login
?>
<?php if($errMsg !== null) : ?>
    <div class="error-message">
        <?=$errMsg?>
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