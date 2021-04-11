<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbh = new PDO("mysql:host=$servername;dbname=peliculas", $username, $password);
    return $dbh;
}


function comprobarLoginBaseDatos($data){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT usuario,contrasena FROM usuarios WHERE usuario = :usuario and contrasena = :contrasena");
    if ($stmt->execute($data)) {

        return true;
    }
    else{
        return false;
    }

}



    function getAll(){
        $dbh = connect();
        $stmt = $dbh->prepare("SELECT * FROM peliculas");
        $stmt->execute();
        return $stmt->fetchObject();

}

function insertarPeliculaBase($data){
    $dbh = connect();
    $stmt = $dbh->prepare("INSERT INTO peliculas (codigo,titulo,categoria,año) VALUES (:codigo,:titulo,:categoria,:año)");
    $stmt->execute($data);


}
