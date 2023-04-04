<div>
    @livewireStyles
    <div class="py-12" x-data="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0 w-full">
                        <h3 class="text-lg font-medium text-gray-900">Set Catch Of day</h3>
                        <div @click="document.getElementById('image').click();" class="mt-1 text-sm text-gray-600 h-72 w-full imupload p-5 border shadow bg-gray-50">
                            @if ($image || $imageurl)
                            @if($image)
                            <img class="h-full mx-auto" src="{{ $image->temporaryUrl() }}">
                            @elseif($imageurl)<!-- for images edit -->
                            <img class="h-full mx-auto" src="/{{$imageurl}}">
                            @endif
                            @else
                            <div> Select Your Image</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div>
                        <form wire:submit.prevent="update">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Name*</label>
                                        <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="name"/>
                                    </div>
                                    <div class="col-span-6 sm:col-span-4 hidden">
                                        <input id="image" class="hidden w-full my-1 border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="file" wire:model="image"  name="image"  />
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="hidden sm:block font-medium text-sm text-gray-700" for="parent">Product*</label>
                                        <select class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control"  wire:model="product">
                                            <option value="" disabled selected="">Select Product</option>
                                            @foreach ($products as $product)<!-- comment -->
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" wire:click="delimage">Delete Image</button>
                                <button type="reset" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" wire:click="reset">Reset</button>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Set</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</div>
