<div class="m-2">
    <?php echo \Livewire\Livewire::styles(); ?>

    <div class="py-12" x-data="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0 w-full">
                        <?php if($edit): ?>
                        <h3 class="text-lg font-medium text-gray-900">Edit Delivery Boy</h3>
                        <?php else: ?>
                        <h3 class="text-lg font-medium text-gray-900">Add Delivery Boy</h3>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div>
                        <?php if($edit): ?>
                        <form wire:submit.prevent="update">
                            <?php else: ?>                        
                            <form wire:submit.prevent="save">
                                <?php endif; ?>
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Name*</label>
                                            <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="hidden sm:block font-medium text-sm text-gray-700" for="phone">Phone*</label>
                                            <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="phone"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                    <button type="reset" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" wire:click="resets">Reset</button>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Send</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($deliveryboys != null): ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg sm:px-4 sm:py-4 p-0">
                <table class=" w-full table-fixed ">
                    <thead>
                        <tr class="text-left table-fixed w-full bg-gray-50">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="w-48 text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $deliveryboys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="text-left">
                            <td class="border px-4 py-2"><?php echo e($i->name); ?></td>
                            <td class="border px-4 py-2"><?php echo e($i->phone); ?></td>
                            <td class="border px-4 py-2"><?php echo e($i->name); ?></td>
                            <td>
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition " wire:click="edit(<?php echo e($i->id); ?>)">
                                    Edit
                                </button>
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-red-700" wire:click="del(<?php echo e($i->id); ?>)">
                                    Delete
                                </button>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div></div>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <script type="text/javascript">
      window.onscroll = function (ev) {
          if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
              window.livewire.emit('load-more');
          }
      };
      window.onload = function (ev) {
          if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
              window.livewire.emit('load-more');
          }
      };
    </script>
</div>

<?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/livewire/store/deliveryboystore.blade.php ENDPATH**/ ?>