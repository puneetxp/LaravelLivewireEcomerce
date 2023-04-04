<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()?->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
    <script src="https://kit.fontawesome.com/8c6ce18adb.js" crossorigin="anonymous"></script>
    <?php echo \Livewire\Livewire::styles(); ?>

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <style>
        .swiper-pagination-bullet-active {
            background: #ff0000c2 !important;
        }
    </style>
</head>

<body x-data='{cartitems: <?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()?->carts); ?> <?php else: ?> [] <?php endif; ?> }' class="overflow-x-hidden bg-white">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.top-line','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav.top-line'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.home','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav.home'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <div class="font-sans text-gray-900 antialiased z-0 relative">
        <div class="bg-cover bg-no-repeat bg-center" style="margin-top: -72px;padding-top: 72px;background-image: url('storage/background_home.jpg'); ">
            <div class="py-12">
                <div class="max-w-7xl h-full border-0 mx-auto sm:px-6 lg:px-8">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.search','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:p-2">
        <div class="swiper mySwiper" style="padding:3.75rem 0;">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div>
                        <?php if($offer?->photo): ?>
                        <img src="storage/photos/<?php echo e($offer?->photo); ?>" alt="<?php echo e($offer?->name); ?>" />
                        <?php else: ?>
                        <div class="text-2xl mt-4 text-center w-full"><?php echo e($offer?->name); ?></div>
                        <div class="flex justify-center text-xl mt-4">Coupons Id</div>
                        <div class="flex justify-center text-3xl"><?php echo e($offer?->coupon?->name); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:p-2">
        <div class="grid sm:grid-cols-2 py-12">
            <div class="flex items-center justify-center">
                <div class="grid text-center gap-2">
                    <div class="text-5xl mb-8 font-bold">
                        <?php echo e($catchofday?->name); ?>

                    </div>
                    <div class="text-xl font-semibold">
                        <?php echo e($catchofday?->product?->name); ?>

                    </div>
                    <div class="text-xl font-semibold">
                        ₹ <?php echo e($catchofday?->product?->productprice[0]?->price); ?>

                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <?php if($catchofday?->photo!=null): ?>
                <img class="max-w-full max-h-full" src="/<?php echo e($catchofday?->photo); ?>" />
                <?php else: ?>
                <img class="max-w-full max-h-full" src="/<?php echo e($catchofday?->product?->photos[0]?->photo?->dir); ?><?php echo e($catchofday?->product?->photos[0]?->photo?->name); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
    

    <!-- Initialize Swiper -->
    
    <?php echo \Livewire\Livewire::scripts(); ?>

    <div>

    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</body>

</html><?php /**PATH /home/puneetxp/Downloads/Telegram Desktop/SupremePure/resources/views/public/index.blade.php ENDPATH**/ ?>