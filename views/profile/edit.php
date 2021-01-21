<form action="<?=$_SERVER['PHP_SELF']?>?c=profile&a=submitEdit" method="post" class="personal-data">
    <div class="view-box">
        <h1 class="view-headline">Kontaktdaten ändern</h1>
        <div class="view-content">
            <label for="firstName">Vorname</label>
            <div class="view-display">
                <input class="input-txt" type="text" name="firstName" id="firstName" value="<?=htmlspecialchars($_SESSION['currentUser']['firstName'])?>">
            </div>
        </div>
        <div class="view-content">
            <label for="lastName">Nachname</label>
            <div class="view-display">
                <input class="input-txt" type="text" name="lastName" id="lastName" value="<?=htmlspecialchars($_SESSION['currentUser']['lastName'])?>">
            </div>
        </div>
        <div class="view-content">
            <label for="email">E-Mail</label>
            <div class="view-display">
                <input class="input-txt" type="text" name="email" id="email" value="<?=htmlspecialchars($_SESSION['currentUser']['email'])?>">
            </div>
        </div>
        <div class="view-content">
            <label for="phone">Telefonnummer</label>
            <div class="view-display">
                <input class="input-txt" type="text" name="phone" id="phone" value="<?=htmlspecialchars($_SESSION['currentUser']['phone'])?>">
            </div>
        </div>
        <div class="view-content">
            <label for="username">Benutzername</label>
            <div class="view-display">
                <input class="input-txt" type="text" name="username" value="<?=htmlspecialchars($_SESSION['currentUser']['username'])?>">
            </div>
        </div>
        <div class="pw-edit-box">
            <input type="checkbox" name="changePassword" id="changePw">
            <label for="changePw">Passwort ändern?</label>
            <div class="view-display">
                <input  class="input-txt" type="text" name="newPassword" id="newPw">
            </div>
        </div>
        <div class="view-content">
            <input class="view-edit" type="submit" value="Ändern" name="submitNewData"> <!-- TODO altes passwort eingabe-->
        </div>
        </div>
</form>
<a class="view-box" href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=view">
    <input class="logout-btn" type="submit" value="Abbrechen">
</a>
<?php
var_dump($_POST);
?>
