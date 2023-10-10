

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold border-b pb-4">Modifier sa tâche</h1>
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
<form method="post" action="<?php echo e(route('todo.update',$todo->id)); ?>" class="py-5">
    <?php echo csrf_field(); ?>
    <?php echo method_field('patch'); ?>
    <input class="px-2 py-2 border rounded" type="text" name="title" value="<?php echo e($todo->title); ?>"/>
    <input class="p-2 bg-orange-400 cursor-pointer border rounded text-white" type="submit" value="Modifier"/>
</form>

<a href="<?php echo e(route('todo.index')); ?>" class="mx-5 py-1 px-1 bg-yellow-200 cursor-pointer border rounded ">Retour</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('todos.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hocine\Desktop\Projects\first-project\resources\views/todos/edit.blade.php ENDPATH**/ ?>