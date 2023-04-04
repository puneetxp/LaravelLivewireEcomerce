
<div class="grid w-full grid-cols-2 gap-2 sm:gap-3 p-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 text-white font-medium">
  @foreach ($categories as $category) 
  <div class="aspect-square relative ">
    <a class="rounded-full" href="/search?category={{  $category->name }}">
      @if( $category->photo)
      <img src="/storage/photos/category/{{ $category->photo }}" alt="{{ $category->name }}" class="w-full h-full rounded-full shadow-xl">
      @else
      <div class="flex justify-center items-center h-full drop-shadow-md">
        <span class="text-center m-auto">
          No Photo
        </span>
      </div>
      @endif
      <div  class="w-full" >
        <h3 class="w-full text-xl text-center rounded">
          {{$category->name}}
        </h3>
      </div>
    </a>
  </div>
  @endforeach
</div>
