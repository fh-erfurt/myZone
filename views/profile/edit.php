<form action="<?=$_SERVER['PHP_SELF']?>?c=profile&a=submitEdit" method="post" class="personal-data">

    <div class="left">
        <div class="img">
            <img style="height:100px" src="assets/img/profile.png" alt="<?=$_SESSION['currentUser']['firstName']?>">
        </div>
    </div>

    <div class="right">
        <div>
            <label for="firstName">Vorname</label>
            <input type="text" name="firstName" id="firstName" value="<?=htmlspecialchars($_SESSION['currentUser']['firstName'])?>">
        </div>
        <div>
            <label for="lastName">Nachname</label>
            <input type="text" name="lastName" id="lastName" value="<?=htmlspecialchars($_SESSION['currentUser']['lastName'])?>">
        </div>
        <div>
            <label for="email">E-Mail</label>
            <input type="text" name="email" id="email" value="<?=htmlspecialchars($_SESSION['currentUser']['email'])?>">
        </div>
        <div>
            <label for="phone">Telefonnummer</label>
            <input type="text" name="phone" id="phone" value="<?=htmlspecialchars($_SESSION['currentUser']['phone'])?>">
        </div>
        <div>
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username" value="<?=htmlspecialchars($_SESSION['currentUser']['username'])?>">
        </div>
        <div>
            <input type="checkbox" name="changePassword" id="changePw">
            <label for="changePw">Passwort ändern?</label>
            <input type="text" name="newPassword" id="newPw">
        </div>
        <input type="submit" value="neue Daten speichern" name="submitNewData"> <!-- TODO altes passwort eingabe-->
    </div>

</form>
<a href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=view">
    <input type="submit" value="abbrechen">
</a>
<?php
var_dump($_POST);
?>
