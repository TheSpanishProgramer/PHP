<?php
require_once "../bbdd.php";
if (isset($_GET['codigo']) && isset($_GET['nombre']) && isset($_GET['apellidos'])) {
    if ($_GET['codigo'] == '' || $_GET['nombre'] == '' || $_GET['apellidos'] == '') {
        header('location:../pacientes.php?error=1');
    } else {
        $dbh = connect();
        $data = array(
            'codigo' => $_GET['codigo'],
            'nombre' => $_GET['nombre'],
            'apellidos' => $_GET['apellidos'],
            'atendido' => 0,
        );
        $filas = insertPaciente($dbh, $data);
        $dbh = close();
        if ($filas == false || $filas == 0) {
            header('location:../pacientes.php?error=1');
        }
        if ($filas == 1) {
            header('location:../pacientes.php');
        }
    }
} else {
    header('location:../pacientes.php?error=1');
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'update':
            $dbh = connect();
            $data = array(
                'id' => $_GET['id'],
            );
            $filas = updatePaciente($dbh, $data);
            $dbh = close();
            header('location:../pacientes.php');
            break;
        case 'delete':
            $dbh = connect();
            $filas = deletePacientesAll($dbh);
            $dbh = close();
            header('location:../pacientes.php');
            break;
    }
}
