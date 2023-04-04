<?php echo \Livewire\Livewire::styles(); ?>

<div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="flex gap-3 text-xl items-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                You have
            </div>
            <div class="text-2xl font-bold">
                <?php echo e(count($orderitems)); ?>

            </div>
            <div>
                Orders Items, But
            </div>
            <div class="text-2xl font-bold">
                <?php echo e(count($orderitems->where('status',0))); ?>

            </div>
            <div>
                Orders Items Pending
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-2">
                <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_id=>$order_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-6">
                    <div class="flex flex-wrap gap-3 items-center">
                        <div class='text-2xl bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg'><?php echo e($order_id); ?>

                        </div>
                        <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                            <?php echo e($order_items[0]->order->address?->name); ?>

                        </div>
                        <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                            <?php echo e($order_items[0]->order->address?->phone); ?>

                        </div>
                        <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                            <?php echo e($order_items[0]->order->created_at->toDateString()); ?>

                        </div>
                        <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                            ₹<?php echo e($order_items[0]->order->price); ?>

                        </div>
                    </div>
                    <div class="py-4">
                        <div class="text-2xl">Order Items</div>
                        <?php $__currentLoopData = $order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-2 flex-wrap justify-start">
                            <div class="flex gap-2  items-center">
                                <div> <?php echo e($item->product->name); ?></div>
                                <div> <?php echo e($item->qty); ?> Qty</div>
                                <div> ₹ <?php echo e($item->price); ?></div>
                            </div>
                            <div class="flex gap-2 items-center"> 
                                <div> Store </div>
                                <div> 
                                    <select :value="<?php echo e($item->store_id); ?>" x-on:change="window.livewire.find('<?php echo e($_instance->id); ?>').storechange('<?php echo e($item->id); ?>',$event.target.value)">                        
                                        <?php $__empty_1 = true; $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value="" disable>You have nothing Please add delivery boys</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-2 items-center"> 
                                <div> Delivered </div>
                                <div> 
                                    <?php echo e($item->status); ?>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo \Livewire\Livewire::scripts(); ?><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/livewire/admin/orderadmin.blade.php ENDPATH**/ ?>