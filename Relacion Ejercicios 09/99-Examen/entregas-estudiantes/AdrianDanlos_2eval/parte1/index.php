<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'funciones_index.php';

$arrayUsuarios = [
    0 => ['id' => 1, 'usuario' => 'jon', 'nombre' => 'jon', 'apellido' => 'vadillo', 'email' => 'jvadillo@gmail.com', 'contrasena' => 1234],
    1 => ['id' => 2, 'usuario' => 'jaime', 'nombre' => 'jaime', 'apellido' => 'malvido', 'email' => 'jaime@gmail.com', 'contrasena' => 4321]
];

//LOGIN
session_start();

if(!isset($_SESSION['user'])){
    require 'login.php';
}
else{
    require 'index_view.php';
}

if(isset($_POST['nombre']) && isset($_POST['password']) && $_POST['nombre'] != "" && $_POST['password'] != ""){
    //comprobar login
    $booleanCorrectLogin = checkLogin($_POST['nombre'], $_POST['password'], $arrayUsuarios);
    if($booleanCorrectLogin){
        $_SESSION['user'] = $_POST['nombre'];
        require 'index_view.php';
        //header('location','index_view.php');
    }
    else{
        echo 'usuario o contraseña incorrectos';
    }
}






//ACCIONES USUARIO
if(isset($_GET['accion'])){
    switch ($_GET['accion']){
        case 'insertar': guardarPaciente($_GET['codigo'],$_GET['nombre-paciente'],$_GET['apellido-paciente']);
            break;
        case 'vaciar': session_destroy();
            break;
        case 'atender': updateAtender($_GET['codigo']);
            break;
    }
}






