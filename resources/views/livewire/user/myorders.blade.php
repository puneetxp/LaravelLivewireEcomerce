<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    Your Orders
                </div>
                <div class="mt-6 text-gray-500">
                </div>
            </div>
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                @foreach($orders as $order)
                <div class="p-6">
                    <a href="/user/order/{{$order->id}}">
                        <div class="flex gap-3"><div class="w-24">Date </div>:<div>{{$order->created_at->toDateString()}}</div></div>
                        <div class="flex gap-3"><div class="w-24">Order ID </div>:<div>{{$order->id}}</div></div>
                        <div class="flex gap-3"><div class="w-24">Amount </div>:<div>₹ {{$order->price}}  +  ₹ {{$order->shipping}}</div></div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <button type="button" wire:click="loadmore" class="mb-2 w-full inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out">Load More</button>
    </div>
</div>