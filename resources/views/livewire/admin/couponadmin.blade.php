<div>
  @livewireStyles
  <div class="py-12" x-data="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <div>
            <form wire:submit.prevent="createcoupon">
              <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Name</label>
                    <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="name"/>
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="parent">Users</label>
                    <select class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control"  wire:model="user">
                      <option value="0" selected=""></option>
                      @foreach ($users as $user)<!-- comment -->
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Value</label>
                    <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="value"/>
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Minimum</label>
                    <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="minimum"/>
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Percentage</label>
                    <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="percentage"/>
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="parent">Product</label>
                    <select class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control"  wire:model="product">
                      <option value="0" selected=""></option>
                      @foreach ($products as $product)<!-- comment -->
                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" type="reset">Reset</button>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow sm:rounded-lg sm:px-4 sm:py-4 p-0">
        <table class=" w-full table-fixed ">
          <thead>
            <tr class="text-left table-fixed w-full bg-gray-50">
              <th class="px-4 py-2">Category</th>
              <th class="px-4 py-2">User</th>
              <th class="px-4 py-2">Product</th>
              <th class="w-48 text-center"> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach($coupons as $coupon)
            <tr class="text-left">
              <td class="border px-4 py-2">{{ $coupon->name }}</td>
              <td class="border px-4 py-2">
                {{$coupon->user?->name}}
              </td>
              <td class="border px-4 py-2">
                {{$coupon->product?->name}}
              </td>
              <td class="border px-4 py-2">
                <div class="flex justify-center">
                  <span class="m-auto">
                    @if($coupon->status == 0)
                    <button class="bg-red-400 p-4 rounded" wire:click="toogle({{$coupon->id}},1)">
                      Disable
                    </button>
                    @else
                    <button class="bg-green-400  p-4 rounded" wire:click="toogle({{$coupon->id}},0)">
                      Enable
                    </button>
                    @endif
                  </span>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @livewireScripts
</div>
