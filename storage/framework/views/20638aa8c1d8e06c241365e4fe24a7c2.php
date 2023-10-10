<?php if(session()->has('message')): ?> 
 
    <div class="alert alert-success"><?php echo e(session()->get('message')); ?></div>  
<?php elseif(session()->has('error')): ?>
    <div class="alert alert-danger"><?php echo e(session()->get('error')); ?></div>
<?php endif; ?><?php /**PATH C:\Users\Hocine\Desktop\Projects\first-project\resources\views/layouts/flash.blade.php ENDPATH**/ ?>