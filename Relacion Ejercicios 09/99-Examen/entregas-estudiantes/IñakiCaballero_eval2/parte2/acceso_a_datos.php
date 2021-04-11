<?php

/**
 * @return PDO
 */
function conexion()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conexion = new PDO("mysql:host=$servername;dbname=pacientes", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $conexion;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 * @param $usuario
 * @param $contrasena
 * @return array|int
 */
function selectByUser($usuario, $contrasena)
{
    $data = array("usuario" => $usuario, "contrasena" => $contrasena);
    $db = conexion();
    $stmt = $db->prepare("SELECT * FROM usuarios where usuario = :usuario AND contrasena = :contrasena");
    $stmt->execute($data);
    // devuelvo la cantidad de columnas, si es mayor que 0 existe ese usuario
    $db = null;
    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
    } else {
        return -1;
    }
}

/**
 * @return array
 */
function selectAllPacientes()
{
    $db = conexion();
    $stmt = $db->prepare("SELECT * FROM pacientes");
    $stmt->execute();
    $db = null;
    return $stmt->fetchAll();
}

/**
 * @param $codigo
 * @param $nombre
 * @param $apellidos
 * @param $atendido
 */
function insertarPaciente($codigo, $nombre, $apellidos, $atendido)
{
    $data = array("codigo" => $codigo, "nombre" => $nombre, "apellidos" => $apellidos, "atendido" => $atendido);
    $db = conexion();
    $stmt = $db->prepare("INSERT INTO pacientes (codigo, nombre, apellidos, atendido)
                        VALUES(:codigo, :nombre, :apellidos, :atendido)");
    $stmt->execute($data);
    $db = null;
}

/**
 * @param $codigo
 */
function atenderPaciente($id)
{
    $data = array("id" => $id);
    $db = conexion();
    $stmt = $db->prepare("UPDATE pacientes SET atendido = 1 WHERE id = :id");
    $stmt->execute($data);
    $db = null;
}

/**
 *
 */
function deleteAll()
{
    $db = conexion();
    $stmt = $db->prepare("DELETE FROM pacientes");
    $stmt->execute();
    $db = null;
}