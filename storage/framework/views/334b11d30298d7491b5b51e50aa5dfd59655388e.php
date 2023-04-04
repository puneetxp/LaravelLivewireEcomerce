<div>
    <?php echo \Livewire\Livewire::styles(); ?>

    <div class="flex flex-col justify-around mx-auto w-full sm: bg-gray-200 rounded-lg shadow-xl"> 
        <?php if($edit): ?>
        <h2> Update </h2>
        <form wire:submit.prevent='update(<?php echo e($edit->id); ?>)'>
        <?php else: ?>
        <p class="w-full px-4 text-2xl text-gray-600 my-4 font-bold"> Create </p>
        <form wire:submit.prevent="create">
        <?php endif; ?>
            <div class=" flex mx-4 text-gray-600 font-bold ">
                <input  wire:model="name" class="p-2 shadow-lg mx-auto  my-2 md:w-1/2 w-full rounded-lg border-0 ">
                <?php if($photo): ?>
                <img width="50" src="<?php echo e($photo->temporaryUrl()); ?>" alt="alt">
                <?php elseif($edit): ?>
                <img width="50" src="<?php echo e(asset('storage/photos/category/'.$edit?->photo)); ?>" alt="please upload"/>
                <?php endif; ?>
                <input wire:model="photo" type="file" class="w-1/2 flex justify-start mx-4 my-4  "/>
            </div>
            <div class="flex justify-start flex-row m-4 ">
                <select wire:model='parent'class="w-20 border-0 shadow-lg  rounded-sm " value='<?php echo e($edit?->category_id); ?>'>
                    <option>
                    </option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>">
                        <?php echo e($category->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="px-4 py-1 mx-4 shadow-lg text-center bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white  border border-gray-600 hover:border-transparent rounded">
                    Submit
                </button>
            </div>
        </form>
        <div class="flex flex-wrap justify-around content-around ">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-wrap p-5 max-w-md bg-cover" style='background-image: url("<?php echo e(asset('storage/photos/category/'.$category?->photo)); ?>") '>
                <div>
                    <div class="w-full sm:w-auto"><?php echo e($category->name); ?></div>
                    <div><?php echo e($category?->categoryid?->name); ?></div>
                </div>
                <div class="mx-auto p-2">
                    <button wire:click='edit(<?php echo e($category->id); ?>)' class="shadow-lg text-center bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white px-4 py-1 border border-gray-600 hover:border-transparent rounded"> Edit</button><!-- comment -->
                    <button wire:click='del(<?php echo e($category->id); ?>)'  class="shadow-lg text-center bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white px-4 py-1 border border-gray-600 hover:border-transparent rounded"> Delete</button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

</div>
<?php /**PATH C:\Users\Puneet\server\laravel\ecomerce\ecomerce-kunal\resources\views/livewire/admin/categoryadmin.blade.php ENDPATH**/ ?>