@props(['product'])
<div {{ $attributes->merge(['class' => 'relative m-3 flex flex-wrap mx-auto justify-center w-full']) }}>
  <div class="relative w-full bg-white shadow-md rounded p-2 mx-1 my-3 cursor-pointer relative grid content-between rounded-lg bg-stripes-violet text-center">
    <div class="overflow-x-hidden rounded-2xl relative">
      <a href="/{{$product->name}}">
        @if(count($product?->photos)>0)
        <img class="aspect-square rounded-2xl w-full object-cover" src="/storage/photos/{{$product?->photos[0]->photo->name}}"/>
        @else
        <div class="aspect-square items-center w-full flex justify-center">
          No Image
        </div>
        @endif        
      </a>
      <div class="h-max mt-4 px-1.5 sm:px-2 mb-2 flex flex-col content-between">
        <div>
          <p class="text-sm lg:text-lg font-semibold text-gray-900 mb-0">{{$product->name}}</p>
        </div>
      </div>
      <button @click="cart = await fetch('{{route('user.cart.create')}}/?product_id={{$product->id}}&qty=1').then(response => response.json())  " class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none" viewBox="0 0 24 24" stroke="black">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
      </button>
    </div>
    <a href="/{{$product->slug}}">
      <div class=" flex justify-between mb-1 text-black group cursor-pointer content-end">
        <div>
          {{$product->category->name}}
        </div>
        <div class="text-md text-gray-800 mt-0">₹{{(int)$product->price}}</div>
      </div>
    </a>
  </div>
</div>
