<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once("funcionesDb.php");
$dbh = conn();

if(!isset($_REQUEST["accion"])){
    $_REQUEST["accion"] = "";
}

if(!isset($_SESSION["usuario"])){
    if(isset($_REQUEST["accion"])&& $_REQUEST["accion"] =="login"){
        if(comprobarUsuario($dbh,$_REQUEST["usuario"],$_REQUEST["password"])){
            $_SESSION["usuario"] = 1;
            comprobarAccion($_REQUEST["accion"]);
        }else{
            include_once("views/login_view.php");
        }
    }else{
        include_once("views/login_view.php");
    }
}else{
    echo "ya hay sesion";
    comprobarAccion($_REQUEST["accion"]);
}


function comprobarAccion($accion){
    global $dbh;
    var_dump($accion);
    switch ($accion){
        case "insert":
            //var_dump($_REQUEST);
            insert($dbh,$_REQUEST["codigo"],$_REQUEST["titulo"],$_REQUEST["categoria"],$_REQUEST["ano"]);
            break;
        case "update":
            var_dump($_REQUEST);
            update($dbh,$_REQUEST["codigo"]);
            break;
        case "delete":
            delete($dbh);
            break;
    }

    selectAll($dbh);
    include_once("views/peliculas_view.php");

}