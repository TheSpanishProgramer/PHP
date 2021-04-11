<?php

session_start();
require_once "datos.php";
if(isset($_SESSION["usuario"])){
    require_once "views/peliculas.php";
}
else{
    require_once "views/login.php";
}
if(isset($_GET["usuario"],$_GET["contrasena"])){
    comprobarlogin($usuarios,$_GET["usuario"],$_GET["contrasena"]);
}
function comprobarlogin($usuarios,$usuario,$contrasena){
    foreach($usuarios as $user) {
        if($user["usuario"]==$usuario && $user["contrasena"]==$contrasena){
            $_SESSION["usuario"]=$usuario;
        }
    }
}