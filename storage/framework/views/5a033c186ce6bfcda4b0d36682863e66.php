<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(env('APP_NAME')); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="text-center mt-4">
        <p>&copy; <?php echo e(date('Y')); ?> CGARCHER. Todos los derechos reservados pa mi.</p>
    </footer>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH C:\Users\Ibra\Desktop\2º DAW\Desarrollo web en entorno servidor (8)\Trabajo-subir-nota\front_book\resources\views/layout.blade.php ENDPATH**/ ?>