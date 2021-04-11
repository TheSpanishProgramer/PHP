<?php
session_start();
include_once "funcionessession.php";

$usuarios = [
    "jvadillo"=>[
        "codigo"=>"1",
        "nombre"=>"jon",
        "apellidos"=>"vadillo",
        "contrasena"=>"1234"
    ],
    "jcastillo"=>[
        "codigo"=> "2",
        "nombre"=> "julen",
        "apellidos"=>"castillo",
         "contrasena"=>"1234"
    ]

];

if (isset($_SESSION["usuario"])){

    if(!isset($_SESSION["peliculas"])){
        inicializarPeliculas();
    }


    if (isset($_GET["accion"])){
        comprobarAccion($_GET["accion"]);
    }




    require_once "views/peliculas.php";
}

else if(isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["contrasena"]) && !empty($_POST["contrasena"])) {


    $login = comprobarLogin($usuarios, $_POST["usuario"], $_POST["contrasena"]);

    if ($login) {
        $_SESSION["usuario"] = $_POST["usuario"];
        if(!isset($_SESSION["peliculas"])){
            inicializarPeliculas();
        }
        require_once "views/peliculas.php";

    } else {
        require_once "views/login.php";
    }
}

else{

        require_once "views/login.php";
    }
