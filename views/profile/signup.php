<h1>Konto erstellen</h1>
<?php if(isset($signupErrors)) : foreach($signupErrors as $error): ?>
    <div class="error-message" style="background: #9d4242">
        <?=$error?>
    </div>
<?php endforeach; endif; ?>
<div style="background: orange">
    bereits vorhandene Nutzerprofile <br> <!-- TODO JGE -->
    testUser / test@email.de <br>
    realUser / real@person.com <br>
    gültiges Pw wäre z.B.: pwT35T#+ <br>
    WERTE WERDEN IN DB GESPEICHERT
</div>
<form action="index.php?c=profile&a=signup" method="post">

    <?php
    // fieldsto be displayed with placeholder, displaytype and two booleans representing if the values should be remembered and are required.
    $fields = [
        'firstName'       => ['Vorname*',             'text',     true,  true ],
        'lastName'        => ['Nachname*',            'text',     true,  true ],
        'email'           => ['E-Mail*',              'text',     true,  true ],
        'phone'           => ['Telefonnummer',        'text',     true,  false],

        'username'        => ['Nutzername*',          'text',     true,  true ],
        'password'        => ['Passwort*',            'password', false, true ],
        'confirmPassword' => ['Passwort bestätigen*', 'password', false, true ]
    ];
    foreach($fields as $attribute => $placeholder_type_remember_required) :
        // if the remember value is true AND the post parameter is set save it into the variable, which is written into the textfield.
          $value = $placeholder_type_remember_required[2] ? $_POST[$attribute] ??  '' : ''; ?>
        <div class="input">
            <label for="<?=$attribute?>">
                <?=$placeholder_type_remember_required[0]?>
            </label>
            <input id="<?=$attribute?>" name="<?=$attribute?>" type="<?=$placeholder_type_remember_required[1]?>" placeholder="<?=$placeholder_type_remember_required[0]?>" value="<?=htmlspecialchars($value)?>" <? if($placeholder_type_remember_required[3]) echo 'required'?> />
        </div>
    <?php endforeach; ?>

    <div class="input submit">
        <input name="submit" type="submit" value="Konto erstellen"/>
    </div>
</form>