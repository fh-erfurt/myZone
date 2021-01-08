<?php
    # TODO JGE Login
?>



<h1>Login</h1>

<?php if($errMsg !== null) : ?>
    <div class="error-message">
        <?=$errMsg?>
    </div>
<?php endif; ?>
test account: testUser / 123456 <!-- TODO JGE-->
<form action="index.php?c=profile&a=login" method="post">
    <div class="input">
        <label for="username">
            Nutzername
        </label>
        <input id="username" name="username" type="text" placeholder="Nutzername" value="<?=htmlspecialchars($username)?>" required />
    </div>

    <div class="input">
        <label for="password">
            Passwort:
        </label>
        <input id="password" name="password" type="password" placeholder="Passwort" required />
    </div>

    <div class="input submit">
        <input name="submit" type="submit" value="Login"/>
    </div>
    <div class="login-footer">
        <a href="index.php?c=profile&a=signup">Konto erstellen</a>
    </div>
</form>