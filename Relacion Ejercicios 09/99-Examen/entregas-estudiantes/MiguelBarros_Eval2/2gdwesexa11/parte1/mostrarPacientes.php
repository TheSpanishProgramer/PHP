<?php
session_start();

if (isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"])) {
    anadirPaciente($_POST["codigo"],$_POST["nombre"], $_POST["apellidos"]);
}

function anadirPaciente($codigo, $nombre, $apellidos) {
    $arrayPaciente = [$codigo, $nombre, $apellidos,0];
    array_push($_SESSION["paciente"], $arrayPaciente);
    
    // No soy capaz de que me saque algo de la sesion
    var_dump($_SESSION["paciente"]);
}

function mostrarPacientes() {
        foreach($_SESSION["paciente"] as $paciente) {
            imprimirDatos($paciente);
    }
}

function imprimirDatos($paciente) { ?>
    <tr>
        <td><?= $paciente[0] ?> </td>
        <td><?= $paciente[1] ?></td>
        <td><?= $paciente[2] ?></td>
        <td><?= $paciente[3] ?></td>
        <td><a href="mostrarPacientes.php?action=atender&id=<?= $paciente[0]?>">Marcar atendido</a></td>
    </tr>
<?php }

if (isset($_GET["action"])) {
    if ($_GET["action"] == "borrar") {
        session_unset($_SESSION["paciente"]);
    } else {
        foreach($_SESSION["paciente"] as $paciente) {
            if ($paciente[0] == $_GET["id"]) {
                $paciente[3] = 1;
            }
        }
    }
}
?>


<html>
<head>

</head>
<body>
<form action="mostrarPacientes.php" method="post">
    <h1>Añadir nuevo</h1>
    Descripcion: <input type="text" name="codigo" placeholder="Codigo de paciente">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="text" name="apellidos" placeholder="apellidos">
    <input type="submit" value="Añadir">
</form>

<h1>Listado de pacientes</h1>
<table>
    <thead>
    <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>¿Atendido?</td>
        <td>Atender</td>
    </tr>
    </thead>
    <tbody>
        <?php mostrarPacientes() ?>
    </tbody>

</table>

<a href="mostrarPacientes.php?action=borrar">Borrar pacientes del listado</a>
</body>
</html>
