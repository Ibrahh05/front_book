

<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Inicia Sesión</div>
                <div class="card-body">
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('login.submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?> 

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="admin@juan.com">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required placeholder="123456">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ibra\Desktop\2º DAW\Desarrollo web en entorno servidor (8)\Trabajo-subir-nota\front_book\resources\views/login.blade.php ENDPATH**/ ?>