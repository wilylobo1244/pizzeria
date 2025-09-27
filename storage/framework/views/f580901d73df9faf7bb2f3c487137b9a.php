<?php if(Session::has('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            text: '<?php echo e(Session::get('success')); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            text: '<?php echo e(Session::get('error')); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
    <script>
        Swal.fire({
            icon: 'warning',
            text: '<?php echo e(Session::get('warning')); ?>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
<?php endif; ?>

<?php if(Session::has('info')): ?>
    <script>
        Swal.fire({
            icon: 'info',
            text: '<?php echo e(Session::get('info')); ?>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
<?php endif; ?>

<?php if(Session::has('question')): ?>
    <script>
        Swal.fire({
            icon: 'question',
            text: '<?php echo e(Session::get('question')); ?>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
<?php endif; ?><?php /**PATH C:\Users\Usuario\Downloads\SGN_Monalezza-main\SGN_Monalezza-main\resources\views/mensaje.blade.php ENDPATH**/ ?>