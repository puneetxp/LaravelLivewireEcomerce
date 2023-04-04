<div class=" w-full flex flex-col text-gray-600 bg-gray-200 " x-data="{ parent: '' }">
    <?php echo \Livewire\Livewire::styles(); ?>

    <div class="mt-4 flex w-full sm:w-1/2 flex-col text-left px-4 sm:mx-auto space-y-6">
        <input class="bg-white border shadow-lg w-full rounded-lg p-3" wire:model="query" placeholder="search">

        <?php if($edit): ?>
            <h2> Update </h2>
            <form wire:submit.prevent='update(<?php echo e($edit->id); ?>)'>
            <?php else: ?>
                <p class="text-2xl text-gray-600 font-extrabold w-full text-left"> Create </p>

                <form wire:submit.prevent="create">
        <?php endif; ?>

        <input wire:model="name" class="w-1/2 mx-auto border-0 rounded-lg p-3 shadow-lg" type="text" required>
        <!-- comment -->
        <?php if($edit): ?>
            <img src="<?php echo e(asset('storage/photos/product/' . $edit?->photo)); ?>" alt="alt" />
        <?php elseif($photo): ?>
            <img src="<?php echo e($photo->temporaryUrl()); ?>" alt="alt" />
        <?php endif; ?>
        <input wire:model="photo" type="file" required /><!-- comment -->
        <textarea wire:model="description" class="mt-2 w-full p-2 shadow-lg border-0 rounded-lg"></textarea>
        <input wire:model="price" class="mt-2 w-full p-2 shadow-lg border-0 rounded-lg" type="number">
        <select required="" wire:model="parent" pattern="[0-9]" title="Please Select Valid Category"
            class="w-1/2 mt-2 p-2 border-0 shadow-lg rounded-lg" required=""
            <?php if($edit): ?> value="<?php echo e($Fedit?->category_id); ?> <?php endif; ?>">
            <option value="" selected hidden>
                Please Select Category
            </option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>">
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class=" flex flex-row mx-auto w-1/2 justify-between font-extrabold my-4 ">
        <button
            class=" sm:ml-4 bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white py-2 px-4 border border-gray-600 hover:border-transparent shadow-lg rounded">
            Submit
        </button>
        <button
            class=" sm:mr-4 bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white py-2 px-4 border border-gray-600 hover:border-transparent rounded shadow-lg "
            wire:click="resets()">
            Reset
        </button>
    </div>
    </form>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- comment -->
        <div>
            <?php echo e($product->name); ?>

            <?php echo e($product->description); ?>

            <?php echo e($product->category->name); ?>

            <div class="bg-blue-500 p-2">
                <button wire:click='edit(<?php echo e($product->id); ?>)'> Edit</button><!-- comment -->
                <button wire:click='del(<?php echo e($product->id); ?>)'> Delete</button>
            </div>
            <img width="100" src='<?php echo e(asset('storage/photos/product/' . $product?->photo)); ?>' />
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

</div>
<?php /**PATH C:\Users\Puneet\server\laravel\ecomerce\ecomerce-kunal\resources\views/livewire/admin/productadmin.blade.php ENDPATH**/ ?>