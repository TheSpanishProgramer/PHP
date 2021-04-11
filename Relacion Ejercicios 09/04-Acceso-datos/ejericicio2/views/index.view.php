<?php require('partials/head.php') ?>

<div class="row">
    <div class="col-md-8"><!-- Columna Tabla de empleados -->
        <h5>Listado de empleados</h5>
        <table class="table">
            <thead>
                <tr>
                    <td>DNI</td><td>Nombre</td><td>Apellidos</td><td>Opciones</td>
                </tr>
            </thead>
            <tbody>
            <!-- Generar el contenido de la tabla iterando por cada elemento -->
            <?php foreach ($empleados as $empleado) : ?>
                <tr>
                    <td><?= $empleado->dni ?></td>
                    <td><?= $empleado->nombre ?></td>
                    <td><?= $empleado->apellidos ?></td>
                    <td>
                        <a href='index.php?accion=detalle&id=<?=$empleado->id?>'>Ver detalles</a>
                        &nbsp;|&nbsp;
                        <a href='index.php?accion=eliminar&id=<?=$empleado->id?>'>Eliminar</a>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
        <p>* Opción secreta: <a href="index.php?accion=vaciar">Vaciar lista</a></p>
    </div><!-- fin: Columna Tabla de empleados -->

    <div class="col-md-4">
        <h5>Añadir nuevo empleado</h5>
        <form action="index.php" method="get">
            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2">
            <input type="text" name="apellidos" placeholder="Apellidos" class="form-control mb-2">
            <input type="number" name="edad" placeholder="Edad" class="form-control mb-2">
            <input type="date" name="fecha-nacimiento" class="form-control mb-2" value="2000-01-01">
            <input type="email" name="email" placeholder="Email" class="form-control mb-2">
            <input type="dni" name="dni" placeholder="DNI" class="form-control mb-2">
            <select class="custom-select d-block mb-2" name="sexo">
                <option value="Hombre">Hombre</option>
                <option value="Mujer" selected>Mujer</option>
                <option value="Otro">Otro</option>
            </select>
            <textarea name="curriculum" placeholder="Curriculum" class="form-control  mb-2"></textarea>


            <input type="hidden" name="accion" value="insertar">
            <input type="submit" class="btn btn-primary" value="Añadir">
        </form>
    </div>
</div>
<?php require('partials/footer.php') ?>