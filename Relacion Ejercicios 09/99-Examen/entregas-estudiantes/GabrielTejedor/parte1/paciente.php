<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Añadir nuevo</h1>
<form method="post" action="control.php">
    descripcion:<input type="text" name="cod" placeholder="codigo"/>
    <input type="text" name="nom" placeholder="nombre">
    <input type="text" name="ape" placeholder="apellido">
    <input type="submit" name="guardar">
</form>
<a href="control.php?borrar">Borrar pacientes</a>
<?php
if(isset($_SESSION['pacientes'])){
?>
<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendidos?</th>
        <th>Atender</th>
    </tr>
    <?php
echo "pacientes".count($_SESSION['pacientes'] );
    foreach ($_SESSION['pacientes'] as $paciente) {

        echo "<tr><td>" . $cod. "</td><td>" . $paciente[$cod]['nombre'] . "</td><td>" . $paciente[$cod]['apellido'] . "</td><td>" . $paciente[$cod]['atendido'] . "</td><td><a href='control.php?atendido=" . $cod . "'>atender</a></td></tr>";
    }
    echo "</table>";
    }
    ?>

</body>
</html>