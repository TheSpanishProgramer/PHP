<?php

/**
 * Si todavía no se ha inicializado el array
 * de pacientes, lo creamos.
 */
function inicializarpacientes() {
    if(!isset($_SESSION["pacientes"])){
        $_SESSION["pacientes"] = array();
    }
}

/**
 * Devuelve true si existe el usuario y la
 * contraseña está OK.
 */
function comprobarLogin($usuarios, $usuario, $contrasena) {
    if(isset($usuarios[$usuario])){
        if($usuarios[$usuario]["contrasena"] == $contrasena){
            return true;
        }
    }
    return false;
}

function insertarPaciente($codigo, $nombre, $apellidos){
    $paciente = array(
        "codigo" => $codigo,
        "nombre" => $nombre,
        "apellidos" => $apellidos,
        "atendido" => 0
    );
    array_push($_SESSION["pacientes"], $paciente);

}

function borrarTodos(){
    $_SESSION["pacientes"] = array();
}

function borrarPaciente($codigoPaciente){
    $index = 0;
    foreach ($_SESSION['pacientes'] as $paciente)
    {
        if($paciente["codigo"] == $codigoPaciente){

            //unset($_SESSION["pacientes"][$index]);
            //$_SESSION["pacientes"] = array_values($_SESSION["pacientes"]);
            array_splice($_SESSION["pacientes"], $index, 1);
        }
        $index++;
    }
}

function marcarPacienteAtendido($codigoPaciente){
    $index = 0;
    foreach ($_SESSION['pacientes'] as $paciente)
    {
        if($paciente["codigo"] == $codigoPaciente){
            $_SESSION['pacientes'][$index]["atendido"] = 1;
        }
        $index++;
    }
}