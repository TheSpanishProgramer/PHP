<?php
require "conexion.php";
if(isset($_GET["user"],$_GET["password"])){
    $user = $_GET["user"];
    $password = $_GET["password"];
    validarUsuario($user,$password);
}

function validarUsuario($user,$password){
    $dbh = connect();

    $data=array("usuario"=>$user,"contrasena"=>$password);
    $stmt=$dbh->prepare("select usuario,contrasena from usuarios where usuario=:usuario and contrasena=:contrasena");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    if($row=$stmt->fetch()){
        if($row->usuario==$user){
            if($row->contrasena==$password){
                require "pacientes.php";
            }
        }
    }

    close($dbh);
}
