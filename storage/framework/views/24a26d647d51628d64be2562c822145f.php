
<?php $__env->startSection('title', 'Editar Reloj'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-white"><h4>Editar Reloj: <?php echo e($watch['model']); ?></h4></div>
        <div class="card-body">
            <form action="<?php echo e(route('watches.update', $watch['id'])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Marca</label>
                        <input type="text" name="brand" class="form-control" value="<?php echo e($watch['brand']); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="model" class="form-control" value="<?php echo e($watch['model']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Precio (€)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo e($watch['price']); ?>" required>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Tipo</label>
                        <select name="type_id" class="form-control">
                            <option value="1" <?php echo e($watch['type_id'] == 1 ? 'selected' : ''); ?>>Deportivo</option>
                            <option value="2" <?php echo e($watch['type_id'] == 2 ? 'selected' : ''); ?>>Ejecutivo</option>
                            <option value="3" <?php echo e($watch['type_id'] == 3 ? 'selected' : ''); ?>>Casual</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Correa</label>
                        <select name="strap_id" class="form-control">
                            <option value="1" <?php echo e($watch['strap_id'] == 1 ? 'selected' : ''); ?>>Acero</option>
                            <option value="2" <?php echo e($watch['strap_id'] == 2 ? 'selected' : ''); ?>>Cuero</option>
                            <option value="3" <?php echo e($watch['strap_id'] == 3 ? 'selected' : ''); ?>>Plástico</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
                <a href="<?php echo e(route('watches.index')); ?>" class="btn btn-secondary mt-3">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ibra\Desktop\2º DAW\Desarrollo web en entorno servidor (8)\Trabajo-subir-nota\front_book\resources\views/watches/edit.blade.php ENDPATH**/ ?>