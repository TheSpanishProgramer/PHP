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

<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendidos?</th>
        <th>Atender</th>
    </tr>
    <?php
    while($row = damePaciente(conexion())){
        echo "<tr><td>" . $row['codigo']. "</td><td>" . $row['nombre'] . "</td><td>" . $row['apellido']. "</td><td>" . $row['atendido'] . "</td><td><a href='control.php?atendido=" . $row['codigo'] . "'>atender</a></td></tr>";
        }

    echo "</table>";

    ?>

</body>
</html>