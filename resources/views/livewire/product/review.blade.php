<div>
    @livewireStyles
    <div>
        @for($x=1;$x<6;$x++)
        <i wire:click="set({{$x}})" class="
           @if($orderdetail->review >= $x)
           fa-solid
           @else
           fa-regular
           @endif
           fa-star"></i>
        @endfor
    </div>
    @livewireScripts
</div>
