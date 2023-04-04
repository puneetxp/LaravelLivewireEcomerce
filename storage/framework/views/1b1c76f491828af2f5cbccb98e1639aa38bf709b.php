<div>
    <?php echo \Livewire\Livewire::styles(); ?>

    <div x-data="{add: false}">
        <div class="grid grid-cols-6 gap-4  m-4">
            <div class="col-start-1 col-end-3">
                <input wire:model="query"  type="text">
                <button @click="add = true" class="bold text-2xl bg-blue-900 rounded  px-4">+</button>
            </div>
            <?php $__empty_1 = true; $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <select class="col-end-7 col-span-2 p-2 w-28" wire:model="store">
                <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
            </select>
            <?php $__currentLoopData = $store->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-start-1 col-end-7">

                <?php echo e($inventory->product->name); ?>

                <?php echo e($inventory->stock); ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="col-start-1 col-end-7 m-4">
                Please Add Product in Your Inventory
                <button @click="add = true"  class="bold text-2xl bg-blue-900 rounded  px-4">+</button>
            </div>

            <?php endif; ?>
        </div>
        <div  x-show="add"  class="fixed top-16 right-0 sm:m-5 backdrop-blur w-screen h-screen ">
            <form class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8 bg-black rounded-xl" wire:submit.prevent="inventoryadd">
                <div class="mr-auto"><button type="button" @click="add = false" class="bold text-2xl bg-blue-900 rounded  px-4">+</button></div>
                <select wire:model="productid">
                    <option>Please Select Options</option>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="text"pattern="[0-9]+" wire:model="stock"/>
                <input type="submit" value="Create"/>
            </form>
        </div>
    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

</div>
<?php /**PATH C:\Users\Puneet\server\laravel\ecomerce\ecomerce-kunal\resources\views/livewire/store/inventorystore.blade.php ENDPATH**/ ?>