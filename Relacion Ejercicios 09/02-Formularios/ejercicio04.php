<?php

// Datos de acceso de los usuarios:
$usuarios = array(
    "user1" => array(
        "nombre" => 'Ane',
        "apellidos" => 'López',
        "password" => '123Abc'
    ),
    "user2" => array(
        "nombre" => 'Amaia',
        "apellidos" => 'Otsoa',
        "password" => '456Xyz'
    )
);

// Codigos de los errores. En función del error se muestra su mensaje correspondiente.
$ERROR_TYPES = [
    1 => "La contraseña no es correcta.",
    2 => "El usuario no existe."
];

/**
 * Devuelve 0 si el login es correcto, 1 si la contraseña es incorrecta o 2 si el usuario no existe.
 *
 * @param $usuario
 * @param $password
 * @param $usuarios
 * @return int
 */
function comprobarLogin($usuario, $password, $usuarios) {
    if (array_key_exists($usuario, $usuarios)) {
        if ($usuarios[$usuario]["password"] == $password) {
            return 0;
        } else {
            return 1;
        }
    } else {
        return 2;
    }
}

if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $login = comprobarLogin($_POST["usuario"], $_POST["password"], $usuarios);
    // Si el usuario ha accedido correctamente, mostramos el mensaje de bienvenida:
    if ($login == 0) {
        $nombre = $usuarios[$_POST["usuario"]]["nombre"];
        $apellidos = $usuarios[$_POST["usuario"]]["apellidos"];
        // Cargar la vista
        require "ejercicio04.view.php";
    } else {
        // Si ha habido un error, guardamos el mensaje de error para mostrarlo en la vista.
        $mensaje_error = $ERROR_TYPES[$login];
        // Cargar la vista
        require "ejercicio04login.view.php";
    }
} else {
    // Cargar la vista con el formulario por primera vez
    require "ejercicio04login.view.php";
}