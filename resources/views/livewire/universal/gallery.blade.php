<div class="p-2 sm:p-4 pt-4">
  @livewireStyles
  <div class="flex justify-between pb-2">
    <div class="w-full text-2xl">
      <span wire:click="close" class="m-2 font-bolder cursor-pointer">&#10094;</span>
      <span class="">
        Select Image
      </span>
    </div>
    <div class="flex">
      @if ($select == 'multiple' && count($mulitphoto) > 0 )
      <div  wire:click="select({{json_encode($mulitphoto)}})" class="flex pl-2 cursor-pointer">
        &check;
      </div>      
      @endif
      @if ($photos)
      <div class="flex pl-2">
        <div>
          <i wire:click="resetit" class="fa-solid px-2 fa-refresh transition-transform cursor-pointer"></i>
        </div>
        <div>
          <i wire:click="save" class="fa-solid px-2 fa-save transition-transform cursor-pointer"></i>
        </div>
      </div>
      @endif
      <div wire:click="upload">
        <i
          class="@if ($add) rotate-180 @endif fa-solid fa-upload transition-transform cursor-pointer"></i>
      </div>
    </div>
  </div>
  @if ($add)
  <div>
    @if ($photos)
    <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach ($photos as $photo)
      <div>
        <div class="h-44">
          <img class="h-full m-auto" src="{{ $photo->temporaryUrl() }}">
        </div>
        <div class="text-center">
          {{$photo->getClientOriginalName()}}
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="w-full h-60 relative sm:p-5 p-2 cursor-pointer">
      <div @click="document.querySelector('#imageupload').click()"
            class="flex flex-wrap justify-center align-baseline w-full h-full border border-red-600">
        <div class="location m-auto">
          <div class="text-center text-xl font-bold">Select Your Image </div>
          <div class="text-center"> Recommend to Upload Sqaure Image</div>
        </div>
      </div>
    </div>
    @endif
    <input id="imageupload" hidden type="file" wire:model="photos" multiple>
    @error('photo')
    <span class="error">{{ $message }}</span>
    @enderror
  </div>
  @endif
  <div class="pt-5">
    <div>
      <input class="w-full p-2 mb-4 text-center bg-blue-100/50 border rounded-lg shadow-lg" wire:model="query"
             placeholder="search">
    </div>

    @if ($select == 'multiple')
    <div>
      <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @forelse($all_photos as $photo)
        <div wire:click="selectmulti({{$photo->id}})" 
             @if(in_array($photo->id, $mulitphoto))
          class="bg-blue-200/40 p-5"
          @endif
          >
          <img src='{{ '/' . $photo['dir'] . $photo['name'] }}' alt="{{ $photo['alt'] }}" />
          <div class="text-center">{{$photo->name}}</div>
        </div>
        @empty
        <div class="flex">
          <x-jet-button class="m-auto" wire:click="upload" type="button">
            {{ __('Please Add Photo First') }}
          </x-jet-button>
        </div>
        @endforelse
      </div>
    </div>
    @else
    <div>
      <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @forelse($all_photos as $photo)
        <div wire:click="select({{$photo->id}})">
          <img src='{{ '/' . $photo['dir'] . $photo['name'] }}' alt="{{ $photo['alt'] }}" />
          <div class="text-center">{{$photo->name}}</div>
        </div>
        @empty
        <div class="flex">
          <x-jet-button class="m-auto" wire:click="upload" type="button">
            {{ __('Please Add Photo First') }}
          </x-jet-button>
        </div>
        @endforelse
      </div>
    </div>
    @endif
  </div>
  @livewireScripts
</div>
