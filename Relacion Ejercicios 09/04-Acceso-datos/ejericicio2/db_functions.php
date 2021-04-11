<?php
/**
 * Funciones de acceso a datos.
 */

function connect(){
    $dbname = "empleados";
    $host = "localhost";
    $user = "root";
    $pass = "";

    try {
        # MySQL
        $dbh= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}

function getAll($dbh){
    $stmt = $dbh->prepare("SELECT * FROM empleado");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getById($dbh, $id){
    $stmt = $dbh->prepare("SELECT * FROM empleado WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $data = array(
        "id" => $id
    );
    $stmt->execute($data);
    return $stmt->fetchObject();
}

function insert($dbh, $empleado){
    //die(json_encode($empleado));
    try {
        $stmt = $dbh->prepare("INSERT INTO empleado (nombre, apellidos, email, dni, sexo, edad, fecha_nacimiento, curriculum)
                                VALUES (:nombre, :apellidos, :email, :dni, :sexo, :edad, :fecha_nacimiento, :curriculum)");

        $stmt->execute($empleado);
    } catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }


    //$stmt = $dbh->prepare("INSERT INTO empleado (nombre, apellidos, email, dni, sexo, edad, fecha_nacimiento, curriculum)
    //    VALUES ('Ane', 'Urrutia Larrain', 'aurrutia@gmail.com', '72752343Z', 'Mujer', 27, '1992-10-06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius tellus turpis, et cursus urna aliquet non. Aenean in mi mattis, bibendum est sed, accumsan metus. Ut dapibus rhoncus sem, eu condimentum turpis hendrerit dignissim. Integer accumsan mauris tellus, in fermentum ex dignissim in. Vestibulum quis fringilla sapien, at tempus.'");
    //

}

function deleteById($dbh, $id){
    $data = array(
        'id' => $id
    );
    $stmt = $dbh->prepare("DELETE FROM empleado WHERE id = :id");
    $stmt->execute($data);
}

function deleteAll($dbh){
    $stmt = $dbh->prepare("DELETE FROM empelado");
    $stmt->execute();
}
