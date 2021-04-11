<?php require_once "partials/header.php"; ?>

<h1>Lista de tareas</h1>
<p>Usuario contectado <b><?php echo $_SESSION["usuario"] ?></b>.</p>
<h2>Añadir nueva</h2>
<form action="index.php" method="GET">
    <label>Descripcion: </label>
    <input type="text" name="codigo" placeholder="código de paciente">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="text" name="apellidos" placeholder="apellidos">
    <input type="hidden" name="accion" value="nuevo">
    <input type="submit" value="Añadir">
</form>
<h2>Listado de pacientes</h2>
<p>Si el valor entre paréntesis es 0, significa que el paciente no está atendido.</p>
<table class="table">
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendido?</th>
        <th>Atender</th>
        <!--<th>Borrar</th>-->
    </tr>
    <!-- Generación de filas -->
    <?php
    foreach ($_SESSION['pacientes'] as $paciente)
    {
        ?>
        <tr>
            <td><?php echo $paciente['codigo'] ?></td>
            <td><?php echo $paciente['nombre'] ?></td>
            <td><?php echo $paciente['apellidos'] ?></td>
            <td><?php echo $paciente['atendido'] ?></td>
            <td><a href="index.php?accion=marcar&codigo=<?php echo $paciente['codigo'] ?>">Marcar atendido</a></td>
            <!--<td><a href="index.php?accion=borrar&codigo=<?php echo $paciente['codigo'] ?>">Borrar</a></td>-->
        </tr>
        <?php
    }
    ?>
</table>
<a href="index.php?accion=borrarTodos">Borrar todos los pacientes</a>

<?php require_once "partials/footer.php"; ?>