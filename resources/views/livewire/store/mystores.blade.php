<div class="w-full mx-auto sm:w-2/5 bg-gray-200 shadow-xl rounded-lg">
    @livewireStyles
    @if($edit)
    <h3>update</h3>
    <form wire:submit.prevent='update'>
        @else
        <h3 class="text-2xl text-gray-600 font-extrabold ml-6 my-4">Create</h5>
            <form wire:submit.prevent='create'>
                @endif
                <div class="px-6 space-y-6  flex flex-col">
                    <input type="text"  placeholder="name" class="rounded-r-lg border-0 shadow-lg border-white" wire:model="name" />
                    <div class='location flex relative'>
                        <input type='text' class='w-full border-0 border-white shadow-lg' placeholder='location'  />                    
                        <button type="button" class="w-36 absolute right-0" onclick='locations()'>
                            <div class="absolute right-0">
                                <svg  class="mylocation right-0 top-3 p-2 h-10" viewBox="0 0 1024 1024" data-aut-id="icon" fill-rule="evenodd"><path class="rui-4K4Y7" d="M640 512c0 70.692-57.308 128-128 128s-128-57.308-128-128c0-70.692 57.308-128 128-128s128 57.308 128 128zM942.933 469.333h-89.6c-17.602-157.359-141.307-281.064-297.136-298.527l-1.531-0.139v-89.6h-85.333v89.6c-157.359 17.602-281.064 141.307-298.527 297.136l-0.139 1.531h-89.6v85.333h89.6c17.602 157.359 141.307 281.064 297.136 298.527l1.531 0.139v89.6h85.333v-89.6c157.359-17.602 281.064-141.307 298.527-297.136l0.139-1.531h89.6zM512 772.267c-143.741 0-260.267-116.525-260.267-260.267s116.525-260.267 260.267-260.267c143.741 0 260.267 116.525 260.267 260.267v0c0 143.741-116.525 260.267-260.267 260.267v0z"></path></svg>
                            </div>
                        </button>
                    </div>
                    <input id='lat' type='text' placeholder="lat" class="rounded-r-lg border-0 shadow-lg " wire:model='lat' />
                    <input id='long' type='text' placeholder="long" class="rounded-r-lg border-0 shadow-lg " wire:model='long' />
                    <div class="flex justify-center flex-row">
                        <input type='checkbox' style="border:2px 2px 2px 2px solid; padding:0.8rem; color:gray; padding-top:1rem;" class="shadow-xl" wire:model='status' />
                        <button class=" mb-4 w-full mx-4 bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white py-1  shadow-lg px-4 border border-gray-600 hover:border-transparent rounded">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
    </form>
    @foreach($stores as $store)
    {{$store->name}}
    {{$store->user->name}}
    {{$store->log}}
    {{$store->lat}}
    <input wire:click="updates({{$store->status}},{{$store->id}})" type='checkbox' @if($store->status) checked @endif />
    <input type="button" value="Delete" name="delete" type="button" wire:click="destroys({{$store->id}})" />
    @endforeach
    @livewireScripts
    <script type="text/javascript">
        function locations() {
            navigator.geolocation.getCurrentPosition(function (position) {
                let lat = position.coords.latitude;
                let long = position.coords.longitude;
                var at = lat.toFixed(4) + "," + long.toFixed(4);
                document.getElementById("lat").value = lat.toFixed(5);
                document.getElementById("lat").dispatchEvent(new Event('input'));
                document.getElementById("long").value = long.toFixed(5);
                document.getElementById("long").dispatchEvent(new Event('input'));
                document.querySelector(".location input").placeholder = "Your Location";
                console.log(at);
            });
        }
    </script>
</div>