

<?php $__env->startSection("content"); ?>

<?php echo $__env->make("cabecera", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table border="1">
    <tr>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Tipo</td>
        <td>Precio</td>
        <td>Detalle</td>

    </tr>
    <?php $__currentLoopData = $listado_zapatillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zapatilla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($zapatilla->getMarca()); ?></td>
        <td><?php echo e($zapatilla->getModelo()); ?></td>
        <td><?php echo e($zapatilla->getTipo()); ?></td>
        <td><?php echo e($zapatilla->getPrecio()); ?></td>
        <td><a href="index.php?accion=detalle&id=<?php echo e($zapatilla->getId()); ?>">Ver detalle</a></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts/app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /vagrant/07-Template-Egines/ejercicio6/views/listado.blade.php ENDPATH**/ ?>