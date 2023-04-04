<!--ver0.2-->
<x-guest-layout>
    <section class="body-font overflow-hidden">
        <div x-data='{photo:"",fullscreeen:"",store_id:""}' class="px-3 sm:px-5 py-12 mx-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative 2xl:w-4/5 flex flex-wrap">
                <div class="relative md:w-1/2 p-1 sm:p-5 w-full object-cover object-center rounded">
                    <div class="">
                        <div>
                            <div>
                                <div>
                                    <div class='max-w-full max-h-full flex relative'>
                                        @auth
                                        <div class="absolute right-0 top-0 p-4 text-3xl z-10">
                                            <livewire:product.fav :select="$product->id" />
                                        </div>
                                        @endauth
                                        <style>
                                            .swiper-pagination-bullet-active{
                                                background: #ff0000c2!important;
                                            }
                                        </style>
                                        <div class="relative w-full flex gap-6 snap-x overflow-x-auto py-6 sm:py-10 z-0 scrollbar">
                                            <div class="w-full">
                                                <div class="max-w-max max-h-max">
                                                    <!-- Swiper -->
                                                    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
                                                    <div class="swiper mySwiper">
                                                        <div class="swiper-wrapper">
                                                            @forelse($product->photos as $x)
                                                            <div class="swiper-slide">
                                                                <img src="/storage/photos/{{$x->photo->name }}" />
                                                            </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                        <div class="swiper-pagination"></div>
                                                    </div>

                                                    <!-- Swiper JS -->
                                                    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

                                                    <!-- Initialize Swiper -->
                                                    <script>
var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 w-full mt-6 lg:mt-0">
                    <a href='/search?category={{$product->category->name}}'
                       <h2 class="text-sm title-font text-gray-700 tracking-widest">
                        {{ $product->category->name }}
                        </h2>
                    </a>
                    <h1 class="text-gray-900 text-xl md:text-3xl title-font font-extrabold mb-1">
                        {{ $product->name }}
                    </h1>
                    <div class="flex mb-4 relative flex">
                        <div x-data="{productprice:{{$product->productprice->first()}}}">
                            <span x-init='store_id=productprice.store_id'
                                  class="title-font font-bold text-2xl text-red-500/50 mr-3" x-text="'₹'+productprice.price">
                            </span>
                        </div>
                    </div>
                    <div>

                        <form x-ref="tocart" method="POST" 
                              action="{{ route('user.cart.store') }}">
                            <x-jet-input name='store_id' hidden x-model='store_id' />
                            <!--                            <div class="border-t border-gray-300 gap-2 my-5 space-around relative">
                                                            <div class="text-center font-bold py-5 flex">
                                                                @forelse($product->productprice as $x)
                                                                <div class="grid mx-4 text-xl border p-1 rounded text-white" x-init="store_id={{$x->store->id}}" >
                                                                    <label>
                                                                        <input x-model="store_id" required type="radio" name="store_id" value="{{$x->store->id}}" class="hidden peer" />
                                                                        <div class="peer-checked:bg-red-400 p-2 rounded">
                                                                            <div>{{$x->store->name}}</div>
                                                                            <div>₹ {{$x->price}}</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                @empty
                                                                <div class="w-full bg-gray-200 text-3xl py-5">
                                                                    Not Available
                                                                </div>
                                                                @endforelse
                                                            </div>
                                                        </div>-->
                            @if(count($product->productprice) >0)
                            <div class="flex border-t border-gray-300 gap-2 mt-5 py-5 space-around" x-data="{qty : 1}">
                                <div class="flex content-center items-center">
                                    <div class="relative flex items-center">
                                        <button  type="button" class="text-center w-6 sm:w-8 rounded" @click="qty>=0 ? qty--: ''">-</button>
                                        <input
                                            class="border-gray-300 focus:border-gray-500 focus:ring-black  focus:ring-opacity-50 rounded-md shadow-sm block mt-1 p-2 w-9 text-center sm:w-12"
                                            value="1" name="qty" x-model="qty" />
                                        <button type="button" class="text-center w-6 sm:w-8 rounded" @click="qty++">+</button>
                                    </div>
                                </div>
                                @csrf
                                <input class="hidden" name="product_id" value="{{ $product->id }}" />
                                <button type="submit"
                                        class="hidden rounded bg-red-400 duration-200 focus:outline-none focus:shadow-outline font-medium h-12 hover:bg-red-700 items-center justify-center px-6 text-white tracking-wide transition w-full">
                                    Buy Now
                                </button>

                                @auth
                                <button type="button"
                                        @click="cartitems = await fetch('{{ route('user.cart.create') }}/?product_id={{ $product->id }}&qty='+qty+'&store_id='+store_id).then(response => response.json())"
                                        class="rounded bg-red-400 duration-200 focus:outline-none focus:shadow-outline font-medium h-12 hover:bg-red-700 inline-flex items-center justify-center px-3 sm:px-6 text-white tracking-wide transition">
                                    Add to Cart
                                </button>
                                @endauth
                                <button @click="$refs.tocart.submit()"
                                         class="rounded bg-red-400 duration-200 focus:outline-none focus:shadow-outline font-medium h-12 hover:bg-red-700 inline-flex items-center justify-center px-4 sm:px-6 text-white tracking-wide transition">
                                    Buy
                                </button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
    </section>


</x-guest-layout>