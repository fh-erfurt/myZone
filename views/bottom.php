<footer class="bottom">
    <ul>
        <li><a href="">Impressum</a></li>
        <li><a href="">Über uns</a></li>
        <li><a href="">Datenschutz</a></li>
    </ul>
    <?=isset($_SESSION['errors']) && $_SESSION['errors'] ? 'Errors Array (SQL): '.var_dump($_SESSION['errors']) : ''?>

    <?
    echo 'loginData: '; var_dump($_SESSION['loginData']);
    echo '<br>'.'errors[0]: '; var_dump($_SESSION['errors0']);
    echo '<br>'.'SQL: '; var_dump($_SESSION['sql']);
    ?>
</footer>