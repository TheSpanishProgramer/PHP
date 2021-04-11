<?php
session_start();
include_once("datos.php");
if(isset($_POST['entrar'])){

    comprobar($_POST['user'],$_POST['pass'],$users);
}
else if(isset($_SESSION['user'])){
    if (isset($_POST['guardar'])) {
        if (!isset($_SESSION['pacientes'])) {

            $_SESSION['pacientes'] = array();
        }

        array_push($_SESSION['pacientes'], array($_POST['cod'] => array("nombre" => $_POST['nom'], "apellido" => $_POST['ape'], "atendido" => 0)));
        echo "<h1>paciente guardado</h1>";

    }
    if (isset($_GET['borrar'])) {
        $_SESSION['pacientes'] = null;
    }
    if (isset($_GET['atendido'])) {
        $_SESSION['pacientes'][$_GET['atendido']['atendido']] = 1;
        echo "<h1>paciente atendido</h1>";
    }
    require_once ("paciente.php");
}

function comprobar($usuario,$pass,$users){

    $encontrado = 0;
    foreach ($users as $user){

        if($user['user'] ==$usuario && $user['pass'] ==$pass){
            $_SESSION['user'] = $user;

            $encontrado = 1;
            require_once ("paciente.php");
        }

    }
    if($encontrado ==0){
        require_once("index.php");
    }
}

?>