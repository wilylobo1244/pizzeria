<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('img/monalezza.ico')); ?>" rel="icon">
    <title>Edición de Mesa - La Monalezza</title>
    
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="h-full bg-gray-100 overflow-hidden">

    <div class="h-screen flex flex-col">
        <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex-grow overflow-y-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Edición de Mesa</h1>
            <div class="bg-white shadow-md rounded-lg p-4">
                <form action="<?php echo e(route('mesa.actualizar', $datosMesa->mesa_pk)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="numero_mesa" class="block text-sm font-medium text-gray-700">Número de mesa</label>
                            <input type="number" id="numero_mesa" name="numero_mesa" value="<?php echo e($datosMesa->numero_mesa); ?>"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación</label>
                            <input type="text" id="ubicacion" name="ubicacion" value="<?php echo e($datosMesa->ubicacion); ?>"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>
                    <div class="mt-6 text-right">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
    <script>
        Swal.fire({
            title: 'Errores de validación',
            html: '<?php echo implode(' < br > ', $errors->all()); ?>',
            icon: 'error',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </script>
    <?php endif; ?>
</body>

</html><?php /**PATH C:\Users\Usuario\Downloads\SGN_Monalezza-main\SGN_Monalezza-main\resources\views/editarMesa.blade.php ENDPATH**/ ?>