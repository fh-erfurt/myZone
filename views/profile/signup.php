<?php
    # TODO JGE Register
?>



<h1>Konto erstellen</h1>

<?php if($errMsg !== null) : # TODO $_SESSION['errors'][...]?>
    <div class="error-message">
        <?=$errMsg?>
    </div>
<?php endif; ?>
exitsiert bereits: testUser / 123456 <!-- TODO JGE-->
<form action="index.php?c=profile&a=signup" method="post">

    <?php
    // felder, die angezeigt werden sollen mit dazugehörigem placeholder, anzeigetyp und der Information, ob sie bei fehleingabe erinnert werden sollen. TODO JGE english
    $fields = [
        'firstName'       => ['Vorname',             'text',     true,  true ],
        'lastName'        => ['Nachname',            'text',     true,  true ],
        'email'           => ['E-Mail',              'text',     true,  true ],
        'phone'           => ['Telefonnummer',       'text',     true,  false],

        'username'        => ['Nutzername',          'text',     true,  true ],
        'password'        => ['Passwort',            'password', false, true ],
        'confirmPassword' => ['Passwort bestätigen', 'password', false, true ]
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
    ES WIRD NOCH NICHTS AN DB GESENDET <? # TODO ?>
</form>