<div>
    @livewireStyles
    <div class="flex flex-col justify-around mx-auto w-full sm: bg-gray-200 rounded-lg shadow-xl">
        @if ($edit)
            <h2> Update </h2>
            <form wire:submit.prevent='update({{ $edit->id }})'>
            @else
                <p class="w-full px-4 text-2xl text-gray-600 my-4 font-bold"> Create </p>
                <form wire:submit.prevent="create">
        @endif
        <div class=" flex mx-4 text-gray-600 font-bold ">
            <input wire:model="name" class="p-2 shadow-lg mx-auto  my-2 md:w-1/2 w-full rounded-lg border-0 ">
            @if ($photo)
                <img width="50" src="{{ $photo->temporaryUrl() }}" alt="alt">
            @elseif($edit)
                <img width="50" src="{{ asset('storage/photos/brand/' . $edit?->photo) }}" alt="please upload" />
            @endif
            <input wire:model="photo" type="file" class="w-1/2 flex justify-start mx-4 my-4  " />
        </div>
        <div class="flex justify-start flex-row m-4 ">
            <button type="submit"
                class="px-4 py-1 mx-4 shadow-lg text-center bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white  border border-gray-600 hover:border-transparent rounded">
                Submit
            </button>
        </div>
        </form>
        <div class="flex flex-wrap justify-around content-around ">
            @foreach ($brands as $brand)
                <div class="flex flex-wrap p-5 max-w-md bg-cover"
                    style='background-image: url("{{ asset('storage/photos/brand/' . $brand?->photo) }}") '>
                    <div>
                        <div class="w-full sm:w-auto">{{ $brand->name }}</div>
                    </div>
                    <div class="mx-auto p-2">
                        <button wire:click='edit({{ $brand->id }})'
                            class="shadow-lg text-center bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white px-4 py-1 border border-gray-600 hover:border-transparent rounded">
                            Edit</button><!-- comment -->
                        <button wire:click='del({{ $brand->id }})'
                            class="shadow-lg text-center bg-white hover:bg-gray-600 text-gray-600 font-semibold hover:text-white px-4 py-1 border border-gray-600 hover:border-transparent rounded">
                            Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @livewireScripts
</div>
