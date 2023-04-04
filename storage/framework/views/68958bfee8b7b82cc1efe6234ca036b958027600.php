<div>
    <?php echo \Livewire\Livewire::styles(); ?>

    <div>
        <?php for($x=1;$x<6;$x++): ?>
        <i wire:click="set(<?php echo e($x); ?>)" class="
           <?php if($orderdetail->review >= $x): ?>
           fa-solid
           <?php else: ?>
           fa-regular
           <?php endif; ?>
           fa-star"></i>
        <?php endfor; ?>
    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

</div>
<?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/livewire/product/review.blade.php ENDPATH**/ ?>