<?php
// Ejecutamos la lógica de arranque de la app, o lógica de bootstrap
require '../vendors/AgendaPHPGuay/People.php';
use \AgendaPHPGuay\People;
// Borramos el contacto
People::getInstance(__DIR__ . "/../data/people.csv")
    ->delete(urldecode($_GET['email']))
    ->write();
// Redireccionamos a la página principal
header('Location: /agenda/people/list.php ');
exit;