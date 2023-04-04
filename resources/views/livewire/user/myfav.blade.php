<div class="py-12">
    @livewireStyles
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div  x-data='{add:false}'  class="flex justify-between p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    Your WishList
                </div>
            </div>
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                <div class="mt-2 text-sm text-gray-500">
                    @foreach($favs as $fav)
                    <a href="/{{$fav->product->name}}">
                        <div  class="relative flex flex-wrap justify-center text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:bg-gray-400 hover:text-white">
                            @if(count($fav->product?->photos)>0)
                            <div class="mx-4">
                                <img class='w-20' src="/{{$fav->product?->photos[0]?->photo->dir}}{{$fav->product?->photos[0]?->photo->name}}" :alt="{{$fav->product?->photos[0]?->photo->name}}"/>
                            </div>
                            @endif
                            <div>
                                {{$fav->product->name}}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</div>