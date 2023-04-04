<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            @if($order->status == 1)
            {{ __('Please Complete Pending Order') }}
            @else
            {{ __('Review Your Order') }}
            @endif
        </h2>
    </x-slot>
    <div  x-data='{orderwithdetails : {{$order}},
          total:  {{$razorpayOrder->amount_due/100}} , addresses :  {{Auth::user()->addresses}} , add : false,
          order : {user_id: "{{Auth::user()->id}}",id:"{{$order->id}}",payment:false,address:false,_token:"{{ csrf_token() }}"}
          }' class="py-3 md:py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="col-span-2 mt-5 md:mt-0 col-span-2 bg-gray-200/90 shadow-xl rounded-md">
                <div class="p-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/></svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a class="text-gray-900">Select Address</a></div>
                    </div>
                    <div class="md:ml-12"  @click="(addresses.length == 0) ? document.querySelector('#addaddress').click() : '' ; ">
                        <div class="mt-2  text-gray-600 text-sm flex flex-wrap items-center">
                            <template x-for='address in addresses'>
                                <div  class="relative">
                                    <div @click="order.address = address.id" :class="(order.address == address.id)? 'bg-gray-700 text-white' : ' '" class="flex flex-wrap justify-center border border-gray-900 text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:bg-gray-700 hover:text-white">
                                        <div class="mr-1" x-text='address.line'></div>,
                                        <div class="mr-1" x-text='address.district'></div>,
                                        <div class="mr-1" x-text='address.state'></div>,
                                        <div class="mr-1" x-text='address.pincode'></div>,
                                        <div class="mr-1" x-text='address.email'></div>,
                                        <div class="mr-1" x-text='address.phone'></div>
                                        <div class="mr-1" x-text='address.alternate'></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <template x-if="addresses.length == 0">
                            <div class="mt-2 text-2xl font-bold text-gray-600 flex flex-wrap items-center">
                                Please Add New 
                            </div>
                        </template>
                        <span class="flex justify-center">
                            <div class="relative w-full p-2">
                                <button id='addaddress' @click="add=true" class="w-full border border-gray-900 h-14 mt-5 p-2 rounded-md bg-gray-200">+</button>
                            </div>
                        </span>
                    </div>
                    <x-user.address/>
                </div>
                <div x-show="order.address" class="p-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <i class="fa-solid fa-money-check"></i>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a class="text-gray-900">Payment</a></div>
                    </div>

                    <div class="md:ml-12">
                        <div class="mt-2 text-gray-600 text-sm grid grid-cols-2 items-center">
                            <div  class="relative">
                                <div @click="order.payment = 9" :class="(order.payment == 9)? 'bg-gray-700 text-white' : ''" class="border text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform border-gray-900 hover:bg-gray-700 hover:text-white">

                                    <div class="text-lg font-semibold">C O D</div>
                                    <div>₹&ensp;<span x-text="total"></span></div>
                                </div>
                            </div>
                            <div  class="relative">
                                <div @click="order.payment = 1" :class="(order.payment == 1)? 'bg-gray-700 text-white' : ''" class="border text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform border-gray-900 hover:bg-gray-700 hover:text-white">
                                    <div class="text-lg font-semibold">Prepaid</div>
                                    <div>₹&ensp;<span x-text="total"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 sm:p-4"
                     <h3> Order Items </h3>
                    @foreach($order->items as $i)
                    <li class="py-6 flex">
                        <div x-data='{photo:{{$i->product->photos->first()}}}' class="flex-shrink-0 w-14 h-14 border border-gray-200 rounded-md overflow-hidden">
                            <img :src="'/'+photo.photo.dir+photo.photo.name"  alt="" class="w-full h-full object-center object-cover">
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="flex ml-2">
                                <span class="relative flex items-center" x-text="item.price*1"></span>&ensp;
                                <div class="relative flex items-center">&#215;&ensp;</div>
                                <div class="relative flex items-center">
                                    {{$i->qty}}
                                </div>
                            </div>
                            <div class="flex" >
                                <div class="relative flex items-center">₹&ensp;</div>
                                <div class="relative flex items-center flex-row-reverse">
                                    {{$i->qty*$i->price}}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </div>
            </div>
            <div class="relative col-span-1 p-6 md:p-0">
                <div class="sticky top-20 ">
                    <div class="flex justify-between text-base font-medium ">
                        <p>Subtotal</p>
                        <p>₹ <span x-text="orderwithdetails.price"></span> </p>
                    </div>
                    <div class="flex justify-between text-base font-medium ">
                        <p>Shipping</p>
                        <p>₹ <span x-text="orderwithdetails.shipping"></span> </p>
                    </div>
                    <div class="flex justify-between text-base font-medium ">
                        <p>Total</p>
                        <p>₹ <span x-text="total"></span> </p>
                    </div>
                    <template x-if="order.payment == 9" >
                        <form class="flex flex-wrap justify-center" action="{{ route('user.order.update',$order->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" :value="order.id">
                            <input type="hidden" name="user_id" :value="order.user_id">
                            <input type="hidden" name="payment" :value="order.payment">
                            <input type="hidden" name="address" :value="order.address">
                            <x-jet-input class="p-2 w-full mt-2" name="note"  x-model="order.note" placeholder="Any Note"/>
                            <button type='submit' class="mt-6 w-full">
                                <div class="w-full flex flex-col justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700">
                                    <div class="text-center" x-html="'Cash On Delivery<br>₹ '+total">
                                    </div>
                                </div>
                            </button>
                        </form>

                    </template>
                    <div class="flex justify-center" :class="(order.payment == 1) ? 'block': 'hidden'">
                        <div class="mt-2 w-full">
                            <x-jet-input class="p-2 mt-0 my-6 w-full" name="note" x-model="order.note" placeholder="Any Note"/>
                            <div @click=" fetch('{{ route('user.order.update',$order->id) }}', {method: 'PUT',headers:{'Content-Type': 'application/json'},body: JSON.stringify(order)}).then(document.querySelector('#rzp-button1').click())" 
                                  class="w-full flex flex-col justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700">
                                <div class="text-center">
                                    Proceed to RazorPay
                                </div>
                                <div class="flex justify-center">
                                    <button id="rzp-button1" x-text="'₹ '+total"></button>
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                    <form name='razorpayform' action="{{ route('user.payment.update', $order->payment->id) }}" method="POST" >
                                        @csrf
                                        @method('PUT')  
                                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                        <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
                                        <input type="hidden" name="order_id" :value="order.id">
                                    </form>
                                    <script> var options = {
    "key": '{{env('RAZORPAY_KEY')}}',
    "amount": '{{$razorpayOrder->amount_due*100}}',
    "name": '{{$order->id}}',
    "image": "/storage/logok.png",
    "prefill": {
        "name": '{{Auth::user()->name}}',
        "email": '{{Auth::user()->email}}',
        "contact": '{{Auth::user()->phone}}',
    },
    "notes": [],
    "theme": {
        "color": "rgb(67 56 202)"
    },
    "order_id": '{{$razorpayOrder->id}}',
};
options.handler = function (response) {
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};
options.theme.image_padding = false;
options.modal = {
    ondismiss: function () {
        console.log("This code runs when the popup is closed");
    },
    escape: true,
    backdropclose: false
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function (e) {
    rzp.open();
    e.preventDefault();
}
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>