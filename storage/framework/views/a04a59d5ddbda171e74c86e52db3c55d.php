<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('img/monalezza.ico')); ?>" rel="icon">
    <title>La Monalezza Pizzeria - Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/login_style.css')); ?>">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="justify-content: center; align-items: center; display: flex; height: 100vh; margin: 0;">
    <?php echo $__env->make('mensaje', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="login-container">
        <img src="<?php echo e(asset('img/logo_lamonalezza.webp')); ?>" alt="La Monalezza Pizzeria" class="logo">
        <form action="<?php echo e(route('usuario.login')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>

</html><?php /**PATH C:\Users\Usuario\Downloads\SGN_Monalezza-main\SGN_Monalezza-main\resources\views/login.blade.php ENDPATH**/ ?>