<div class="w-full mx-auto sm:w-2/5 bg-gray-200 shadow-xl rounded-lg">
    @livewireStyles
    <h3 class="text-2xl text-gray-600 font-extrabold ml-6 my-4 text-center p-2">All Stores</h5>
        @foreach($stores as $store)
        <div class="px-5 py-2 text-center">
            {{$store->name}}
            {{$store->user->name}}
            {{$store->log}}
            {{$store->lat}}
            <input wire:click="updates({{$store->status}},{{$store->id}})" type='checkbox' @if($store->status) checked @endif />
            <input type="button" value="Delete" name="delete" type="button" wire:click="destroys({{$store->id}})" />
        </div>
        @endforeach
        @livewireScripts
        <script>
            navigator.geolocation.getCurrentPosition(function (position) {
                let lat = position.coords.latitude;
                let long = position.coords.longitude;
                var at = lat.toFixed(4) + "," + long.toFixed(4);
                document.getElementById("lat").value = lat.toFixed(5);
                document.getElementById("long").value = long.toFixed(5);
                document.querySelector(".location input").placeholder = "Your Location";
                console.log(at);
            });
        </script>
</div>