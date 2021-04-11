<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
function connect(){
    $myDB = "peliculas";
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    return $conn;
}
session_start();
if(isset($_SESSION["usuario"])){
    require_once "views/peliculas.php";
}
else{
    require_once "views/login.php";
}
if(isset($_GET["usuario"],$_GET["contrasena"])){
    $user = comprobarlogin($_GET["usuario"],$_GET["contrasena"]);

    if($user != null){
        $_SESSION["usuario"]= $_GET["usuario"];
    }
}
function comprobarlogin($usuario,$contrasena){
 $conn =connect();
 $data = array("usuario"=>$usuario,"contrasena"=>$contrasena);
 $stmt=$conn->prepare("select * from usuarios where usuario=:usuario and contrasena=:contrasena");
 $stmt->execute($data);

 return $stmt;
}