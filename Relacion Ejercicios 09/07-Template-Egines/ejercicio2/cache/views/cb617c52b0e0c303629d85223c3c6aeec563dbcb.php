<!doctype html>
<html>
<head>
    <title>Ejercicio 1</title>
    <meta charset="utf-8">
</head>
<body>
    <table border="1">
        <tr>
            <td>Marca</td>
            <td><?php echo e($zapatilla->getMarca()); ?></td>
        </tr>
        <tr>
            <td>Modelo</td>
            <td><?php echo e($zapatilla->getModelo()); ?></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td><?php echo e($zapatilla->getTipo()); ?></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><?php echo e($zapatilla->getPrecio()); ?></td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH /vagrant/07-Template-Egines/ejercicio2/views/detalle.blade.php ENDPATH**/ ?>