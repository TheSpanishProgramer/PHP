<?php
session_start();
require_once "funciones_db.php";
$dbh = connect();

//si está logeado
if(isset($_SESSION['usuario'])){
    if(isset($_GET["action"])){
        comprobarAccion($dbh);
    }
    $peliculas = getAll($dbh);
    require_once "views/peliculas.php";
}
//Si esta realizando un intento de login
else if(isset($_POST['nombre']) && isset($_POST['password'])){
    $login = comprobarLogin($dbh, $_POST['nombre'], $_POST['password']);

    if($login){
        $_SESSION['usuario'] = $_POST['nombre'];
        $peliculas = getAll($dbh);
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

function comprobarAccion($dbh){
    switch ($_GET["action"]){
        case "insertar": insertarPelicula($dbh, $_GET['codigo'],$_GET['titulo'],$_GET['year'],$_GET['categoria'],0);
            break;
        case "modificar": modificarPelicula($dbh, $_GET['codigo']);
            break;
        case "borrar": borrarPeliculas($dbh);
            break;
    }
}