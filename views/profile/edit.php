<div class="view-background">
    <div class="view-box">
        <form action="<?=$_SERVER['PHP_SELF']?>?c=profile&a=edit" method="post" class="personal-data">
                <?php if(isset($editErrors)) : foreach($editErrors as $error) : ?>
                    <div class="error-message">
                        <img class="red-x-icon" src="<?=ROOTPATH. '/assets/img/icons/red-x-icon.svg'?>">
                        <?=$error?>
                    </div>
                <?php endforeach; endif; ?>
                <h1 class="view-headline">Kontaktdaten ändern</h1>

                <?php
                // fields which can be edited with matching placeholder and type.
                $editFields = [
                    'firstName'       => ['Vorname',             'text'    , true],
                    'lastName'        => ['Nachname',            'text'    , true],
                    'email'           => ['E-Mail',              'text'    , true],
                    'phone'           => ['Telefonnummer',       'text'    , false],
                    'oldPassword'     => ['Passwort',            'password', true],
                ];
                foreach($editFields as $attribute => [$placeholder, $type, $required]) : ?>

                <div class="view-content">
                    <label for="<?=$attribute?>"><?=$placeholder?></label>
                    <div class="view-display">
                        <input class="input-txt" type="<?=$type?>" name="<?=$attribute?>" id="<?=$attribute?>" value="<?=htmlspecialchars($_SESSION['currentUser'][$attribute] ?? '')?>" <?= $required ? 'required' : ''?>>
                    </div>
                </div>

                <? endforeach ?>
                <div class="pw-edit-box">
                    <label class="pw-edit-label" for="changePw">Passwort ändern?</label>
                    <input class="pw-btn" type="checkbox" name="changePassword" id="changePw">

                    <?php
                    // fields which can be edited with matching placeholder and type.
                    $changePwFields = [
                        'newPassword'     => ['neues Passwort',      'password'],
                        'confirmPassword' => ['Passwort bestätigen', 'password']
                    ];
                    foreach($changePwFields as $attribute => [$placeholder, $type]) : ?>

                        <div class="new-pw-box">
                            <label for="<?=$attribute?>"><?=$placeholder?></label>
                            <div class="view-display">
                                <input class="input-txt" type="<?=$type?>" name="<?=$attribute?>" id="<?=$attribute?>" value="">
                            </div>
                        </div>

                    <? endforeach ?>

                </div>
                <div class="view-edit-box">
                    <input class="view-edit" type="submit" value="Ändern" name="submitNewData">
                </div>

        </form>
        <a class="logout-box" href="<?=$_SERVER['PHP_SELF']?>?c=profile&a=view">
            <input class="logout-btn" type="submit" value="Abbrechen">
        </a>
    </div>
</div>
