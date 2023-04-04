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
    $html = \Livewire\Livewire::mount('store.dashboard', [])->html();
} elseif ($_instance->childHasBeenRendered('LTQLWf3')) {
    $componentId = $_instance->getRenderedChildComponentId('LTQLWf3');
    $componentTag = $_instance->getRenderedChildComponentTagName('LTQLWf3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LTQLWf3');
} else {
    $response = \Livewire\Livewire::mount('store.dashboard', []);
    $html = $response->html();
    $_instance->logRenderedChild('LTQLWf3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/store/dashboard.blade.php ENDPATH**/ ?>