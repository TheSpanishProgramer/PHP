<?php include "head.php"; ?>
<body>

<form action="index.php" method="get">
    <h3>Añadir nuevo paciente</h3>
    <span>Descripción</span>
    <input type="text" name="codigo" placeholder="código de paciente">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="text" name="apellidos" placeholder="apellidos">
    <input hidden name="accion" value="anyadir_paciente">
    <button type="submit">Añadir</button>
</form>
<br>
<table>
    <thead>
    <th>Código</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>¿Atendido?</th>
    <th>Atender</th>
    </thead>
    <tbody>
    <?php
    // coger todos los pacientes
    $pacientes = selectAllPacientes();
    // mostrar la tabla con los pacientes si hay
    if ($pacientes > 0) {
        foreach ($pacientes as $paciente => $values) {
            echo "<tr>
                <td> {$values['codigo']}</td>
                <td> {$values['nombre']}</td>
                <td> {$values['apellidos']}</td>
                <td> {$values['atendido']}</td>
                <td> <a href='index.php?accion=atender_paciente&id={$values['id']}'> Marcar atendido</a></td>                
                </tr>";
        }
    } ?>

    </tbody>
</table>

<p><a href="index.php?accion=borrar_todos_pacientes">Borrar todos los pacientes</a></p>

</body>

<?php include "footer.php"; ?>
