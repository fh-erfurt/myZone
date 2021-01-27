<footer class="footer">
    <div class="bottom">
        <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=impressum">Impressum</a>
    </div>
    <div class="bottom">
        <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=about">Über Uns</a>
    </div>
    <div class="bottom">
        <a href="<?=$_SERVER['PHP_SELF']?>?c=pages&a=privacyPolicy">Datenschutz</a>
    </div>
</footer>




<?    $debugMode  = true; # just for readability?>
<? if($debugMode) : ?>
<div style="height:500px">
    <?
    echo            '$_SERVER: <textarea>';
    var_dump($_SERVER);
    echo '</textarea>$_SESSION: <textarea>';
    var_dump($_SESSION);
    echo '</textarea>$sqlErrors: <textarea>';
    var_dump($sqlErrors ?? 'no sqlErrors');
    echo '</textarea>Error page cause: <textarea>'.((isset($errCause)) ? $errCause : 'no debug info').'</textarea>';
    echo '</textarea>$errMsg (remove from code): <textarea>'.((isset($errMsg)) ? $errMsg : 'no $errMsg set (good)').'</textarea>'; # TODO remove
    ?>
</div>
<? endif; ?>