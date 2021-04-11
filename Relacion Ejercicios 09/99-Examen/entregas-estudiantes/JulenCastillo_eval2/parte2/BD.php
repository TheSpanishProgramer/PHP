<?php
function connect(){

    $servername = "localhost";
    $username = "root";
    $password = '';

    $conn = new PDO("mysql:host=$servername;dbname=pacientes", $username, $password);
    return $conn;
}



function comprobarDatosLogin($dbh,$username,$password)
{


    $data = array(
        "usuario" => $username,
        "contrasena" => $password
    );

    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE usuario = :usuario and contrasena = :contrasena");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute($data);


        while ($row -> $stmt){
        }
}
//conexion
$dbh = connect();


//prepare y execute
