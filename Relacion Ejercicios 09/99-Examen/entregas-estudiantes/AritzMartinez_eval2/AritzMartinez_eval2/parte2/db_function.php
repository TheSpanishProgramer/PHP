<?php

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=pacientes", $username, $password);
        return $conn;
    }catch (PDOException $e){
        $e->getMessage();
        return null;
    }

}

function select ($conn){

    $stmt = $conn->prepare("Select * from pacientes");
    $stmt->execute();
    return $stmt->fetchAll();

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

}

function insertPaciente($conn,$cod,$nom,$apellido,$atendido){
    $data = array('cod'=>$cod,'nom'=>$nom,'apellido'=>$apellido,'atendido'=>$atendido );
    $stmt = $conn->prepare("Insert INTO pacientes (codigo,nombre,apellidos,atendido) VALUES (:cod,:nom,:apellido,:atendido)");
    $stmt->execute($data);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


}
function updatePaciente($conn,$nombre){
    $data =  array('atendido'=>1,'nom'=>$nombre );
    $stmt = $conn->prepare("Update pacientes set atendido = :atendido where nombre = :nom");
    $stmt->execute($data);

}

function deletePaciente($conn,$cod){
    $data =  array('cod'=>$cod);
    $stmt = $conn->prepare("Delete from pacientes  where codigo = :cod");
    $stmt->execute($data);
}

function comprobarUsu ($conn,$nom,$pass){
    $data = array('usu'=>$nom,'pass'=>$pass);

    $stmt = $conn->prepare("Select id from usuarios where usuario= :usu and contrasena = :pass");
    $stmt->execute($data);

    return $stmt->fetchAll();

}




?>