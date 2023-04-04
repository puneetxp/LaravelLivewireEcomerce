<x-guest-layout>
  <div class="flex justify-between content-center items-center container max-w-7xl px-5 py-2 mx-auto">
    <div class="grid">
      <div class="mr-auto">Sort By</div>
      <div class="mb-3">
        <select @change="dq('#searchform').elements.namedItem('sortprice').value=this.event.target.value; dq('#searchform').submit()" :value="'{{request()->sortprice}}'" class="pr-8 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Sort By">
          <option slected value=''>Default</option>
          <option value="asc">Price: Low to High</option>
          <option value="desc">Price: High to Low</option>
        </select>
      </div>
    </div>
    <div class="grid">
      <div class="mr-auto">Category</div>
      <div class="mb-3">
        <select :value="'{{request()->category}}'" @change="dq('#searchform').elements.namedItem('category').value=this.event.target.value; dq('#searchform').submit()" class="pr-8 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Filter By">
          <option value=''>All</option>
          @foreach($categories as $i)
          <option value="{{$i['name']}}">
            {{$i['name']}}
          </option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="container max-w-7xl px-5 py-5 mx-auto">
    @if ($products->count())
    <x-product.flex :products="$products" />
    {{ $products->links() }}
    @else
    <p class="text-center">No Product Found.</p>
    @endif
  </div>
</x-guest-layout>
