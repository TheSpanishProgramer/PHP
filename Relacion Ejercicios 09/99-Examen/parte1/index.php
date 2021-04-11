<?php
// Iniciamos sesión o cargamos la existente
session_start();
require_once "functions-session.php";
require_once "datos.php";


// Si ya está logueado.
if(isset($_SESSION["usuario"])) {

    if(isset($_GET["accion"])){

        // Comprobamos si nos están:
        //   Añadiendo, borrando o marcando como resuelta una paciente.
        comprobarAcciones($_GET["accion"]);
    }

    // Mostramos el listado de pacientes.
    require_once "views/pacientes.view.php";
}
// Si está intentando loguearse.
else if(isset($_POST["login"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"])) {

    $login = comprobarLogin($usuarios, $_POST["usuario"], $_POST["contrasena"]);

    if($login){
        // Guardamos el nombre de usuario en sesión.
        $_SESSION["usuario"] = $_POST["usuario"];

        // Inicializamos el array de pacientes si no existe.
        inicializarpacientes();
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
function comprobarAcciones($accion) {

    switch ($accion) {
        case 'nuevo':
            if(isset($_GET["codigo"])){
                insertarPaciente($_GET["codigo"], $_GET["nombre"], $_GET["apellidos"]);
            }
            break;
        case 'borrarTodos':
            borrarTodos();
            break;
        case 'marcar':
            marcarPacienteAtendido($_GET["codigo"]);
            break;
        case 'borrar':
            borrarPaciente($_GET["codigo"]);
            break;
        default:
            // No hacer nada.
            break;
    }
    require_once "views/pacientes.view.php";
}




