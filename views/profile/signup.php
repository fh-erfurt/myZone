<?php
    # TODO JGE Register
?>



<h1>Register</h1>

<?php if($errMsg !== null) : ?>
    <div class="error-message">
        <?=$errMsg?>
    </div>
<?php endif; ?>
exitsiert bereits: testUser / 123456 <!-- TODO JGE-->
<form action="index.php?c=profile&a=signup" method="post">

    <?php
    // felder, die angezeigt werden sollen mit dazugehörigem placeholder, anzeigetyp und der Information, ob sie bei fehleingabe erinnert werden sollen. TODO JGE english
    $fields = [
        'username'        => ['Nutzername' ,         'text',     true ],
        'password'        => ['Passwort' ,           'password', false],
        'confirmPassword' => ['Passwort bestätigen', 'password', false]
    ];
    foreach($fields as $attribute => $placeholderTypeRemember) :
          $value = $placeholderTypeRemember[2] ? $_POST[$attribute] : ''?>
        <div class="input">
            <label for="<?=$attribute?>">
                <?=$placeholderTypeRemember[0]?>
            </label>
            <input id="<?=$attribute?>" name="<?=$attribute?>" type="<?=$placeholderTypeRemember[1]?>" placeholder="<?=$placeholderTypeRemember[0]?>" value="<?=htmlspecialchars($value)?>" required />
        </div>
    <?php endforeach; ?>

    <div class="input submit">
        <input name="submit" type="submit" value="Login"/>
    </div>
    ES WIRD NOCH NICHTS AN DB GESENDET <? # TODO ?>
</form>