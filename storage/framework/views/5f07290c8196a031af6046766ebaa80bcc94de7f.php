
<div class="grid w-full grid-cols-2 gap-2 sm:gap-3 p-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 text-white font-medium">
  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
  <div class="aspect-square relative ">
    <a class="rounded-full" href="/search?category=<?php echo e($category->name); ?>">
      <?php if( $category->photo): ?>
      <img src="/storage/photos/category/<?php echo e($category->photo); ?>" alt="<?php echo e($category->name); ?>" class="w-full h-full rounded-full shadow-xl">
      <?php else: ?>
      <div class="flex justify-center items-center h-full drop-shadow-md">
        <span class="text-center m-auto">
          No Photo
        </span>
      </div>
      <?php endif; ?>
      <div  class="w-full" >
        <h3 class="w-full text-xl text-center rounded">
          <?php echo e($category->name); ?>

        </h3>
      </div>
    </a>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/components/home/shopbycategory.blade.php ENDPATH**/ ?>