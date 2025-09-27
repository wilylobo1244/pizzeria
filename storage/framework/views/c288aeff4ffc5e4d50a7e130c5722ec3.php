<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('img/monalezza.ico')); ?>" rel="icon">
    <title>Gestión de Gastos - La Monalezza</title>
    
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="h-full bg-gray-100 overflow-hidden">

    <?php
        use Carbon\Carbon;
    ?>

    <div class="h-screen flex flex-col">
        <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex-grow overflow-y-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Gastos</h1>
            <div class="bg-white shadow-md rounded-lg p-4">
                <table id="tabla-gastos" class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Tipo de gasto</th>
                            <th class="text-left py-2">Cantidad pagada</th>
                            <th class="text-left py-2">Fecha de pago</th>
                            <th class="text-left py-2">Origen</th>
                            <th class="text-right py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $datosServicio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b">
                                <td class="py-2"><?php echo e($dato['tipo_gasto']); ?></td>
                                <td class="py-2">$<?php echo e($dato['cantidad_pagada']); ?></td>
                                <td class="py-2"><?php echo e($dato['fecha_pago']); ?></td>
                                <td class="py-2"><?php echo e($dato['origen']); ?></td>
                                <td class="text-right py-2">
                                    <a href="<?php echo e(route('gasto.datosParaEdicion', $dato['pk'])); ?>" class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Editar</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table> 
            </div>
            <div class="mt-4 text-right">
                <button data-modal-open="modal-gasto" class="bg-green-500 text-white px-4 py-2 rounded">Registrar nuevo gasto</button>
            </div>

            <h1 class="text-2xl font-bold mb-4">Tipo de gasto</h1>
            <div class="bg-white shadow-md rounded-lg p-4">
                <table id="tabla-tipo-gasto" class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Nombre tipo gasto</th>
                            <th class="text-left py-2">Estatus</th>
                            <th class="text-right py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $datosTipo_gasto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b cursor-pointer">
                                <td class="py-2"><?php echo e($dato->nombre_tipo_gasto); ?></td>
                                <?php if( $dato->estatus_tipo_gasto == 1 ): ?>
                                    <td class="py-2">Activo</td>
                                <?php else: ?>
                                    <td class="py-2">Inactivo</td>
                                <?php endif; ?>
                                <td class="text-right py-2">
                                    <a href="<?php echo e(route('tipo_gasto.datosParaEdicion', $dato->tipo_gasto_pk)); ?>" class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Editar</a>

                                    <?php if($dato->estatus_tipo_gasto == 1): ?>
                                        <a href="<?php echo e(route('tipo_gasto.baja', $dato->tipo_gasto_pk)); ?>" onclick="confirmarBaja(event)" class="bg-red-500 text-white px-2 py-1 rounded">Dar de baja</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('tipo_gasto.alta', $dato->tipo_gasto_pk)); ?>" onclick="confirmarAlta(event)" class="bg-green-500 text-white px-2 py-1 rounded">Dar de alta</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-right">
                <button data-modal-open="modal-tipo-gasto" class="bg-green-500 text-white px-4 py-2 rounded">Registrar nuevo tipo de gasto</button>
            </div>
        </div>

        <script>
            // Tabla con DataTable
            $(document).ready(function () {
                $('#tabla-gastos').DataTable({
                    "language": {
                    "search": "Buscar:",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "zeroRecords": "Sin gastos registrados",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            });

            // Alerta de confirmación de baja tipo de gasto
            function confirmarBaja(event) {
                event.preventDefault();
    
                const link = event.target.closest('a');
    
                if (link) {
                    Swal.fire({
                        title: '¿Seguro?',
                        text: '¿Deseas dar de baja el tipo de gasto?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, dar de baja',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link.href;
                        }
                    });
                }
            }

            // Alerta de confirmación de alta tipo de gasto
            function confirmarAlta(event) {
                event.preventDefault();
    
                const link = event.target.closest('a');
    
                if (link) {
                    Swal.fire({
                        title: '¿Seguro?',
                        text: '¿Deseas dar de alta el tipo de gasto?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, dar de alta',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link.href;
                        }
                    });
                }
            }
        </script>

        <!-- Modal de registro de gasto -->
        <div data-modal="modal-gasto" style="display: none;" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registrar Nuevo Gasto</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-600 mb-3">
                            <span class="text-red-500">*</span> Campo necesario</p>
                        <form id="form-gasto" action="<?php echo e(route('gasto.insertar')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label for="tipo_gasto_fk" class="block text-sm font-medium text-gray-700">Tipo de gasto
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="tipo_gasto_fk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">Selecciona el tipo de gasto</option>
                                    <?php $__currentLoopData = $datosTipoGasto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dato->tipo_gasto_pk); ?>"><?php echo e($dato->nombre_tipo_gasto); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="cantidad_pagada_servicio" class="block text-sm font-medium text-gray-700">Cantidad pagada
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="cantidad_pagada_servicio" name="cantidad_pagada_servicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="mb-4">
                                <label for="fecha_pago_servicio" class="block text-sm font-medium text-gray-700">Fecha de pago
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="fecha_pago_servicio" name="fecha_pago_servicio" value="<?php echo e(Carbon::now()->format('Y-m-d')); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="items-center px-4 py-3">
                                <button type="button" data-modal-cancel="modal-gasto" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                    Cancelar
                                </button>
                                <button type="submit" class="mt-3 px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de registro de tipo de gasto -->
        <div data-modal="modal-tipo-gasto" style="display: none;" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registrar Nuevo Tipo de Producto</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-600 mb-3">
                            <span class="text-red-500">*</span> Campo necesario</p>
                        <form id="form-tipogasto" action="<?php echo e(route('tipo_gasto.insertar')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label for="nombre_tipo_gasto" class="block text-sm font-medium text-gray-700">Nombre
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nombre_tipo_gasto" name="nombre_tipo_gasto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="items-center px-4 py-3">
                                <button type="button" data-modal-cancel="modal-tipo-gasto" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                    Cancelar
                                </button>
                                <button type="submit" class="mt-3 px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Abrir modal según su nombre
                document.querySelectorAll('[data-modal-open]').forEach(button => {
                    button.addEventListener('click', function () {
                        const modalName = this.getAttribute('data-modal-open');
                        const modal = document.querySelector(`[data-modal="${modalName}"]`);
                        if (modal) modal.style.display = 'block';
                    });
                });

                // Cerrar modal desde botón de cancelar
                document.querySelectorAll('[data-modal-cancel]').forEach(button => {
                    button.addEventListener('click', function () {
                        const modalName = this.getAttribute('data-modal-cancel');
                        const modal = document.querySelector(`[data-modal="${modalName}"]`);
                        if (modal) modal.style.display = 'none';
                    });
                });

                // Cerrar modal haciendo click fuera del contenido
                window.addEventListener('click', function (event) {
                    document.querySelectorAll('[data-modal]').forEach(modal => {
                        if (event.target === modal) {
                            modal.style.display = 'none';
                        }
                    });
                });
            });
        </script>

        <?php if($errors->any()): ?>
            <script>
                Swal.fire({
                    title: 'Errores de validación',
                    html: '<?php echo implode('<br>', $errors->all()); ?>',
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
    </div>
</body>
</html><?php /**PATH C:\Users\Usuario\Downloads\SGN_Monalezza-main\SGN_Monalezza-main\resources\views/gastos.blade.php ENDPATH**/ ?>