<?

// paths
define('ROOTPATH',          strlen(dirname($_SERVER['PHP_SELF'])) > 1 ? dirname($_SERVER['PHP_SELF']).DIRECTORY_SEPARATOR : DIRECTORY_SEPARATOR);
define('VIEWSPATH',         'views'      .DIRECTORY_SEPARATOR);
define('CONTROLLERSPATH',   'controllers'.DIRECTORY_SEPARATOR);
define('COREPATH',          'core'       .DIRECTORY_SEPARATOR);
define('MODELSPATH',        'models'     .DIRECTORY_SEPARATOR);


?>