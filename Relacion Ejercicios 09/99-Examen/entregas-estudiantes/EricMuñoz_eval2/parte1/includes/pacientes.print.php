<?php
function imprimirPacientes()
{
    $pacientes = $_SESSION['pacientes'];
    foreach ($pacientes as $key => $paceinte) {
        echo '<tr>';
        echo "<td>{$paceinte['codigo']}</td>";
        echo "<td>{$paceinte['nombre']}</td>";
        echo "<td>{$paceinte['apellidos']}</td>";
        echo "<td>{$paceinte['atendido']}</td>";
        echo "<td><a href='pacientes.php?action=atender&codigo={$key}'>Marcar atendido</a></td>";
        echo '</tr>';
    }
}