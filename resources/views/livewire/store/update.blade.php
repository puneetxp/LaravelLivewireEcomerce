<div>
    @livewireStyles
    <div class="flex items-center">
        <div class="p-2">
            {{$product->name}}
        </div>
        <div class="p-2">
            {{count($product->Inventories)}}
        </div>
        <form wire:submit.prevent="uporder" class="flex items-center">
            <h4 class="p-2"> Add or Remove Inventories </h4>
            <input class="p-2" wire:mode="number" type="text"/>
            <button class="p-2">Submit</button> 
        </form>
    </div>
    @livewireScripts
</div>
