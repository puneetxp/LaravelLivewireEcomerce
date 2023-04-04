<div class="m-2">
  @livewireStyles
  <from class="p-4 w-full mx-auto max-w-7xl" >
    <div class="flex justify-between">
      <div>
        <label class="text-sm font-medium text-gray-700 block"
               for="category">Product*</label>
        <select required="" wire:model="select"
                title="Please Select Valid Category"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
          <option value="" selected hidden>
          Select Products
          </option>
          @forelse ($products as $product)
          <option value="{{ $product->id }}">
            {{ $product->name }}
          </option>
          @empty
          <option disabled="">
            Please Add Product First
          </option>
          @endforelse
        </select>
      </div>
      <x-jet-input wire:model="price" class="p-2"/>
      <button wire:click="save({{$select}}, {{$price}})">Submit</button>
    </div>
  </from>
  <div class="w-full p-5">
    <input class="bg-blue-100 p-2 w-full rounded-md text-center" wire:model="query" placeholder="Search"/>
  </div>
  @foreach($productsprice as $product)
  <div class="grid lg:grid-cols-5 sm:grid-cols-2 gap-4 p-4 w-full mx-auto max-w-7xl">
    <div class="text-center">{{$product->product->name}}</div>
    <div class="text-center lg:col-span-2">
      {{$product->price}}
    </div>
    <div class="m-auto text-center">
      <button class="rounded p-2 lg:p-1" wire:click="edit({{$product->product->id}})" >edit</button>
      <button class="rounded p-2 lg:p-1" wire:click="del({{$product->id}})" >Delete</button>
    </div>
  </div>
  @endforeach
  @livewireScripts
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
