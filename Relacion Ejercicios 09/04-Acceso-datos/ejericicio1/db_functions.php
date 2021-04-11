<?php
/**
 * Funciones de acceso a datos.
 */

function connect(){
    $dbname = "ListaCompra";
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

function getAll($dbh){
    $stmt = $dbh->prepare("SELECT * FROM items");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetchAll();
}

function insert($dbh, $texto){
    $data = array(
        'texto' => $texto
    );
    $stmt = $dbh->prepare("INSERT INTO items(texto) VALUES (:texto)");
    $stmt->execute($data);
}

function deleteById($dbh, $id){
    $data = array(
        'id' => $id
    );
    $stmt = $dbh->prepare("DELETE FROM items WHERE id = :id");
    $stmt->execute($data);
}

function deleteAll($dbh){
    $stmt = $dbh->prepare("DELETE FROM items");
    $stmt->execute();
}