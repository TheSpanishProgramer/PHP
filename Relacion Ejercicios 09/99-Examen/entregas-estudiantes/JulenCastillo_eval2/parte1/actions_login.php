<?php

$usuarios = array(
    1 => array(
        "usuario" => "jvadillo",
        "nombre" => "jon",
        "apellido" => "vadillo",
        "email" => "jvadillo@egibide.org",
        "password" => "1234"
    ),
    2 => array(
        "usuario" => "jmalvido",
        "nombre" => "jaime",
        "apellido" => "malvido",
        "email" => "jmalvido@egibide.org",
        "password" => "4321"
    ));

if (isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['password']) && !empty($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];
    comprobarDatos($usuarios,$username,$password);
}


function comprobarDatos($usuarios,$username,$password){

    foreach ($usuarios as $user => $item ){

        if ($item["usuario"] == $username && $item["password"] == $password) {
            echo "hola";
            require_once "pacientes.php";

        }
        else {
            require_once "index.php";
        }

    };



}
?>