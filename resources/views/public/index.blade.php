<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()?->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://kit.fontawesome.com/8c6ce18adb.js" crossorigin="anonymous"></script>
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <style>
        .swiper-pagination-bullet-active {
            background: #ff0000c2 !important;
        }
    </style>
</head>

<body x-data='{cartitems: @auth {{ Auth::user()?->carts }} @else [] @endauth }' class="overflow-x-hidden bg-white">
    <x-nav.top-line />
    <x-nav.home />
    <div class="font-sans text-gray-900 antialiased z-0 relative">
        <div class="bg-cover bg-no-repeat bg-center" style="margin-top: -72px;padding-top: 72px;background-image: url('storage/background_home.jpg'); ">
            <div class="py-12">
                <div class="max-w-7xl h-full border-0 mx-auto sm:px-6 lg:px-8">
                    <x-home.search />
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:p-2">
        <div class="swiper mySwiper" style="padding:3.75rem 0;">
            <div class="swiper-wrapper">
                @foreach($offers as $offer)
                <div class="swiper-slide">
                    <div>
                        @if($offer?->photo)
                        <img src="storage/photos/{{$offer?->photo}}" alt="{{$offer?->name}}" />
                        @else
                        <div class="text-2xl mt-4 text-center w-full">{{$offer?->name}}</div>
                        <div class="flex justify-center text-xl mt-4">Coupons Id</div>
                        <div class="flex justify-center text-3xl">{{$offer?->coupon?->name}}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:p-2">
        <div class="grid sm:grid-cols-2 py-12">
            <div class="flex items-center justify-center">
                <div class="grid text-center gap-2">
                    <div class="text-5xl mb-8 font-bold">
                        {{$catchofday?->name}}
                    </div>
                    <div class="text-xl font-semibold">
                        {{$catchofday?->product?->name}}
                    </div>
                    <div class="text-xl font-semibold">
                        ₹ {{$catchofday?->product?->productprice[0]?->price}}
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                @if($catchofday?->photo!=null)
                <img class="max-w-full max-h-full" src="/{{$catchofday?->photo}}" />
                @else
                <img class="max-w-full max-h-full" src="/{{$catchofday?->product?->photos[0]?->photo?->dir}}{{$catchofday?->product?->photos[0]?->photo?->name}}" />
                @endif
            </div>
        </div>
    </div>
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}

    <!-- Initialize Swiper -->
    {{-- <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            centeredSlides: true,
            spaceBetween: 30,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script> --}}
    @livewireScripts
    <div>

    </div>
    <x-nav.footer />
</body>

</html>