<div class="py-12">
    @livewireStyles
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div  x-data='{add:false}'  class="flex justify-between p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    Your Address
                </div>
                <div class="mt-3">
                    <div @click="add = ! add" class="cursor-pointer">
                        <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                            <x-jet-button>
                                Add Address
                            </x-jet-button>
                        </div>
                    </div>
                    <x-user.address/>
                </div>
            </div>
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                @foreach($addresses as $address)
                <div class="p-6 bg-slate-200">
                    <div class="flex gap-3"><div>{{$address->name}}</div></div>
                    <div class="flex gap-3"><div>{{$address->line}}</div></div>
                    <div class="flex gap-3"><div>{{$address->phone}}</div></div>
                    <div class="flex gap-3"><div>{{$address->email}}</div></div>
                    <div class="flex justify-end">
                        <x-jet-button class="bg-red-400 hover:bg-red-500" wire:click="del({{$address->id}})">
                            Delete
                        </x-jet-button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @livewireScripts
</div>