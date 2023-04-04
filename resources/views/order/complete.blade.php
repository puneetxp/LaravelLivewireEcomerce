<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Your Order is Placed') }}
        </h2>
    </x-slot>
    <div x-data="{ order : {{$order}} , purchase:[], total:0, cancel :false}" class="py-3 md:py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <div class="md:grid md:grid-cols-3 md:gap-6 p-2 sm:p-3 md:p-0">
            <div class= "col-span-2 mt-5 md:mt-0 col-span-2 bg-gray-200/90 shadow-xl md:rounded-md">
                <div class="p-2 md:p-4 text-3xl flex justify-between font-bold text-center cursor-pointer" >
                    <div>Order ID : </div>
                    <div x-text="order.id"></div>
                </div>
                <div class="p-2 md:p-4">
                    @foreach($order->items as $i)
                    <li class="py-6 flex">
                        <div x-data='{photo:{{$i->product->photos->first()}}}' class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                            <img :src="'/'+photo.photo.dir+photo.photo.name"  class="w-full h-full object-center object-cover">
                        </div>
                        <div class="ml-4 flex-1 flex flex-col">
                            <div>
                                <div class="flex justify-between text-base font-medium">
                                    <div class='grid'>
                                        <span>{{$i->product->name}}</span>
                                        <span>{{$i->product->category->name}}</span>
                                        <livewire:product.review :orderdetail="$i->id"/> 
                                    </div>
                                    <div>
                                        <div class="ml-4">
                                            <div class="text-right whitespace-nowrap">₹
                                                <span>{{$i->price}}</span>
                                            </div>
                                            <div class="text-right">× {{$i->qty}}</div>
                                            <div class="text-right whitespace-nowrap">₹ {{$i->qty*$i->price}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </div>
                <div class="p-2 md:p-4">
                    <div class="text-xl text-center">Order Address</div>
                    <div class="flex flex-wrap justify-center border rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform">
                        <div class="mr-1" x-text='order.address.line'></div> , 
                        <div class="mr-1" x-text='order.address.district'></div> , 
                        <div class="mr-1" x-text='order.address.state'></div> , 
                        <div class="mr-1" x-text='order.address.pincode'></div> , 
                        <div class="mr-1" x-text='order.address.phone'></div>
                        <div class="mr-1" x-text='order.address.alternate'></div>
                    </div>
                </div>
            </div>
            <div class="relative col-span-1">
                <div class="relative col-span-1 sm:p-6 md:p-0">
                    <div class="flex justify-between">
                        <div class="text-2xl font-bold">Total</div>
                        <div x-text=" '₹ '+total" class="whitespace-nowrap text-right text-2xl font-bold">
                        </div>
                    </div>
                    <template x-if='order.status === 9'>
                        <div class="py-3 my-3 bg-gray-600 md:rounded-md text-2xl font-bold text-center">
                            Cash On Delivery
                        </div>
                    </template>
                    <template x-if='order.status === 2'>
                        <div class="py-3 my-3 bg-gray-600 md:rounded-md text-2xl font-bold text-center">
                            Prepaid Paid
                        </div>
                    </template>
                    <template x-if='order.status !== 10'>
                        <div class="py-3 my-3 bg-red-400/80 hover:bg-red-600/80 hover:text-gray-200 md:rounded-md text-2xl font-bold text-center cursor-pointer" @click="cancel = true">Cancel/Edit Order</div>
                    </template>
                    <template x-if='order.status === 10'>
                        <div class="py-3 my-3 md:rounded-md text-2xl font-bold text-center cursor-pointer text-gray-700 bg-gray-900/90 cursor-not-allowed">Cancelled /Edited Order<br> Pending</div>
                    </template>
                </div>
            </div>
        </div>
        <div class="z-10 fixed inset-0 w-screen h-screen  bg-gray-900/70 flex content-center justify-center" x-show="cancel">
            <div @click="cancel=false" class="fixed inset-0 w-screen h-screen"></div>
            <div class="flex m-auto w-full content-center justify-center" x-data="{reasons:[{id:'',name:'Wrongly Placed'},{id:'', name:'Want to Order with other items'},{id:'', name:'Just dont want it'}],form:{},done:false}">
                <div x-show="!done" class="max-w-lg w-full py-12 bg-gray-500/90 rounded m-auto relative grid">
                    <form class="p-4 sm:p-8" @submit.prevent=" form._token = '{{ csrf_token() }}' ; await fetch('{{route('user.ordercancel' , ['order' => $order->id])}}', {
                          method: 'POST',
                          headers: { 'Content-Type': 'application/json' },
                          body: JSON.stringify(form)
                          }).then(response => response.json()).then(data => {done=true})">
                        <div @click="cancel=false" class="ml-auto p-2 bg-red-400/80 hover:bg-red-600/80 hover:text-gray-200 text-center text-2xl w-16 absolute top-0 right-0 rounded-tr-lg cursor-pointer">×</div>
                        <div class="sm:px-5 py-2">
                            <x-jet-label for="Reason" :value="__('Reason')" />
                            <select x-model="form.reason" class="border-gray-300 focus:border-gray-500 focus:ring-black focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full p-2" required>
                                <template x-for="item in reasons" >
                                    <option :value="item.name" x-text="item.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="sm:px-5 py-2">
                            <textarea x-model='form.description' class="w-full rounded-md p-2" placeholder="Notes (optional)">
                            </textarea>
                        </div>
                        <div class="sm:px-5 py-2">
                            <div class="sm:px-5 py-2">
                                <x-jet-button class="bg-red-500 p-2">
                                    {{ __('Sumbit') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div x-show="done" class="p-4 sm:p-8 max-w-lg w-full py-12 bg-gray-500/90 rounded m-auto relative">
                    Your Order is cancelled /pending
                </div>
            </div>
        </div>
    </div>
</x-app-layout>