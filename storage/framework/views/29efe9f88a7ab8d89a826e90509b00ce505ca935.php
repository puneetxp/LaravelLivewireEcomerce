<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.deliveryboyadmin', [])->html();
} elseif ($_instance->childHasBeenRendered('OCrA7Na')) {
    $componentId = $_instance->getRenderedChildComponentId('OCrA7Na');
    $componentTag = $_instance->getRenderedChildComponentTagName('OCrA7Na');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OCrA7Na');
} else {
    $response = \Livewire\Livewire::mount('admin.deliveryboyadmin', []);
    $html = $response->html();
    $_instance->logRenderedChild('OCrA7Na', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/admin/deliveryboy.blade.php ENDPATH**/ ?>