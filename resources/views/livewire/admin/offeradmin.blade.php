<div>
  @livewireStyles
  <div class="py-12" x-data="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
          <div class="px-4 sm:px-0 w-full">
            @if($edit)
            <h3 class="text-lg font-medium text-gray-900">Edit Offer</h3>
            @else
            <h3 class="text-lg font-medium text-gray-900">Add Offer</h3>
            @endif
            <div @click="document.getElementById('image').click();" class="mt-1 text-sm text-gray-600 h-72 w-full imupload p-5 border shadow bg-gray-50">
              @if ($image || $imageurl)
              @if($image)
              <img class="h-full mx-auto" src="{{ $image->temporaryUrl() }}">
              @elseif($imageurl)<!-- for images edit -->
              <img class="h-full mx-auto" src="{{asset('storage/photos/'.$imageurl) }}">
              @endif
              @else
              <div class="location"> Select Your Image</div>
              @endif
            </div>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <div>
            <form wire:submit.prevent="submitoffer">
              <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                  @if ($message)
                  <div class="alert alert-success my-2">
                    {{ $message }}
                  </div>
                  @endif
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Offer*</label>
                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="name"/>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-span-6 sm:col-span-4 hidden">
                    <input id="image" class="hidden w-full my-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="file" wire:model="image"  name="image"  />
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label class="hidden sm:block font-medium text-sm text-gray-700" for="coupon">Coupon*</label>
                    <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control"  wire:model="coupon">
                      <option value="" selected=""></option>
                      @foreach ($coupons as $Offer)<!-- comment -->
                      <option value="{{ $Offer->id }}">{{ $Offer->name }}</option>
                      @endforeach
                    </select>
                    @error('coupon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                @if($edit)
                <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" wire:click="delimage">Delete Image</button>
                @endif
                <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transcoupon rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" wire:click="resetoffer">Reset</button>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transcoupon rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Submit</button>
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
              <th class="px-4 py-2">Offer</th>
              <th class="px-4 py-2">Coupon</th>
              <th class="w-48 text-center"> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach($offers as $Offer)
            @if( $Offer->id != '0' )
            <tr class="text-left">
              <td class="border px-4 py-2">
                {{ $Offer->name }}
              </td>
              <td class="border px-4 py-2">
                {{ $Offer->coupon->name }}
              <td>
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transcoupon rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition " wire:click="checkedit({{ $Offer->id }})">
                  Edit
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transcoupon rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-red-700" wire:click="deleteoffer({{ $Offer->id }})">
                  Delete
                </button>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @livewireScripts
</div>
