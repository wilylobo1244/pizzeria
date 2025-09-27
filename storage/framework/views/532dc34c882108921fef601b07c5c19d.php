<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('img/monalezza.ico')); ?>" rel="icon">
    <title>Reporte de Consumo por Ventas - La Monalezza</title>
    
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="h-full bg-gray-100 overflow-hidden">

    <div class="h-screen flex flex-col">
        <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex-grow overflow-y-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Generar Reporte de Consumo por Ventas</h1>
            <div class="bg-white shadow-md rounded-lg p-4">
                <form action="<?php echo e(route('generarReporte.consumoPorVentas')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="fecha_reporte_consumo_inicio" class="block text-sm font-medium text-gray-700">Fecha inicial
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="date" id="fecha_reporte_consumo_inicio" name="fecha_reporte_consumo_inicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_reporte_consumo_fin" class="block text-sm font-medium text-gray-700">Fecha final
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="date" id="fecha_reporte_consumo_fin" name="fecha_reporte_consumo_fin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                    </div>
                    <div class="mt-6 text-right">
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Generar Reporte
                        </button>
                    </div>
                </form>
                <p class="text-sm text-gray-600 mb-3">
                    <span class="text-red-500">*</span> Campo necesario</p>
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

</html><?php /**PATH C:\Users\Usuario\Downloads\SGN_Monalezza-main\SGN_Monalezza-main\resources\views/reporteConsumoPorVentas.blade.php ENDPATH**/ ?>