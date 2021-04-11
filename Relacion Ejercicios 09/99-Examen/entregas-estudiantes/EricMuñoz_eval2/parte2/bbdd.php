<?php

function connect()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbh = new PDO("mysql:host=$servername;dbname=pacientes", $username, $password);
    return $dbh;
}

function close()
{
    $dbh = null;
    return $dbh;
}

function searchUsuario($dbh, $data)
{
    $stmt = $dbh->prepare('SELECT nombre FROM usuarios WHERE usuario=:usuario AND contrasena=:contrasena');
    if ($stmt->execute($data) === true) {
        return $stmt->fetchObject();
    } else {
        return false;
    }

}

function insertPaciente($dbh, $data)
{
    $stmt = $dbh->prepare('INSERT INTO pacientes (codigo,nombre,apellidos,atendido) VALUES (:codigo,:nombre,:apellidos,:atendido)');
    if ($stmt->execute($data) === true) {
        return $stmt->rowCount();
    } else {
        return false;
    }

}

function updatePaciente($dbh, $data)
{
    $stmt = $dbh->prepare('UPDATE pacientes SET atendido=1 WHERE id=:id');
    $stmt->execute($data);
    return $stmt->rowCount();

}

function deletePacientesAll($dbh)
{
    $stmt = $dbh->prepare('DELETE FROM pacientes');
    $stmt->execute();
    return $stmt->rowCount();
}

function searchPacientesAll($dbh)
{
    $stmt = $dbh->prepare('SELECT id, codigo, nombre, apellidos, atendido FROM pacientes');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
