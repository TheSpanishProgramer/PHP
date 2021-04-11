<?php
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 1:
            echo 'datos incorrectos al insertar paciente';
            break;
        case 3:
            echo 'error al borrar todos los pacientes';
            break;
    }
}

$dbh = connect();
$pacientes = searchPacientesAll($dbh);
$dbh = close();

