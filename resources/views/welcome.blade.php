<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 h-screen  ">
        <div class="max-w-7xl h-full border-0 mx-auto sm:px-6 lg:px-8">
            <x-home.search />
        </div>
    </div>
    <div class=" ">
        <div class=" w-full border-0 mx-auto sm:px-6 bg-blue-900 lg:px-8">
            <x-home.menu />
        </div>
    </div>
    <div class="  bg-blue-900 ">
        <div class=" w-full h-full border-0 mx-auto sm:px-6 bg-blue-900 lg:px-8">
            <x-home.banner />
        </div>
    </div>
    <div class="  bg-blue-900 ">
        <div class=" w-full h-full border-0   bg-blue-900 ">
            <x-home.shopbycategory/>
        </div>
    </div>

</x-guest-layout>