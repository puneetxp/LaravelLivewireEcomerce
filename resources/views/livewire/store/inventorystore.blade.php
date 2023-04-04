<div>
    @livewireStyles
    <div x-data="{add: false}">
        <div class="grid grid-cols-6 gap-4  m-4">
            <div class="col-start-1 col-end-3">
                <input wire:model="query"  type="text">
                <button @click="add = true" class="bold text-2xl bg-blue-900 rounded  px-4">+</button>
            </div>
            @forelse($stores as $store)
            <select class="col-end-7 col-span-2 p-2 w-28" wire:model="store">
                <option value="{{$store->id}}">{{$store->name}}</option>
            </select>
            @foreach($store->inventories as $inventory)
            <div class="col-start-1 col-end-7">

                {{$inventory->product->name}}
                {{$inventory->stock}}
            </div>
            @endforeach

            @empty

            <div class="col-start-1 col-end-7 m-4">
                Please Add Product in Your Inventory
                <button @click="add = true"  class="bold text-2xl bg-blue-900 rounded  px-4">+</button>
            </div>

            @endforelse
        </div>
        <div  x-show="add"  class="fixed top-16 right-0 sm:m-5 backdrop-blur w-screen h-screen ">
            <form class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8 bg-black rounded-xl" wire:submit.prevent="inventoryadd">
                <div class="mr-auto"><button type="button" @click="add = false" class="bold text-2xl bg-blue-900 rounded  px-4">+</button></div>
                <select wire:model="productid">
                    <option>Please Select Options</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <input type="text"pattern="[0-9]+" wire:model="stock"/>
                <input type="submit" value="Create"/>
            </form>
        </div>
    </div>
    @livewireScripts
</div>
