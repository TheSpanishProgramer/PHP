<?php
require "acceso_a_datos.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

conexion();
// iniciar la sesión
session_start();

// comprobar el inicio de sesión
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] > 0) {

    // comprobar si hay que añadir paciente, borrar todos o marcar como atendido
    if (isset($_GET['accion'])) {
        switch ($_GET['accion']) {
            case "anyadir_paciente":
                if (isset($_GET['codigo'], $_GET['nombre'], $_GET['apellidos'])) {
                    // añadir paciente
                    insertarPaciente($_GET['codigo'], $_GET['nombre'], $_GET['apellidos'], 0);
                }
                break;
            case "atender_paciente":
                atenderPaciente(isset($_GET['id']) ? $_GET['id'] : "nada");
                break;
            case "borrar_todos_pacientes":
                deleteAll();
                break;
        }
    }

    die(include "tabla.php");

} elseif (isset($_GET['usuario'], $_GET['contraseña'])) {
    // comprobar el usuario y contraseña para iniciar sesion
    $usuario = $_GET['usuario'];
    $contrasenya = $_GET['contraseña'];

    // comprobacion con la base de datos
    $usuario = selectByUser($usuario, $contrasenya);
    if ($usuario != -1) {
        //INICIAR SESION
        $_SESSION['usuario'] = $usuario;
        die(include "tabla.php");
    }

}

include "login.php";

