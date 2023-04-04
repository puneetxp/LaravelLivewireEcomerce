<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 h-screen  ">
        <div class="max-w-7xl h-full border-0 mx-auto sm:px-6 lg:px-8">
            <?php if (isset($component)) { $__componentOriginal66cf31ec21c6e3e2d8041a8ed5a7e3784b9c48c4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Home\Search::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Home\Search::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal66cf31ec21c6e3e2d8041a8ed5a7e3784b9c48c4)): ?>
<?php $component = $__componentOriginal66cf31ec21c6e3e2d8041a8ed5a7e3784b9c48c4; ?>
<?php unset($__componentOriginal66cf31ec21c6e3e2d8041a8ed5a7e3784b9c48c4); ?>
<?php endif; ?>
        </div>
    </div>
    <div class=" ">
        <div class=" w-full border-0 mx-auto sm:px-6 bg-blue-900 lg:px-8">
            <?php if (isset($component)) { $__componentOriginal3927465d62396a76cb79100daa2bf990c93cb57b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Home\Menu::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Home\Menu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3927465d62396a76cb79100daa2bf990c93cb57b)): ?>
<?php $component = $__componentOriginal3927465d62396a76cb79100daa2bf990c93cb57b; ?>
<?php unset($__componentOriginal3927465d62396a76cb79100daa2bf990c93cb57b); ?>
<?php endif; ?>
        </div>
    </div>
    <div class="  bg-blue-900 ">
        <div class=" w-full h-full border-0 mx-auto sm:px-6 bg-blue-900 lg:px-8">
            <?php if (isset($component)) { $__componentOriginala26fdc49f98646db4a4079ecb70c009d15e60950 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Home\Banner::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Home\Banner::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala26fdc49f98646db4a4079ecb70c009d15e60950)): ?>
<?php $component = $__componentOriginala26fdc49f98646db4a4079ecb70c009d15e60950; ?>
<?php unset($__componentOriginala26fdc49f98646db4a4079ecb70c009d15e60950); ?>
<?php endif; ?>
        </div>
    </div>
    <div class="  bg-blue-900 ">
        <div class=" w-full h-full border-0   bg-blue-900 ">
            <?php if (isset($component)) { $__componentOriginal201f0548b8c5361bdcb16a3675f4cdbbff26ecbb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Home\Shopbycategory::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.shopbycategory'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Home\Shopbycategory::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal201f0548b8c5361bdcb16a3675f4cdbbff26ecbb)): ?>
<?php $component = $__componentOriginal201f0548b8c5361bdcb16a3675f4cdbbff26ecbb; ?>
<?php unset($__componentOriginal201f0548b8c5361bdcb16a3675f4cdbbff26ecbb); ?>
<?php endif; ?>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH C:\xampp81\htdocs\ecomerce-kunal\resources\views/welcome.blade.php ENDPATH**/ ?>