<?php
function chargerClasse($classe) {
    $path = __DIR__;
    $path = substr($path,-30,25);
    require $path . "Tables\\" . $classe . '.php';
    require $path . "Managers\\" . $classe . 'Manager.php';
}

spl_autoload_register('chargerClasse');
