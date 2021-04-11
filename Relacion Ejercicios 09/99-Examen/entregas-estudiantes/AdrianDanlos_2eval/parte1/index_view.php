<p>BIENVENIDO</p>
<h2>Añadir nuevo paciente</h2>
<form action="index.php" method="get">
    <label for="">Descripcion:</label>
    <input type="hidden" name="accion" value="insertar">
    <input type="text" name="codigo">
    <input type="text" name="nombre-paciente">
    <input type="text" name="apellido-paciente">
    <button>Añadir</button>
</form>

<h2>Listado de pacientes</h2>
<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendido?</th>
        <th>Atender</th>
    </tr>
    <?php
    if (isset($_SESSION['pacientes'])){
        crearTabla($_SESSION['pacientes']);
    }
    ?>
</table>
<a href="index.php?accion=vaciar">Borrar todos los pacientes</a>
<?php

function crearTabla($arrayPacientes){
    foreach ($arrayPacientes as $paciente){
        echo '<tr>';
            echo '<td>'.$paciente['codigo'].'</td>';
            echo '<td>'.$paciente['nombre'].'</td>';
            echo '<td>'.$paciente['apellidos'].'</td>';
            echo '<td>'.$paciente['atender'].'</td>';
            echo '<td><a href="index.php?accion=atender&codigo='.$paciente['codigo'].'>Marcar atendido</a></td>';
        echo '</tr>';
    }
}



