

<?php $__env->startSection('content'); ?>
<div class=" flex justify-between border-b pb-4 px-3 ">
    <h1 class="text-2xl font-bold underline">Liste To-do</h1>
    <a href="<?php echo e(route('todo.create')); ?>" class="mx-5 py-2 text-blue-400 cursor-pointer  ">
        <span class="fas fa-plus-circle" />
    </a>
</div>
<ul class="my-5">
    <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php $component = App\View\Components\Alert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
    <?php if($todos->count()>0): ?>
    <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="flex justify-between py-3 px-4 ">
        <div>
            <?php echo $__env->make('todos.complete-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if($todo->confirmed): ?>
            <p class="line-through"><?php echo e($todo->title); ?></p>
            <?php else: ?>
            <p ><?php echo e($todo->title); ?></p>
        <?php endif; ?>    
        <div >

            <a href="<?php echo e(route('todo.edit',$todo->id)); ?>" class="cursor-pointer text-white">
            <span class="fas fa-edit text-orange-500" /></a>

            <span class="fas fa-trash text-red-500 cursor-pointer pl-1" 
                onclick="event.preventDefault();
                if(confirm('Êtes-vous sûr de supprimer cette tâche?')){
                document.getElementById('form-delete-<?php echo e($todo->id); ?>')
                .submit()}" />
            <form style="display:none" 
                    id="<?php echo e('form-delete-'.$todo->id); ?>"
                        method="post" 
                        action="<?php echo e(route('todo.destroy',$todo->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                </form>
            
        </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p class="font-bold text-gray-600">Aucune tâche, veuillez en créer.</p>
    <?php endif; ?>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('todos.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hocine\Desktop\Projects\first-project\resources\views/todos/index.blade.php ENDPATH**/ ?>