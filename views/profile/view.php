<div class="view-box">
    <h1 class="view-headline">Meine Kundendaten</h1>
    <div class="view-content">
        <label for="firstName">Vorname</label>
        <div class="view-display">
            <input class="input-txt" type="text" name="firstName" id="firstName" value="<?=htmlspecialchars($_SESSION['currentUser']['firstName'])?>" readonly>
        </div>
    </div>
    <div class="view-content">
        <label for="lastName">Nachname</label>
        <div class="view-display">
            <input class="input-txt" type="text" name="lastName" id="lastName" value="<?=htmlspecialchars($_SESSION['currentUser']['lastName'])?>" readonly>
        </div>
    </div>
    <div class="view-content">
        <label for="email">E-Mail</label>
        <div class="view-display">
            <input class="input-txt" type="text" name="email" id="email" value="<?=htmlspecialchars($_SESSION['currentUser']['email'])?>" readonly>
        </div>
    </div>
    <div class="view-content">
        <label for="phone">Telefonnummer</label>
        <div class="view-display">
            <input class="input-txt" type="text" name="phone" id="phone" value="<?=htmlspecialchars($_SESSION['currentUser']['phone'])?>" readonly>
        </div>
    </div>
    <div class="view-content">
        <label for="username">Benutzername</label>
        <div class="view-display">
            <input class="input-txt" type="text" name="username" value="<?=htmlspecialchars($_SESSION['currentUser']['username'])?>" readonly>
        </div>
    </div>
    <div class="view-action">
        <a class="view-action-box" href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=edit">
            <input class="view-edit" type="submit" value="Kundendaten bearbeiten">
        </a>
        <form class="view-action-box" action="index.php?c=profile&a=logout" method="post">
            <input class="logout-btn" name="submit" type="submit" value="Logout"/>
        </form>
    </div>
</div>