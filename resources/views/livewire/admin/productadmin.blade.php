<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg max-w-7xl m-auto py-5 my-5">
    @livewireStyles
    @if ($selectimage)
    <livewire:universal.gallery :select="'multiple'" />
    @else
    <div x-data="{ category: '', visible: '{{$visible}}' }">
        <span class="px-3 m-auto">
            <button class="p-2 ml-auto" :class="{ 'border-b-4 border-gray-600 rounded': visible === 'index' }"
                    @click="visible = 'index'"> Index</button>
            <button class="p-2 ml-auto" :class="{ 'border-b-4 border-gray-600 rounded': visible === 'add' }"
                    @click="visible = 'add'"> Add / Edit</button>
        </span>
        <div x-show="visible === 'index'">
            <div class="w-full p-5">
                <input class="w-full p-2 text-center rounded-md bg-blue-100/50" wire:model="query"
                       placeholder="Search">
            </div>
            @forelse ($products as $product)
            <!-- comment -->
            <div>
                <div class="flex justify-between">
                    <div class="p-2">
                        <h2 class="text-2xl">
                            {{ $product->name }}
                        </h2>
                        {{ $product->category->name }}
                    </div>
                    <div class="p-2">
                        <button @click="visible = 'add'" wire:click='edit({{ $product->id }})' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">Edit</button>
                        <button  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-red-700" wire:click='del({{ $product->id }})'>Delete</button>
                    </div>
                </div>
                <div class="p-2 grid gap-2 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                    @forelse($product->photos as $x)
                    <img class="m-auto" src='/storage/photos/{{$x->photo->name }}' />
                    @empty
                    <div>
                        No Images
                    </div>
                    @endforelse
                </div>
                <div class="p-2 flex">
                    <div class="text-3xl p-2 bg-red-300">{{count($product->orders)}}</div> <div class="p-2 text-2xl">Orders</div>
                    <div class="text-3xl p-2 bg-red-300">{{count($product?->fav)}}</div> <div class="p-2 text-2xl">Favs</div>
                </div>

            </div>
            @empty
            <div class="p-5">
                No Product Found
            </div>
            @endforelse
        </div>
        <div x-show="visible === 'add'" class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="flex justify-between md:col-span-1">
                        <div class="w-full px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Add Product</h3>
                            <div wire:click="selectimage(true)"
                                 class="w-full p-5 mt-1 text-sm text-gray-600 shadow cursor-pointer h-72 imupload">
                                @if($productphoto)
                                @forelse($productphoto as $photo)

                                <img src="/{{$photo['dir'].$photo['name']}}"/>
                                @empty
                                <div class="location"> Select Your Image</div>
                                @endforelse
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div>
                            <form
                                @if($edit)
                                wire:submit.prevent="update"
                                @else
                                wire:submit.prevent="create"
                                @endif
                                >
                                <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                                        <x-jet-input-error for="name" class="mt-2" />
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="price" value="{{ __('Price') }}" />
                                        <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="price" autocomplete="price" />
                                        <x-jet-input-error for="price" class="mt-2" />
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="text-sm font-medium text-gray-700 block"
                                               for="category">Category*
                                            <select required="" wire:model="category" pattern="[0-9]"
                                                    title="Please Select Valid Category"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                                    @if ($edit) value="{{ $edit?->category_id }}" @endif>
                                                <option value="" selected hidden>
                                                    Please Select Category
                                                </option>
                                                @forelse ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                                @empty
                                                <option disabled="">
                                                    Please Add Category First
                                                </option>
                                                @endforelse
                                            </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="hidden text-sm font-medium text-gray-700 sm:block"
                                               for="description">Description</label>
                                        <textarea class="block w-full my-1 mt-1 border-gray-300 rounded-md shadow-sm resize-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                                  name="description" rows="6" wire:model="description"></textarea>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-end px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                    <button type="button"
                                            class="inline-flex items-center px-4 py-2 ml-2 mr-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transcategory rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25"
                                            wire:click="resets">Reset</button>
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transcategory rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @livewireScripts
    <script type="text/javascript">
      window.onscroll = function (ev) {
          if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
              window.livewire.emit('load-more');
          }
      };
      window.onload = function (ev) {
          if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
              window.livewire.emit('load-more');
          }
      };
    </script>
</div>
