

<?php $__env->startSection("content"); ?>
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
<p>
    <a href="index.php?accion=listado">Ir al listado</a>
</p>
<?php $__env->stopSection(); ?>



<?php echo $__env->make("layouts/app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /vagrant/07-Template-Egines/ejercicio6/views/detalle.blade.php ENDPATH**/ ?>