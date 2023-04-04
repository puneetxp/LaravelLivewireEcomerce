<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div x-data="{
             cartitems : {{ json_encode($cartitems) }},
             checkout : [],
             get total () {
             let x = 0;
             let y = 0;
             for (i = 0; i < this.cartitems.length; i++) {
             y = parseInt(this.cartitems[i].product.price);
             this.cartitems[i].cp = y;
             x += y * this.cartitems[i].qty;
             }
             return x;
             },
             }" class="py-12">
          <div x-show="cartitems.length != 0 ">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
              <div class="md:grid md:grid-cols-3 md:gap-6">
                <div
                  class="col-span-2 mt-5 rounded-md shadow-xl md:mt-0 bg-gray-200/90 ">
                  <div class="flex-1 px-4 py-6 mb-4 sm:px-6 sm:mb-6">
                    <div class="flow-root">
                      <div class="grid gap-4">
                        <template x-for="cartitem in cartitems">
                          <li x-init="checkout.push({id: cartitem.product.id, name: cartitem.product.name});"
                              class="relative flex px-2 pt-6">
                            <div
                              class="flex-shrink-0 w-24 h-24 overflow-hidden border border-gray-200 rounded-md">
                              <img :src="'/storage/photos/'+cartitem.product.photos[0].photo.name"
                                   alt=""
                                   class="object-cover object-center w-full h-full">
                            </div>
                            <div class="flex flex-col flex-1 ml-4">
                              <div>
                                <div
                                  class="flex justify-between text-base font-medium ">
                                  <h3>
                                    <a x-text="cartitem.product.name"
                                       :href="'/'+cartitem.product.slug">
                                    </a>
                                  </h3>
                                  <div class="ml-4 whitespace-nowrap">₹
                                    <span x-text="cartitem.cp">
                                    </span>
                                  </div>
                                </div>
                                <p class="mt-1 text-sm "
                                   x-text="cartitem.product.category.name">
                                </p>
                              </div>
                              <div
                                class="flex items-end justify-between flex-1 text-sm">
                                <div x-data="{ submit(){
                                     cartitem.qty = (cartitem.qty<2) ? 1 : cartitem.qty;
                                     fetch('/user/cart/'+this.cartitem.id, {
                                     method: 'POST',headers:{'Content-Type': 'application/json'},
                                     body: JSON.stringify({qty: cartitem.qty, _token:'{{ csrf_token() }}',_method:'PATCH'})})
                                     .then(response => response.json())
                                     .then(data => { cartitems = data , cart = cartitems.length})
                                     }}" class="flex items-center content-center">
                                  Qty
                                  <div
                                    class="relative flex items-center py-2 md:py-3">
                                    <div class="w-8 text-center rounded"
                                         @click="cartitem.qty-- ; submit()">-
                                    </div>
                                    <x-jet-input
                                      class="w-12 text-center rounded "
                                      x-model="cartitem.qty"
                                      @keyup="submit()" />
                                    <div class="w-8 text-center rounded "
                                         @click="cartitem.qty++; submit()">+
                                    </div>
                                  </div>
                                </div>
                                <div class="flex">
                                  <form @submit.prevent="await fetch('/user/cart/'+cartitem.id, {
                                         method: 'POST',
                                         headers: { 'Content-Type': 'application/json' },
                                         body: JSON.stringify({_token:'{{ csrf_token() }}',_method:'DELETE'})
                                         }).then(response => response.json())
                                         .then(data => {cartitems = data , cart = cartitems.length});
                                         ">
                                    @csrf
                                    @method('delete')
                                    <button type="sumbit" class="font-medium text-red-600 hover:text-red-500">
                                      <!--                                        <div x-text="cart.findIndex(i => i.id == cartitem.id)"></div>-->
                                      <i class="fa-solid fa-trash"></i>
                                    </button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </li>
                        </template>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="w-full col-span-1">
                  <div class="sticky top-20  w-full py-6 border-t border-gray-200 ">
                    <div class="flex justify-between text-base font-medium ">
                      <p>Subtotal</p>
                      <p>₹ <span x-text="total"></span> </p>
                    </div>
                    <div class="flex justify-between text-base font-medium ">
                      <p>Shipping</p>
                      <p>₹ <span x-text="total >= {{$_ENV['ORDER_MIN']}} ? 0 : {{$_ENV['ORDER_SHIP']}}"></span> </p>
                    </div>
                    <div class="flex justify-between text-base font-medium ">
                      <p>Total</p>
                      <p>₹ <span x-text="total+(total >= {{$_ENV['ORDER_MIN']}} ? 0 : {{$_ENV['ORDER_SHIP']}})"></span> </p>
                    </div>
                    <div class="mt-6">
                      <form x-ref="cartform" class="w-full" action="{{ route('user.order.store') }}"
                            method="POST">
                        @csrf
                        <x-jet-input class="hidden" checked type="checkbox" name="accept" />
                      </form>
                      <div class="w-full">
                        <button @click="$refs.cartform.submit();"
                                 class="flex items-center justify-center w-full px-6 py-3 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700">
                          Checkout
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div x-show="cartitems.length === 0">
            <div class="pt-5 text-4xl font-bold text-center">
              Nothing is here
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
