<div class="view-background">
    <div class="view-box">
        <h1 class="view-headline">Meine Kundendaten</h1>

        <?php
        // fields which should be shown with matching placeholder and type.
        $viewFields = [
            'firstName'       => ['Vorname',             'text'],
            'lastName'        => ['Nachname',            'text'],
            'email'           => ['E-Mail',              'text'],
            'phone'           => ['Telefonnummer',       'text'],

            'username'        => ['Nutzername',          'text']
        ];
        foreach($viewFields as $attribute => [$placeholder, $type]) : ?>

            <div class="view-content">
                <label for="<?=$attribute?>"><?=$placeholder?></label>
                <div class="view-display">
                    <input class="input-txt" type="<?=$type?>" name="<?=$attribute?>" id="<?=$attribute?>" value="<?=htmlspecialchars($_SESSION['currentUser'][$attribute])?>" readonly>
                </div>
            </div>

        <? endforeach ?>
        <div class="view-action">
            <a class="view-action-box" href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=edit">
                <input class="view-edit" type="submit" value="Kundendaten bearbeiten">
            </a>
            <form class="view-action-box" action="index.php?c=profile&a=logout" method="post">
                <input class="logout-btn" name="submit" type="submit" value="Logout"/>
            </form>
        </div>
    </div>
</div>