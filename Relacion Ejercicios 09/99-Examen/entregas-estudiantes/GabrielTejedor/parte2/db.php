<?php
function conexion(){

    try{
        $con = new PDO("mysql:host=localhost;dbname=pacientes", root, '');

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $con;
    }catch (PDOException $e){
        $e->getMessage();
    }

}
function login($con,$user,$pass){

    $datos = array("usu"=>$user,"pass"=>$pass);
    $ps= $con->prepare("select * from usuarios where usuario = :usu and contrasena = :pass ");

    $ps->execute($datos);
    $us = $ps->fetchAll();
    echo count($us);
    return usuario;
}
function damePaciente($con){
    $ps = $con->prepare("select * from pacientes");
    $ps->setFetchMode(PDO::FETCH_ASSOC);
    $ps-> execute();
    return $ps;
}
function insertar($con,$cod,$nombre,$apellido){
    $datos = array("cod"=>$cod,"nombre"=>$nombre,"apellido" =>$apellido);
    $ps = $con->prepare("INSERT INTO pacientes (codigo, nombre, apellidos, atendido) VALUES (:cod,:nombre,:apellido)");

    $ps-> setFetchMode(PDO::FETCH_ASSOC);
    $ps->execute($datos);


}
function eliminar($con,$id){
    $ps = $con->prepare("delete from pacientes");
    $ps -> bindParam("id",$id);
    $ps -> execute();
}
function modificarAsid($con,$id){
    $ps= $con ->prepare("update pacientes set atendido = 1 where id = :id");
    $ps -> bindParam("id",$id);
    $ps ->execute();

}
