<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'db_functions.php';



//LOGIN

if(!isset($_SESSION['user'])){
    require 'login.php';
}
else{
    require 'index_view.php';
}

if(isset($_POST['nombre']) && isset($_POST['password']) && $_POST['nombre'] != "" && $_POST['password'] != ""){
    //comprobar login
    $booleanCorrectLogin = checkLogin($_POST['nombre'], $_POST['password']);
}

if(isset($booleanCorrectLogin)){
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
        case 'insertar': insertarPaciente($_GET['codigo'],$_GET['nombre-paciente'],$_GET['apellido-paciente']);
            break;
        case 'vaciar': deleteAll();
            break;
        case 'atender': updateAtender($_GET['id']);
            break;
    }
}






