<?php
require "funcionespacientes.php"?>

<html>
    <head>
        <title>Pacientes</title>
    </head>
    <body>
        <form name="add" method="GET" action="pacientes.php">
            <h1>Añadir nuevo</h1>
            <p>
                <input type="text" name="idPaciente"><input type="text" name="nomPaciente"><input type="text" name="apePaciente"><input type="submit" name="log" value="Añadir">
            </p>
        </form>
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
                <?php rellenarPacientes();?>
            </tbody>
        </table>
    <a href="pacientes.php?accion=borrar">Borrar todos los pacientes</a>

    </body>
</html>