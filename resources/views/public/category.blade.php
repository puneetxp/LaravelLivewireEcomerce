<x-guest-layout>
  <div class="font-sans text-gray-900 antialiased z-0 relative">
    <div class="bg-cover bg-no-repeat bg-center" style="margin-top: -72px;padding-top: 72px;background-image: url('storage/background_home.jpg'); ">
      <div class="py-12">
        <div class="max-w-7xl h-full border-0 mx-auto sm:px-6 lg:px-8">
          <x-home.shopbycategory :categories="$categories"/>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>