<?php
session_start();

//spl_autoload_register($class);
/*{
    $path = str_replace('   \\', DIRECTORY_SEPARATOR, $class);
    require_once('.\\' . $path . '.php');
}
*/
use Controllers\defaultController;

$default = new defaultController;
echo $default->indexAction();

