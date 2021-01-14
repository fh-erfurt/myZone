<footer class="footer">
    <div class="bottom">
        <a href="#">Impressum</a>
    </div>
    <div class="bottom">
        <a href="#">Über Uns</a>
    </div>
    <div class="bottom">
        <a href="#">Datenschutz</a>
    </div>
<script src="script.js"></script>
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