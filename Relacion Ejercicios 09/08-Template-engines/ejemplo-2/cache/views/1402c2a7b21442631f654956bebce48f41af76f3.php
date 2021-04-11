

<?php $__env->startSection('content'); ?>
    <h1>Listado de personas</h1>
    <ul>
    <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul>
            <li>Nombre: <?php echo e($persona->getNombre()); ?></li>
            <li>Profesión: <?php echo e($persona->getProfesion()); ?></li>
            <li>Edad: <?php echo e($persona->getEdad()); ?></li>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /vagrant/08-Template-engines/ejemplo-2/views/welcome.blade.php ENDPATH**/ ?>