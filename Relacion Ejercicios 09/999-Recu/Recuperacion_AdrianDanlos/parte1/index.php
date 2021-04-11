<?php
session_start();
require_once "funciones_session.php";
require_once "datos.php";

//si está logeado
if(isset($_SESSION['usuario'])){
    if(isset($_GET["action"])){
        comprobarAccion();
    }
    require_once "views/peliculas.php";
}
//Si esta realizando un intento de login
else if(isset($_POST['nombre']) && isset($_POST['password'])){
    $login = comprobarLogin($usuarios, $_POST['nombre'], $_POST['password']);

    if($login){
        $_SESSION['usuario'] = $_POST['nombre'];
        inicializarArrayPeliculas();
        require_once "views/peliculas.php";
    }
    else{
        require_once "views/login.php";
    }
}
//Si es la primera vez que accede
else{
    require_once "views/login.php";
}

function comprobarAccion(){
    switch ($_GET["action"]){
        case "insertar": insertarPelicula($_GET['codigo'],$_GET['titulo'],$_GET['year'],$_GET['categoria'],0);
            break;
        case "modificar": modificarPelicula($_GET['codigo']);
            break;
        case "borrar": borrarPeliculas();
            break;
    }
}