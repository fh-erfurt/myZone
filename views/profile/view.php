<form action="#" method="post" class="personal-data">

    <div class="left">
        <div class="img">
            <img style="height:100px" src="assets/img/profile.png" alt="<?=$_SESSION['currentUser']['firstName']?>">
        </div>
    </div>

    <div class="right"> <!-- TODO Felder zuerst read only und Edit button? (JS) -->
        <div>
            <label for="fname">Vorname</label>
            <input type="text" name="fname" id="fname" value="<?=htmlspecialchars($_SESSION['currentUser']['firstName'])?>">
        </div>
        <div>
            <label for="lname">Nachname</label>
            <input type="text" name="lname" id="lname" value="<?=htmlspecialchars($_SESSION['currentUser']['lastName'])?>">
        </div>
        <div>
            <label for="email">E-Mail</label>
            <input type="text" name="email" id="email" value="<?=htmlspecialchars($_SESSION['currentUser']['email'])?>">
        </div>
        <div>
            <label for="username">Telefonnummer</label>
            <input type="text" name="phone" id="phone" value="<?=htmlspecialchars($_SESSION['currentUser']['phone'])?>">
        </div>
        <div>
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username" value="<?=htmlspecialchars($_SESSION['currentUser']['username'])?>">
        </div>
        <div>
            <input type="checkbox" name="changePassword" id="changePw">
            <label for="changePw">Passwort ändern?</label>
            <input type="text" name="newPassword">
        </div>
        <input type="submit" value="Neue Daten speichern" name="submitNewData"> <!-- TODO -->
    </div>

</form>