<?php

function connect(){

    $dbname = "alumnos";
    $host = "localhost";
    $user = "root";
    $pass = "";

    try {
        # MySQL
        $dbh= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $dbh;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}

function lanzarConsulta($dbh){
    $stmt = $dbh->prepare("SELECT nombre, apellidos, edad FROM alumno");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        echo $row['nombre'] . "<br>";
        echo $row['apellidos'] . "<br>";
        echo $row['edad'] . "<hr>";
    }
}

function lanzarInsert($dbh){
    echo ".....INICIANDO INSERT.........";
    $data = array(
        'nombre' => 'Arantza',
        'apellidos' => 'Uriarte',
        'email' => 'arantza@gmail.com',
        'edad' => 25 );
    $stmt = $dbh->prepare("INSERT INTO alumno(nombre, apellidos, email, edad) 
      values (:nombre, :apellidos, :email, :edad)");
    $stmt->execute($data);
    echo ".....FINALIZADO.........<hr><hr>";
}


$dbh = connect();
lanzarConsulta($dbh);
lanzarInsert($dbh);
lanzarConsulta($dbh);


