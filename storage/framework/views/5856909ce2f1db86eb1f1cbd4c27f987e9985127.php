<?php echo \Livewire\Livewire::styles(); ?>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
  <div class="flex gap-3 text-xl items-center">
    <div>
      You have
    </div>
    <div class="text-2xl font-bold">
      <?php echo e(count($orders)); ?>

    </div>
    <div>
      Orders, But
    </div>
    <div class="text-2xl font-bold">
      <?php echo e(count($orders)); ?>

    </div>
    <div>
      Order Pending
    </div>
  </div>
</div>
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
  <div class="flex text-xl items-center">
    <div>
      You have
    </div>
    <div class="m-3 text-2xl font-bold">
      <?php echo e(count($orders)); ?>

    </div>
    <div>
      Order Pending
    </div>
  </div>
</div>
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    </div>
  </div>
</div>
<?php echo \Livewire\Livewire::scripts(); ?><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/livewire/user/orderuser.blade.php ENDPATH**/ ?>