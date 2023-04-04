@livewireStyles
<div>
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="md:col-span-1 flex p-4">
                <h3 class="text-2xl p-4">
                    Your Stores
                </h3>
                <a href="{{route('store.mystore')}}">
                    <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
                        @if($stores)
                        {{count($stores)}}
                        @else
                        You have No Store Please Add Store
                        @endif        
                    </h2>
                </a>
            </div>
        </div>
    </div>
    @if($stores)

    @foreach($stores as $x)
    <div class="bg-white shadow my-2">
        <div class="text-xl text-bold max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            {{$x->name}}
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="md:grid md:grid-cols-3 lg:grid-cols-4 md:gap-6 text-center">
                <livewire:store.storeordersqty :store="$x->id" />
                <div class="md:col-span-1 flex p-4">
                    <h3 class="text-2xl p-4">
                        Products
                    </h3>
                    <a href="{{route('store.product',$x->id)}}">
                        <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
                            @if($x->orders != [])
                            {{count($x->products)}}
                            @else
                            0
                            @endif
                        </h2>
                    </a>
                </div>
                <div class="md:col-span-1 flex p-4">
                    <h3 class="text-2xl p-4">
                        Delivery Boy
                    </h3>
                    <a href="{{route('store.deliveryboy',$x->id)}}">
                        <h2 class="text-xl font-bold bg-blue-300 mr-5 p-5">
                            @if($x->delivery_boys != [])
                            {{count($x->delivery_boys)}}
                            @else
                            0
                            @endif
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @endif
</div>
@livewireScripts