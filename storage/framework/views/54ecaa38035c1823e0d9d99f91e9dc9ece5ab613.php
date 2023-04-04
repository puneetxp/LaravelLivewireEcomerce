<div class="bg-white w-full grid grid-cols-4">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="object-contain">
            <a href="<?php echo e(route('public.category', $category->name)); ?>">
                <img src="<?php echo e($category->photo); ?>" alt="<?php echo e($category->name); ?>" class="w-full h-full">
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/ecomerce-kunal/resources/views/components/home/shopbycategory.blade.php ENDPATH**/ ?>