<?php
include "mysql.php";

$dbh = connect();

if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"])) {
    $arrayPacientes = anadirPaciente($dbh,$_POST["codigo"],$_POST["nombre"], $_POST["apellidos"], 0);
}

$pacientes = mostrarPacientes($dbh);

function imprimirPacientes($pacientes) {
    foreach ($pacientes as $paciente) { ?>
        <tr>
        <td><?= $paciente->codigo ?> </td>
        <td><?= $paciente->nombre ?></td>
        <td><?= $paciente->apellidos ?></td>
        <td><?= $paciente->atendido ?></td>
        <td><a href="pacientes.php?action=atender&id=<?= $paciente->codigo?>">Marcar atendido</a></td>
    </tr>
<?php }
}

if (isset($_GET["action"])) {
    if ($_GET["action"]=="borrar") {
       $filas = borrarPacientes($dbh);
       echo $filas . " filas borradas";
    } else {
        $filas = anadirAtendido($dbh, $_GET["id"]);
        echo $filas . " filas modificadas";
    }
}


close($dbh);
?>

<html>
<head>

</head>
<body>
<form action="pacientes.php" method="post">
    <h1>Añadir nuevo</h1>
    Descripcion: <input type="text" name="codigo" placeholder="Codigo de paciente">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="text" name="apellidos" placeholder="apellidos">
    <input type="submit" value="Añadir">
</form>

<h1>Listado de pacientes</h1>
<table>
    <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>¿Atendido?</td>
        <td>Atender</td>
    </tr>
    <?php imprimirPacientes($pacientes); ?>
</table>

<a href="pacientes.php?action=borrar">Borrar todos los pacientes</a>
</body>
</html>
