<?php
/**
 * Funciones de acceso a datos.
 */

function connect(){
    $dbname = "pacientes";
    $host = "localhost";
    $user = "newuser";
    $pass = "password";

    try {
        # MySQL
        $dbh= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $dbh;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}

function getUser($dbh, $usuario){
    $data = array(
        'usuario' => $usuario
    );
    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt->fetchObject();
}

function comprobarLogin($dbh, $usuario, $contrasena) {
    $usuario = getUser($dbh,$usuario);
    if($usuario != null){
        if($usuario->contrasena == $contrasena){
            return true;
        }
    }
    return false;
}

function getAll($dbh){
    $stmt = $dbh->prepare("SELECT * FROM pacientes");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetchAll();
}

function insert($dbh, $codigo, $nombre, $apellidos, $atendido){
    $data = array(
        'codigo' => $codigo,
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'atendido' => $atendido
    );
    $stmt = $dbh->prepare("INSERT INTO pacientes(codigo, nombre, apellidos, atendido) VALUES (:codigo, :nombre, :apellidos, :atendido)");
    $stmt->execute($data);
}

function setAtendido($dbh, $codigo){
    $data = array(
        'codigo' => $codigo
    );
    $stmt = $dbh->prepare("UPDATE pacientes SET atendido = 1 WHERE codigo = :codigo");
    $stmt->execute($data);
}

function delete($dbh, $codigo){
    $data = array(
        'codigo' => $codigo
    );
    $stmt = $dbh->prepare("DELETE FROM pacientes WHERE codigo = :codigo");
    $stmt->execute($data);
}

function deleteAll($dbh){
    $stmt = $dbh->prepare("DELETE FROM pacientes");
    $stmt->execute();
}