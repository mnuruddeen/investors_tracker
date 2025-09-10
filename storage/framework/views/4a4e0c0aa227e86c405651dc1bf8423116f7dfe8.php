<?php if(count($errors) > 0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger text-center">
            <?php echo e($error); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <?php echo e(session('success')); ?>

        
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger text-center">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/inc/messages.blade.php ENDPATH**/ ?>