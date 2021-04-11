<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "peliculas";

    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    return $conn;
}

function comprobarLogin($dbh, $nombre, $password){
    $stmt = $dbh->prepare('select * from usuarios');
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    foreach ($stmt->fetchAll() as $usuario){
        if($usuario->usuario == $nombre && $usuario->contrasena == $password){
            return true;
        }
    }
    return false;
}


function insertarPelicula($dbh, $codigo, $titulo, $year, $categoria, $vista){
    $data = [
        "codigo" => $codigo,
        "titulo" => $titulo,
        "ano" => $year,
        "categoria" => $categoria,
        "vista" => $vista
    ];

    $stmt = $dbh->prepare('insert into peliculas (codigo, titulo, categoria, ano, vista) values (:codigo, :titulo, :categoria, :ano, :vista)');
    $stmt->execute($data);
}

function modificarPelicula($dbh, $codigo){
    $stmt = $dbh->prepare('update peliculas set vista = 1 where codigo = :codigo');
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();
}

function borrarPeliculas($dbh){
    $stmt = $dbh->prepare('delete from peliculas');
    $stmt->execute();
}

function getAll($dbh){
    $stmt = $dbh->prepare('select * from peliculas');
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetchAll();
}