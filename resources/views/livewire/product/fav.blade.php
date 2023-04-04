<span class="flex-grow hover:bg-white text-center sm:py-5 py-2 transition-colors hover:rounded-md">
    @livewireStyles
    <button wire:click="tooglefav" class="sm:w-6 sm:h-6 w-4 h-4 m-auto">
        <div class="relative" x-data='{misc:{{json_encode($_ENV) }}}'>
            <div class="relative" >
                @if($favourite)
                <i class="text-red-400 fa-solid fa-heart"></i>
                @else
                <i class="fa-regular fa-heart"></i>
                @endif
            </div>
        </div>
    </button>
    @livewireScripts
</span>