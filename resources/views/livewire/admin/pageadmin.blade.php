<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg max-w-7xl m-auto py-5 my-5">
  @livewireStyles
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
      @forelse ($pages as $page)
      <!-- comment -->
      <div>
        <div class="flex justify-between">
          <div class="p-2">
            <h2 class="text-2xl">
              {{ $page->title }}
            </h2>
            {{ $page->category }}
          </div>
          <div class="p-2">
            <button @click="visible = 'add'"  @click='$wire.edit({{$page->id}}); dq("#page").value= $wire.body' wire:click='edit({{$page->id}})' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">Edit</button>
            <button  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-red-700" @click='$wire.del({{$page->id}})'>Delete</button>
          </div>
        </div>
      </div>
      @empty
      <div class="p-5">
        No Pages Found
      </div>
      @endforelse
    </div>
    <div x-show="visible === 'add'" class="py-6">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div>
              <form
                @if($edit)
                @submit.prevent="visible='index'; $wire.body = dq('#page').value ; $wire.update()"
                @else                
                @submit.prevent="visible='index'; $wire.body = dq('#page').value ; $wire.create()"
                @endif
                >
                <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                  <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <script>
tinymce.init({
  selector: '#page',
  forced_root_block: false,
  height: 600,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
          'forecolor backcolor emoticons | help',
  menu: {
    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
  },
  menubar: 'favs file edit view insert format tools table help',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave();
    });
    editor.on('init', function () {
      editor.setContent(document.getElementById("page").value);
    });
  }
});
                    </script>
                    <textarea id="page" class="w-full rounded-md" placeholder="Body">
                    </textarea>
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
  @livewireScripts
</div>s