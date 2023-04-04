<div class="p-2 sm:p-4 pt-4">
  <?php echo \Livewire\Livewire::styles(); ?>

  <div class="flex justify-between pb-2">
    <div class="w-full text-2xl">
      <span wire:click="close" class="m-2 font-bolder cursor-pointer">&#10094;</span>
      <span class="">
        Select Image
      </span>
    </div>
    <div class="flex">
      <?php if($photos): ?>
      <div class="flex pl-2">
        <div>
          <i wire:click="resetit" class="fa-solid px-2 fa-refresh transition-transform cursor-pointer"></i>
        </div>
        <div>
          <i wire:click="save" class="fa-solid px-2 fa-save transition-transform cursor-pointer"></i>
        </div>
      </div>
      <?php endif; ?>
      <div wire:click="upload">
        <i
          class="<?php if($add): ?> rotate-180 <?php endif; ?> fa-solid fa-upload transition-transform cursor-pointer"></i>
      </div>
    </div>
  </div>
  <?php if($add): ?>
  <div>
    <?php if($photos): ?>
    <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div>
        <div class="h-44">
          <img class="h-full m-auto" src="<?php echo e($photo->temporaryUrl()); ?>">
        </div>
        <div class="text-center">
          <?php echo e($photo->getClientOriginalName()); ?>

        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="w-full h-60 relative sm:p-5 p-2 cursor-pointer">
      <div @click="document.querySelector('#imageupload').click()"
            class="flex flex-wrap justify-center align-baseline w-full h-full border border-indigo-600">
        <div class="location m-auto">
          <div class="text-center text-xl font-bold">Select Your Image </div>
          <div class="text-center"> Recommend to Upload Sqaure Image</div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <input id="imageupload" hidden type="file" wire:model="photos" multiple>
    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span class="error"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>
  <?php endif; ?>
  <div class="pt-5">
    <div>
      <input class="w-full p-2 mb-4 text-center bg-blue-100/50 border rounded-lg shadow-lg" wire:model="query"
             placeholder="search">
    </div>
    <div>
      <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <?php $__empty_1 = true; $__currentLoopData = $all_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div wire:click="select(<?php echo e($photo->id); ?>)">
          <img src='<?php echo e('/' . $photo['dir'] . $photo['name']); ?>' alt="<?php echo e($photo['alt']); ?>" />
          <div class="text-center"><?php echo e($photo->name); ?></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="flex">
          <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'm-auto','wire:click' => 'upload','type' => 'button']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'm-auto','wire:click' => 'upload','type' => 'button']); ?>
            <?php echo e(__('Please Add Photo First')); ?>

           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if($select == 'multiple'): ?>
  <div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'w-full my-2','wire:click' => 'active(\'gallary\')','type' => 'button']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full my-2','wire:click' => 'active(\'gallary\')','type' => 'button']); ?>
      <?php echo e(__('Select Image')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
  </div>
  <?php endif; ?>
  <?php echo \Livewire\Livewire::scripts(); ?>

</div>
<?php /**PATH /var/www/ecomerce-kunal/resources/views/livewire/universal/gallery.blade.php ENDPATH**/ ?>