<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Consumo por Ventas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin-bottom: 70px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background-color: #f2f2f2; text-align: center; }
        h2 { text-align: center; }
        .header-info, .summary-info { margin-bottom: 20px; }
        .footer { position: fixed; bottom: 0; left: 0; right: 0; text-align: center; height: 60px; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .total-row td { font-weight: bold; background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Consumo por Ventas</h2>
    <div class="header-info">
        <p><strong>Período del reporte:</strong> Del <?php echo e($fecha_inicio); ?> al <?php echo e($fecha_fin); ?></p>
        <p><strong>Fecha de generación:</strong> <?php echo e(now()->format('d/m/Y H:i:s')); ?></p>
        <p class="text-right"><strong>Generado por:</strong> <?php echo e(session('usuario')); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Elemento Consumido</th>
                <th>Tipo</th>
                <th>Cantidad Consumida</th>
                <th>Costo Aproximado</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $consumoDeVentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-left"><?php echo e($dato->nombre); ?></td>
                    <td class="text-center"><?php echo e($dato->tipo); ?></td>
                    <td class="text-right"><?php echo e(number_format($dato->cantidad_consumida, 2)); ?> gr/ml/u</td>
                    <td class="text-right">$ <?php echo e(number_format($dato->costo_aproximado, 2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">No hay consumo de inventario en este rango de fechas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="3" class="text-right">Costo Total Aproximado del Consumo:</td>
                <td class="text-right">$ <?php echo e(number_format($costoTotal, 2)); ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <img src="<?php echo e(public_path("img/monalezza.jpg")); ?>" alt="La Monalezza Pizzería" style="height: 80px;">
    </div>
</body>
</html>
<?php /**PATH C:\Users\Usuario\Downloads\SGN_Monalezza-main\SGN_Monalezza-main\resources\views/formatoReporteConsumoPorVentas.blade.php ENDPATH**/ ?>