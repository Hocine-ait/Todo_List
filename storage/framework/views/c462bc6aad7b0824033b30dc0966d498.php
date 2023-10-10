<?php if($todo->confirmed): ?>
                <span class="fas fa-check px-2 text-green-500 cursor-pointer"
                    onclick="event.preventDefault();
                    document.getElementById('form-inconfirmed-<?php echo e($todo->id); ?>')
                    .submit()" />
                
                 <form style="display:none" 
                    id="<?php echo e('form-inconfirmed-'.$todo->id); ?>"
                     method="post" 
                     action="<?php echo e(route('todo.inconfirmed',$todo->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                </form>

                <?php else: ?>
                <span onclick="event.preventDefault();
                    document.getElementById('form-confirmed-<?php echo e($todo->id); ?>').submit()" 
                    class="fas fa-check px-2 text-gray-400 cursor-pointer" />
                <form style="display:none" id="<?php echo e('form-confirmed-'.$todo->id); ?>" method="post" action="<?php echo e(route('todo.confirmed',$todo->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                </form>
                <?php endif; ?><?php /**PATH C:\Users\Hocine\Desktop\Projects\first-project\resources\views/todos/complete-button.blade.php ENDPATH**/ ?>