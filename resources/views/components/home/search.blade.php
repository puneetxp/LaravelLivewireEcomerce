<div class=" w-full h-96 flex items-center justify-items-start">
  <div class=" p-2 w-full mt-8 sm:p-2 md:p-2 lg:p-2  ">
    <form action="{{route('public.search')}}">
      <div class="bg-white flex  items-center rounded-full shadow-xl">
        <input required name="search" class="rounded-l-full w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none text-center" id="search" placeholder="Search">
        <div class="p-2 sm:p-4">
          <button class="bg-red-500 text-white rounded-full p-2 hover:bg-green-700 focus:outline-none w-12 h-12 flex items-center justify-center">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>