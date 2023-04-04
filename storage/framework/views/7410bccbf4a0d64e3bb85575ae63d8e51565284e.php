<?php echo \Livewire\Livewire::styles(); ?>

<div class="md:col-span-1 flex p-4">
    <h3 class="text-2xl p-4">
        Orders
    </h3>
    <a href="<?php echo e(route('store.allorders',$store)); ?>">
        <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
            <?php if($orders): ?>
            <div></div>
            <?php echo e(count($orders)); ?>

            <?php else: ?>
            0
            <?php endif; ?>
        </h2>
    </a>
</div>
<div class="md:col-span-1 flex p-4">
    <h3 class="text-2xl p-4">
        Orders Amounts
    </h3>
    <a href="<?php echo e(route('store.allorders',$store)); ?>">
        <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
            <?php if($orderitems != []): ?>
            <?php echo e($orderitems?->sum('price')); ?>

            <?php else: ?>
            0
            <?php endif; ?>
        </h2>
    </a>
</div>
<?php echo \Livewire\Livewire::scripts(); ?><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/livewire/store/storeordersqty.blade.php ENDPATH**/ ?>