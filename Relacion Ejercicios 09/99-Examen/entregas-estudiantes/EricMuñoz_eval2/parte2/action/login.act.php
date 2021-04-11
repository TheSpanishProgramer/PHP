<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../bbdd.php";
if (isset($_GET['usuario']) && !empty($_GET['usuario']) && isset($_GET['password']) && !empty($_GET['password'])) {
    $dbh=connect();
    $data=array(
        'usuario'=>$_GET['usuario'],
        'contrasena'=>$_GET['password'],
    );
    $usuario=searchUsuario($dbh,$data);
    $dbh=close();
    if($usuario===false){
        header('location:../login.php?error=1');
    }
    else{
        header('location:../pacientes.php');
    }
}
