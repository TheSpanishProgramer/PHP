<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciamos sesión o cargamos la existente
session_start();
require_once "functions-db.php";
$db = connect();


// Si ya está logueado.
if(isset($_SESSION["usuario"])) {

    if(isset($_GET["accion"])){

        // Comprobamos si nos están:
        //   Añadiendo, borrando o marcando como resuelta una paciente.
        comprobarAcciones($db, $_GET["accion"]);
    }

    // Mostramos el listado de pacientes.
    $pacientes = getAll($db);
    require_once "views/pacientes.view.php";
}
// Si está intentando loguearse.
else if(isset($_POST["login"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"])) {

    $login = comprobarLogin($db, $_POST["usuario"], $_POST["contrasena"]);

    if($login){
        // Guardamos el nombre de usuario en sesión.
        $_SESSION["usuario"] = $_POST["usuario"];
        $pacientes = getAll($db);
        // Mostramos el listado de pacientes.
        require_once "views/pacientes.view.php";
    } else {
        require_once "views/login.view.php";
    }
}
// Si no, le mostramos la pantalla de login.
else {
    require_once "views/login.view.php";
}

/**
 * Miramos si nos están enviando una paciente.
 * Si tenemso que crearla, la metemos al array.
 */
function comprobarAcciones($db, $accion) {

    switch ($accion) {
        case 'nuevo':
            if(isset($_GET["codigo"])){
                insert($db, $_GET["codigo"], $_GET["nombre"], $_GET["apellidos"], 0);
            }
            break;
        case 'borrarTodos':
            deleteAll($db);
            break;
        case 'marcar':
            setAtendido($db, $_GET["codigo"]);
            break;
        case 'borrar':
            delete($db, $_GET["codigo"]);
            break;
        default:
            // No hacer nada.
            break;
    }
    $pacientes = getAll($db);
    require_once "views/pacientes.view.php";
}




