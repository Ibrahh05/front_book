

<?php $__env->startSection('title', 'Listado de Relojes'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Panel Juan Time</h1>
            <p class="text-muted">Hola, <strong><?php echo e($user_name); ?></strong></p>
        </div>
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('watches.index')); ?>" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="model" class="form-control" placeholder="Buscar por modelo..." value="<?php echo e(request('model')); ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Catálogo</h5>
            <a href="<?php echo e(route('watches.create')); ?>" class="btn btn-light btn-sm text-primary font-weight-bold">+ Nuevo Reloj</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $watches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $watch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($watch['brand']); ?></td>
                        <td><?php echo e($watch['model']); ?></td>
                        <td class="font-weight-bold"><?php echo e($watch['price']); ?> €</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?php echo e(route('watches.edit', $watch['id'])); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <form action="<?php echo e(route('watches.destroy', $watch['id'])); ?>" method="POST" onsubmit="return confirm('¿Eliminar <?php echo e($watch['model']); ?>?');" style="display:inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center p-4">No hay relojes.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ibra\Desktop\2º DAW\Desarrollo web en entorno servidor (8)\Trabajo-subir-nota\front_book\resources\views/watches/index.blade.php ENDPATH**/ ?>