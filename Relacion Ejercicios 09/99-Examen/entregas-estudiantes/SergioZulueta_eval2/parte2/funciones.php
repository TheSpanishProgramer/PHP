<?php


function connect(){
    $dbname = "pacientes";
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $dbh;

}

$dbh = connect();
function consulta($dbh){

    $stmt = $dbh->prepare("SELECT id, codigo, nombre, apellidos, atendido FROM pacientes");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $stmt->setFetchAll;
    return $stmt;

}

function insertarPaciente($dbh,$data){

    $stmt = $dbh->prepare("INSERT INTO pacientes (codigo, nombre, apellidos, atendido) VALUES (:codigo, :nombre, :apellidos, 0)");
    $stmt->execute($data);
    return $stmt;

}


function eliminarPacientes($dbh){

    $stmt = $dbh->prepare("DELETE FROM pacientes");
    $stmt->execute();
    return $stmt;
}


function atenderPacientes($dbh,$data){

    $stmt = $dbh->prepare("UPDATE pacientes SET atendido = 1 WHERE id = :id");
    $stmt->execute($data);
    return $stmt;
}