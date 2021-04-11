<?php
session_start();
// session_destroy();

if (!$_SESSION['logeado']) {
    header("Location:index.php");
}

function marcarPaciente($pacientes, $id)
{
    for ($i = 0; $i < sizeof($pacientes); $i++) {
        if ($pacientes[$i][0] === $id) {
            $pacientes[$i][3] = 1;
        }
    }
    $_SESSION['pacientes'] = $pacientes;
    header("Location:gestionpacientes.php");
}

if (gettype($_SESSION['pacientes']) != "array") {
    $_SESSION['pacientes'] = [];
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "insertar":
            $pacientes = $_SESSION['pacientes'];
            $paciente = [$_GET['cod'], $_GET['nombre'], $_GET['apellidos'], $_GET['atendido']];
            array_push($pacientes, $paciente);
            $_SESSION['pacientes'] = $pacientes;
            header("Location:gestionpacientes.php");
            break;
        case "marcar":
            marcarPaciente($_SESSION['pacientes'], $_GET['id']);
            break;
        case "borrartodo":
            session_destroy();
            header("Location:gestionpacientes.php");
            break;
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Añadir nuevo</h1>
<form action="gestionpacientes.php" method="get">
    <input type="hidden" name="action" value="insertar">
    <h3>Datos: </h3>
    <input type="hidden" name="atendido" value="0">
    <input type="text" name="cod" id="cod" placeholder="Código">
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
    <input type="submit" value="Añadir">
</form>
<h1>Listado de pacientes</h1>
<h3>Atendido 0 = no atendido</h3>
<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendido?</th>
        <th>Atender</th>
    </tr>
    <?php
    $pacientes = $_SESSION['pacientes'];
    foreach ($pacientes as $pac) {
        echo "<tr>";
        foreach ($pac as $dato) {
            echo "<td>" . $dato . "</td>";
        }
        echo "<td><a href='gestionpacientes.php?action=marcar&id=" . $pac[0] . "'>Marcar</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="gestionpacientes.php?action=borrartodo">Borrar todos los pacientes</a>
</body>
</html>