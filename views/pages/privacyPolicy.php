PRIVACY POLICY

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

<div class="doc-box">
    <h1 class="doc-headline">MyZone Dokumentation</h1>
    <h2 class="doc-subhead">1. Idee</h2>
    <p class="idea-text">
        Aufgrund gemeinsaner Interessen haben wir uns entschieden einen
    </p>
</div>

<?

foreach($_SESSION['currentUser'] as $key => $value)
{
    echo $key.': _ '.$value.'<br>';
}
echo '<br><BR>';
$address = \dwp\models\Address::selectWhere('id = '.$_SESSION['currentUser']['address'])[0];
$schema = ['street','number','city','zipCode'];
foreach($schema as $key)
{
    echo $key.': _ '.$address->$key.'<br>';
}

?>



