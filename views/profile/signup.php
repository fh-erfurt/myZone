<script src="<?=ROOTPATH.'/assets/js/signup.js'?>" type="text/javascript"></script>
<div class="signup">
    <div class="signup-login-box">
        <div class="login-box">
            <?php if(isset($loginErrors)) : foreach($loginErrors as $error) : # TODO wird auf login weitergeleitet?>
                <div class="error-message">
                    <img class="red-x-icon" src="<?=ROOTPATH. '/assets/img/icons/red-x-icon.svg'?>">
                    <?=$error?>
                </div>
            <?php endforeach; endif; ?>
            <?php if(isset($_SESSION['validateUserID']) && ! empty($_SESSION['validateUserID'])) : ?>
                <div class="validate-user" style="background: green">
                    <a href="?c=profile&a=validateNewUser&uid=<?=$_SESSION['validateUserID']?>"><button>Nutzer valideren</button></a>
                </div>
            <?php endif; ?>
                <div class="second-try">
                    <form class="login-input-box" action="index.php?c=profile&a=login" method="post">
                        <h2 class="second-login-headline2">Ich bin bereits Kunde</h2>
                        <div class="input-login">
                            <label class="typein" for="username">
                                Nutzername
                            </label>
                            <div class="second-typein-box">
                                <input id="second-username" name="username" type="username" placeholder="" value="<?=isset($username) ? $username : ''?>" required />
                            </div>
                        </div>

                        <div class="input-login">
                            <label class="typein" for="password">
                                Passwort</label>
                            <div class="second-typein-box">
                                <input id="second-password" name="password" type="password" placeholder="" required />
                            </div>
                        </div>

                        <div class="input-submit">
                            <input class="submit-btn" name="submit" type="submit" value="Login"/>
                        </div>
                    </form>
                </div>
        </div>
        <div class="signup-box">
                <h2 class="signup-headline">Ich bin Neukunde</h2>
            <?php if(isset($signupErrors)) : foreach($signupErrors as $error) : ?>
                <div class="error-message">
                    <?=$error?>
                </div>
            <?php endforeach; endif; ?>

            <form action="index.php?c=profile&a=signup" method="post">

                <?php
                // felder, die angezeigt werden sollen mit dazugehörigem placeholder, anzeigetyp und der Information, ob sie bei fehleingabe erinnert werden sollen.
                $signupFields = [
                    'firstName'       => ['Vorname*',             'text',     true,  true ],
                    'lastName'        => ['Nachname*',            'text',     true,  true ],
                    'email'           => ['E-Mail*',              'text',     true,  true ],
                    'phone'           => ['Telefonnummer',        'text',     true,  false],

                    'username'        => ['Nutzername*',          'text',     true,  true ],
                    'newPassword'     => ['Passwort*',            'password', false, true ],
                    'confirmPassword' => ['Passwort bestätigen*', 'password', false, true ]
                ];
                foreach($signupFields as $attribute => [$placeholder, $type, $remember, $required]) :
                    // if the remember value is true AND the post parameter is set save it into the variable, which is written into the textfield.
                    $value = $remember ? $_POST[$attribute] ??  '' : ''; ?>
                    <div class="signup-input">
                        <div class="input-box" id="input-box-<?=$attribute?>">
                            <input class="input-txt" id="<?=$attribute?>" name="<?=$attribute?>" type="<?=$type?>" placeholder="<?=$placeholder?>" value="<?=htmlspecialchars($value)?>"<?=$required ? ' required' : ''?> />
                        </div>
                    </div>
                <?php endforeach; ?>
                <p class="input-info">* Pflichtfeld</p>

                <div class="signup-submit">
                    <input class="signup-btn" name="submit" type="submit" value="Sign Up"/>
                </div>
            </form>
        </div>
    </div>
    <img class="signup-background" src="<?=ROOTPATH. '/assets/img/signup-background.jpg'?>">
</div>
<div class="login-notification">
    <? if($_SESSION['loggedIn']) :?>
        <div class="successful-login">
            <img class="check-icon" src="<?=ROOTPATH. '/assets/img/icons/green-check-icon.svg'?>">
            Du bist nun bei MyZone eingeloggt!
            <label class="close-not-icon" for="close-not-btn"></label>
        </div> <? endif; ?>
</div>
exitsiert bereits: testUser / 123456 <!-- TODO JGE --><br>
gültiges Pw wäre z.B.: pwT35T#+