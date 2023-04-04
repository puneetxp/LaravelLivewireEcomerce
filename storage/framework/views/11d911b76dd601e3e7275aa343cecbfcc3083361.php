<div class="w-full mx-auto sm:w-2/5 bg-gray-200 shadow-xl rounded-lg">
    <?php echo \Livewire\Livewire::styles(); ?>

    <h3 class="text-2xl text-gray-600 font-extrabold ml-6 my-4 text-center p-2">All Stores</h5>
        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="px-5 py-2 text-center">
            <?php echo e($store->name); ?>

            <?php echo e($store->user->name); ?>

            <?php echo e($store->log); ?>

            <?php echo e($store->lat); ?>

            <input wire:click="updates(<?php echo e($store->status); ?>,<?php echo e($store->id); ?>)" type='checkbox' <?php if($store->status): ?> checked <?php endif; ?> />
            <input type="button" value="Delete" name="delete" type="button" wire:click="destroys(<?php echo e($store->id); ?>)" />
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo \Livewire\Livewire::scripts(); ?>

        <script>
            navigator.geolocation.getCurrentPosition(function (position) {
                let lat = position.coords.latitude;
                let long = position.coords.longitude;
                var at = lat.toFixed(4) + "," + long.toFixed(4);
                document.getElementById("lat").value = lat.toFixed(5);
                document.getElementById("long").value = long.toFixed(5);
                document.querySelector(".location input").placeholder = "Your Location";
                console.log(at);
            });
        </script>
</div><?php /**PATH C:\Users\Puneet\server\laravel\ecomerce\ecomerce-kunal\resources\views/livewire/admin/storeadmin.blade.php ENDPATH**/ ?>