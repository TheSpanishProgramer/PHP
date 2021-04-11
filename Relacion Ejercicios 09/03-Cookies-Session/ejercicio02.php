<?php

// Comprobamos si nos están enviando un valor nuevo a almacenar en las cookies
if(isset($_GET["texto"])) {
    setcookie("usuario", $_GET["texto"], time() + 7*24*60*60);
}

// Comprobamos si
if(isset($_GET["accion"])&& $_GET["accion"] == 'borrarCookie') {
    setcookie("usuario", null, -1);
}

// Si en la petición nos están enviando el dato en las cookies, actualizamos el usuario
if(isset($_COOKIE["usuario"])) {
    $usuario = $_COOKIE["usuario"];
}

// Cargamos la vista
require "ejercicio02.view.php";