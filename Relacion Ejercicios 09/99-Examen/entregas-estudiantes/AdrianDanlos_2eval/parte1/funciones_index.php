<?php



function checkLogin($nombre, $password, $arrayUsuarios){
    foreach ($arrayUsuarios as $usuario){
        if($usuario['usuario'] == $nombre && $usuario['contrasena'] == $password){
            return true;
        }
    }
    return false;
}

function guardarPaciente($codigo, $nombre, $apellidos){

    $paciente = ['codigo' => $codigo, 'nombre' => $nombre, 'apellidos' => $apellidos, 'atender' => 0];

    if(!isset($_SESSION['pacientes'])){
        $arrayPacientes = [];
        array_push($arrayPacientes, $paciente);
        $_SESSION['pacientes'] = $arrayPacientes;
    }
    else{
        array_push($_SESSION['pacientes'], $paciente);
    }

}

function updateAtender($codigo){
    foreach ($_SESSION['pacientes'] as $paciente){
        if($codigo == $paciente['codigo']){
            $paciente['atender'] = 1;
        }
    }
}
