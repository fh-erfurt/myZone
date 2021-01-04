    <div class="left">
        <div class="img">
            <img style="height:100px" src="assets/img/profile.png" alt="<?=$_SESSION['currentUser']['firstName']?>">
        </div>
    </div>

    <div class="right">
        <div>
            <label for="firstName">Vorname</label>
            <input type="text" name="firstName" id="firstName" value="<?=htmlspecialchars($_SESSION['currentUser']['firstName'])?>" readonly>
        </div>
        <div>
            <label for="lastName">Nachname</label>
            <input type="text" name="lastName" id="lastName" value="<?=htmlspecialchars($_SESSION['currentUser']['lastName'])?>" readonly>
        </div>
        <div>
            <label for="email">E-Mail</label>
            <input type="text" name="email" id="email" value="<?=htmlspecialchars($_SESSION['currentUser']['email'])?>" readonly>
        </div>
        <div>
            <label for="phone">Telefonnummer</label>
            <input type="text" name="phone" id="phone" value="<?=htmlspecialchars($_SESSION['currentUser']['phone'])?>" readonly>
        </div>
        <div>
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username" value="<?=htmlspecialchars($_SESSION['currentUser']['username'])?>" readonly>
        </div>
        <a href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=edit">
            <input type="submit" value="persönliche Daten bearbeiten">
        </a>
        <form action="index.php?c=profile&a=logout" method="post">
            <input name="submit" type="submit" value="Logout"/>
        </form>
    </div>