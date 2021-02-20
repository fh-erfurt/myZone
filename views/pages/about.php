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