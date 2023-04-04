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

        <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    </head>
    <body x-data='{query:[], cartitems: @auth {{ Auth::user()->carts }} @else [] @endauth }' class="font-sans antialiased overflow-x-hidden">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        <x-nav.top-line/>
        @livewire('navigation-menu')
        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @stack('modals')
    @livewireScripts
    <x-nav.footer/>
    <!--  Made by gigtechservices, Puneet-->
</body>
</html>
