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
<div style="height:500px">
    <?
    echo isset($_SESSION['errors']) && $_SESSION['errors'] ? 'Errors Array (SQL): '.var_dump($_SESSION['errors']) : '';
    echo '<textarea>';
    echo 'loginData: '; var_dump($_SESSION['loginData']);
    echo '</textarea><br><textarea>';
    echo 'SQL: ';       var_dump($_SESSION['sql']);
    echo '</textarea><br><textarea>';
    echo '$_SERVER: ';       var_dump($_SERVER);
    echo '</textarea><br><textarea>';
    echo '$_SESSION: ';       var_dump($_SESSION);
    echo '</textarea>';
    ?>
</div>