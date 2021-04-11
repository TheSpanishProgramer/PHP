<?php
include("PersistentManager.php");



function getAllUsers(){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM usuarios");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo $row->usuario;
    }

}

function checkLogin($user, $pass){
    $num = 0;
    $data = array(
        'usuario' => $user,
        'pass' => $pass
    );
    $dbh = connect();

    $stmt = $dbh->prepare("SELECT usuario FROM usuarios WHERE usuario=:usuario AND contrasena=:pass");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    while($row = $stmt->fetch()){
        $num++;
    }
    if ($num >0){
        return true;
    }else{
        return false;
    }
}

function añadirPaciente($codigo, $nombre, $apellidos){
    $data = array(
        'codigo' => $codigo,
        'nombre' => $nombre,
        'apellidos' => $apellidos
    );
    $dbh = connect();
    $stmt = $dbh->prepare("INSERT INTO pacientes(codigo, nombre, apellidos) VALUES (:codigo, :nombre, :apellidos) ");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

}

function mostrarPacientes(){
    $dbh = connect();

    $stmt = $dbh->prepare("SELECT * FROM pacientes");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    while($row = $stmt->fetch()){
        echo "<tr>";
        echo "<td>".$row->codigo."</td>";
        echo "<td>".$row->nombre."</td>";
        echo "<td>".$row->apellidos."</td>";
        if ($row->atendido == null or $row->atendido == 0){
            echo "<td>0</td>";
        }else{
            echo "<td>$row->atendido</td>";
        }
        echo "<td><a href='../Views/logged.php?id=$row->id'>Marcar visita</a></td>";
        echo "</tr>";
    }
}
function borrarPacientes(){
    $dbh = connect();
    $stmt = $dbh->prepare("DELETE FROM pacientes");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
}
function updatePaciente($id){
    $data = array(
      'id' =>$id
    );
    $dbh = connect();
    $stmt = $dbh->prepare("UPDATE pacientes set atendido = 1 WHERE id=:id");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
?>