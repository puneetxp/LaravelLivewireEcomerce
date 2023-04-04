<div class="w-full justify-between flex flex-wrap bg-blue-900">
<div class="">
  </div>

    <div class="flex flex-wrap">
        <?php if(Route::has('login')): ?>
        <?php if(auth()->guard()->check()): ?>
        <?php if (isset($component)) { $__componentOriginal2fd148bb97e4de3e72b3f8c6d9e31be8176f09d7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Nav\Dashboard::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav.dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Nav\Dashboard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2fd148bb97e4de3e72b3f8c6d9e31be8176f09d7)): ?>
<?php $component = $__componentOriginal2fd148bb97e4de3e72b3f8c6d9e31be8176f09d7; ?>
<?php unset($__componentOriginal2fd148bb97e4de3e72b3f8c6d9e31be8176f09d7); ?>
<?php endif; ?>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>" class=" bg-transparent hover:text-black text-white font-semibold  py-4 px-4">
            login
        </a>

        <?php if(Route::has('register')): ?>
        <a href="<?php echo e(route('register')); ?>" class=" hover:text-black text-white font-semibold py-4 px-4">
            Signup
        </a>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
        <a class="  text-white font-semibold hover:text-black py-4 px-4">
            cart
        </a>
    </div>


</div><?php /**PATH C:\xampp81\htdocs\ecomerce-kunal\resources\views/livewire/nav/guest.blade.php ENDPATH**/ ?>