<?php
require "usuarios.php";

// iniciar la sesión
session_start();

// comprobar el inicio de sesión
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] > 0) {
    if (!$_SESSION['pacientes'] > 0) {
        $_SESSION['pacientes'] = [];
    }
    // comprobar si hay que añadir paciente, borrar todos o marcar como atendido
    if (isset($_GET['accion'])) {
        switch ($_GET['accion']) {
            case "anyadir_paciente":
                if (isset($_GET['codigo'], $_GET['nombre'], $_GET['apellidos'])) {
                    $paciente = array("codigo" => $_GET['codigo'], "nombre" => $_GET['nombre'],
                        "apellidos" => $_GET['apellidos'], "atendido" => "0");
                    // añadir paciente
                    array_push($_SESSION['pacientes'], $paciente);
                }
                break;
            case "atender_paciente":
                foreach ($_SESSION['pacientes'] as $paciente => $values) {
                    if (isset($_GET['id']) && $_GET['id'] == $paciente) {
                        // poner atendido a 1
                        $values['atendido'] = "1";
                        $_SESSION['pacientes'][$paciente] = $values;
                        break;
                    }
                }
                break;
            case "borrar_todos_pacientes":
                $_SESSION['pacientes'] = array();
                break;
        }
    }

    die(include "tabla.php");

} elseif (isset($_GET['usuario'], $_GET['contraseña'])) {
    // comprobar el usuario y contraseña para iniciar sesion
    $usuario = $_GET['usuario'];
    $contrasenya = $_GET['contraseña'];

    // comprobacion con el array
    foreach ($usuarios as $user => $value) {
        if ($value['usuario'] == $usuario && $value['contraseña'] == $contrasenya) {
            // iniciar sesion y guardar el usuario en sesion
            $_SESSION['usuario'] = $value;
            die(include "tabla.php");
        }
    }
}

include "login.php";

