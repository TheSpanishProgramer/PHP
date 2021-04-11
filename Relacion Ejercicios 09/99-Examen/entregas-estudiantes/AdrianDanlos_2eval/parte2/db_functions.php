<?php



function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbh = new PDO("mysql:host=$servername;dbname=pacientes", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $dbh;
}
function close(){
    $dbh = null;
}

function checkLogin($nombre, $password){
    $data = ['nombre' => $nombre, 'password' => $password];
    $dbh = connect();
    $stmt = $dbh->prepare('select * from usuarios where nombre = :nombre AND contrasena = :password');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute($data);
    $result = $stmt->fetchAll();
    close();
    return count($result);
}

function insertarPaciente($codigo, $nombre, $apellidos){
    $dbh = connect();
    $data = ['codigo' => $codigo, 'nombre' => $nombre, 'apellidos' => $apellidos];

    $stmt = $dbh->prepare('insert into pacientes (codigo, nombre, apellidos, atendido) values (:codigo, :nombre, :apellidos, 0)');
    $stmt->execute($data);

    close();
}

function getAllPacientes(){
    $dbh = connect();
    $stmt = $dbh->prepare('select * from pacientes');
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    close();
    return $stmt->fetchAll();
}

function deleteAll(){
    $dbh = connect();

    $stmt = $dbh->prepare('DELETE from pacientes');
    $stmt->execute();

    close();
}

function updateAtender($id){
    $dbh = connect();
    $stmt = $dbh->prepare('update pacientes set atendido = 1 where id = :id');
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->execute();

    close();
}

