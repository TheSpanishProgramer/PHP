<?php
session_start();
if (!isset($_SESSION['pacientes'])) {
    $_SESSION['pacientes'] = array();
}
if (isset($_GET['codigo']) && isset($_GET['nombre']) && isset($_GET['apellidos'])) {
    if ($_GET['codigo'] == '' || $_GET['nombre'] == '' || $_GET['apellidos'] == '') {
        header('location:pacientes.php?error=1');
    } else {
        array_push($_SESSION['pacientes'],
            array(
                'codigo' => $_GET['codigo'],
                'nombre' => $_GET['nombre'],
                'apellidos' => $_GET['apellidos'],
                'atendido' => 0,));
    }
}
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 1:
            echo 'datos incorrectos al insertar paciente';
            break;
    }
}
if (isset($_SESSION['pacientes'])) {
    include 'pacientes.print.php';
}
if (isset($_GET['action'])) {
    if (isset($_GET['codigo'])) {
    }
    switch ($_GET['action']) {
        case 'atender':
            $_SESSION['pacientes'][$_GET['codigo']]['atendido'] = 1;
            break;

        case 'borrar':
            unset($_SESSION['pacientes']);
            break;
    }

}