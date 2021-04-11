<?php require('partials/head.php') ?>

    <table class="table">
        <tr>
            <td class="w-25">DNI</td><td><?= $empleado->dni ?></td>
        </tr>
        <tr>
            <td>Nombre</td><td><?= $empleado->nombre ?></td>
        </tr>
        <tr>
            <td>Apellidos</td><td><?= $empleado->apellidos ?></td>
        </tr>
        <tr>
            <td>Edad</td><td><?= $empleado->edad ?></td>
        </tr>
        <tr>
            <td>Sexo</td><td><?= $empleado->sexo ?></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td><td><?= $empleado->fecha_nacimiento ?></td>
        </tr>
        <tr>
            <td>Curriculum</td><td><?= $empleado->curriculum ?></td>
        </tr>
    </table>
<br>
<a href="index.php" class="btn btn-primary">Volver</a>

<?php require('partials/footer.php') ?>