<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://kit.fontawesome.com/8c6ce18adb.js" crossorigin="anonymous"></script>
    @livewireStyles
    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
  </head>
  <body x-data='{query:{serach:"{{request()->search}}",category:"{{request()->category}}",sortprice:"{{request()->sortprice}}"}, cartitems: @auth {{ Auth::user()->carts }} @else [] @endauth }' class="overflow-x-hidden bg-white">
  <x-nav.top-line/>
  @livewire('navigation-menu')
  <div class="font-sans text-gray-900 antialiased z-0 relative">
    {{ $slot }}
  </div>
  @livewireScripts

  <x-nav.footer/>
  <!--  Made by gigtechservices.com, Puneet-->
  <div x-init='query={serach:"{{request()->search}}",category:"{{request()->category}}",sortprice:"{{request()->sortprice}}"}'>

  </div>
</body>
</html>
