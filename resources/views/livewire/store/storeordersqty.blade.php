@livewireStyles
<div class="md:col-span-1 flex p-4">
    <h3 class="text-2xl p-4">
        Orders
    </h3>
    <a href="{{route('store.allorders',$store)}}">
        <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
            @if($orders)
            <div></div>
            {{count($orders)}}
            @else
            0
            @endif
        </h2>
    </a>
</div>
<div class="md:col-span-1 flex p-4">
    <h3 class="text-2xl p-4">
        Orders Amounts
    </h3>
    <a href="{{route('store.allorders',$store)}}">
        <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
            @if($orderitems != [])
            {{$orderitems?->sum('price')}}
            @else
            0
            @endif
        </h2>
    </a>
</div>
@livewireScripts