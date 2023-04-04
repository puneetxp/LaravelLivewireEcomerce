<div class="w-full justify-between flex flex-wrap bg-blue-900">
<div class="">
  </div>

    <div class="flex flex-wrap">
        <?php if(Route::has('login')): ?>
        <?php if(auth()->guard()->check()): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav.dashboard','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav.dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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


</div><?php /**PATH /var/www/ecomerce-kunal/resources/views/livewire/nav/guest.blade.php ENDPATH**/ ?>