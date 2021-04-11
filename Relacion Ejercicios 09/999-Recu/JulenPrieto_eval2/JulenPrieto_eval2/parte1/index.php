<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "Hola recu!";
session_start();
include_once("datos.php");
include_once("funciones_datos.php");

if(!isset($_SESSION["usuario"])){
    if(isset($_REQUEST["accion"])&& $_REQUEST["accion"] =="login"){
        if(comprobarLogin()){
            $_SESSION["usuario"] = $_REQUEST["usuario"];
            inicializarArray();
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


function comprobarLogin(){
    foreach ($_SESSION["usuarios"] as $i => $usuario){
        if($_REQUEST["usuario"] == $usuario["usuario"] && $_REQUEST["password"] == $usuario["password"]){
            return true;
        }else{
            return false;
        }
    }
}

function comprobarAccion($accion){

    var_dump($accion);
    switch ($accion){
        case "insert":
            //var_dump($_REQUEST);
            //insert();
            break;
        case "update":
            //update($_REQUEST["codigo"]);
            break;
        case "delete":
            borrar();
            break;
    }
    inicializarArray();
    include_once("views/peliculas_view.php");

}