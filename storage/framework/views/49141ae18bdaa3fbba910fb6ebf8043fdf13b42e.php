<div class="py-12">
    <?php echo \Livewire\Livewire::styles(); ?>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div  x-data='{add:false}'  class="flex justify-between p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    Your WishList
                </div>
            </div>
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                <div class="mt-2 text-sm text-gray-500">
                    <?php $__currentLoopData = $favs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/<?php echo e($fav->product->name); ?>">
                        <div  class="relative flex flex-wrap justify-center text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:bg-gray-400 hover:text-white">
                            <?php if(count($fav->product?->photos)>0): ?>
                            <div class="mx-4">
                                <img class='w-20' src="/<?php echo e($fav->product?->photos[0]?->photo->dir); ?><?php echo e($fav->product?->photos[0]?->photo->name); ?>" :alt="<?php echo e($fav->product?->photos[0]?->photo->name); ?>"/>
                            </div>
                            <?php endif; ?>
                            <div>
                                <?php echo e($fav->product->name); ?>

                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

</div><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/livewire/user/myfav.blade.php ENDPATH**/ ?>