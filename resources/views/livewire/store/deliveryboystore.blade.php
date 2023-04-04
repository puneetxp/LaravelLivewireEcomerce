<div class="m-2">
    @livewireStyles
    <div class="py-12" x-data="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0 w-full">
                        @if($edit)
                        <h3 class="text-lg font-medium text-gray-900">Edit Delivery Boy</h3>
                        @else
                        <h3 class="text-lg font-medium text-gray-900">Add Delivery Boy</h3>
                        @endif

                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div>
                        @if($edit)
                        <form wire:submit.prevent="update">
                            @else                        
                            <form wire:submit.prevent="save">
                                @endif
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="hidden sm:block font-medium text-sm text-gray-700" for="name">Name*</label>
                                            <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="hidden sm:block font-medium text-sm text-gray-700" for="phone">Phone*</label>
                                            <input class="border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" class="form-control" wire:model="phone"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                    <button type="reset" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-2 ml-2" wire:click="resets">Reset</button>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Send</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($deliveryboys != null)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg sm:px-4 sm:py-4 p-0">
                <table class=" w-full table-fixed ">
                    <thead>
                        <tr class="text-left table-fixed w-full bg-gray-50">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="w-48 text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deliveryboys as $i)

                        <tr class="text-left">
                            <td class="border px-4 py-2">{{$i->name}}</td>
                            <td class="border px-4 py-2">{{$i->phone}}</td>
                            <td class="border px-4 py-2">{{$i->name}}</td>
                            <td>
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition " wire:click="edit({{ $i->id }})">
                                    Edit
                                </button>
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-red-700" wire:click="del({{ $i->id }})">
                                    Delete
                                </button>
                            </td>
                            @empty
                    <div></div>
                    @endforelse
                    </tbody>
                </table>
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

