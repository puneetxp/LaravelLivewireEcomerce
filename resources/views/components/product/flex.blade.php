@props(['products'])
@if ($products->count() > 0)
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
  @foreach ($products as $product)
  <x-product.flexitem
    :product="$product"
    />
  @endforeach
</div>
@endif
