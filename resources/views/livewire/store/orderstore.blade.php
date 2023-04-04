@livewireStyles
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex gap-3 text-xl items-center max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            You have
        </div>
        <div class="text-2xl font-bold">
            {{count($orderitems)}}
        </div>
        <div>
            Orders Items, But
        </div>
        <div class="text-2xl font-bold">
            {{count($orderitems->where('status',0))}}
        </div>
        <div>
            Orders Items Pending
        </div>
    </div>
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg p-2">
            @foreach ($store as $order_id=>$order_items)
            <div class="mb-6">
                <div class="flex flex-wrap gap-3 items-center">
                    <div class='text-2xl bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg'>{{$order_id}}
                    </div>
                    <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                        {{$order_items[0]->order->address?->name}}
                    </div>
                    <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                        {{$order_items[0]->order->address?->phone}}
                    </div>
                    <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                        {{$order_items[0]->order->created_at->toDateString()}}
                    </div>
                    <div class=" bg-blue-400 p-2 text-center rounded-tl-lg rounded-br-lg">
                        ₹{{$order_items[0]->order->price}}
                    </div>
                </div>
                <div class="text-xl my-2 flex gap-2 items-center"> 
                    <div> Delivery Boy </div>
                    <div> 
                        <select @onchange="">                        
                            @forelse($deliveryboys as $deliveryboy)
                            <option value="{{$deliveryboy->id}}">{{$deliveryboy->name}}</option>
                            @empty
                            <option value="" disable>You have nothing Please add delivery boys</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="py-4">
                    <div class="text-2xl">Order Items</div>
                    @foreach($order_items as $item)
                    <div class="flex gap-2">
                        <div> {{$item->product->name}}</div>
                        <div> {{$item->qty}} Qty</div>
                        <div> ₹ {{$item->price}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@livewireScripts