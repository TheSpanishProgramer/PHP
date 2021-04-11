<?php
function getAll_Usuarios($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM usuarios");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAll_Pacientes($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM pacientes");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    return $stmt->fetchAll();
}

function insertPaciente($dbh, $paciente)
{
    $stmt = $dbh->prepare("insert into pacientes (codigo,nombre,apellidos,atendido) values (:cod,:nombre,:apellidos,:atendido)");
    $stmt->execute($paciente);
}

function updateAtendidoByID($dbh, $paciente)
{
    $stmt = $dbh->prepare("UPDATE pacientes set atendido=1 WHERE id=:id ");
    $stmt->execute($paciente);
}

function deleteAll($dbh)
{
    $stmt = $dbh->prepare("DELETE FROM pacientes");
    $stmt->execute();
}
