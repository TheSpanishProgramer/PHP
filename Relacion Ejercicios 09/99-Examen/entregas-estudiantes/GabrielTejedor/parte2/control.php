<?php
session_start();
require_once ("db.php");

if(isset($_POST['entrar'])){
    comprobar($_POST['user'],$_POST['pass']);

}
else if(isset($_SESSION['user'])){
    if (isset($_POST['guardar'])) {
        insertar(conexion(),$_POST['cod'] ,$_POST['nom'],$_POST['ape'],0);


    }
    if (isset($_GET['borrar'])) {
        borrar();
    }
    if (isset($_GET['atendido'])) {
        modificarAsid(conexion(),$_GET['atendido']);
    }
    require_once ("paciente.php");
}

function comprobar($user,$pass){

    $encontrado = 0;
    $us = login(conexion(),$user,$pass);
    if(count($us)>0){
       
        require_once ("paciente.php");
    }
    else{
        require_once ("index.php");
    }


}

?>