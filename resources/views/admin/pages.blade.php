<x-app-layout>
  <div class="text-2xl font-bold flex justify-between"><button class="w-8 h-8" @click="index = 'index'">
    </button><span>Pages</span>
  </div>

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <div x-data="{page:''}">
    <div  class="container sm:pt-8 mx-auto" x-init="await fetch('{{route('admin.page.index')}}').then(response => response.json()).then(data => {items = data; page = data;})" x-data="{
          visible: 'index',
          form : {},
          search: '',
          url:'{{route('admin.page.store')}}',
          items: [],
          reply : {},
          exist : '', 
          get filteredItems() {
          let x = this.items.filter(i => i.title.toLowerCase().indexOf(this.search.toLowerCase()) !== -1);
          //if(x.length>20){ x = x.slice(0,20)}
          return  x;},
          }">
      <button class="ml-auto p-2" :class="{ 'border-b-4 border-gray-600 rounded': visible === 'index' }" @click="visible = 'index'"> Index</button>
      <button class="ml-auto p-2" :class="{ 'border-b-4 border-gray-600 rounded': visible === 'add' }" @click="visible = 'add'"> Add / Edit </button>
      <div>
        <div x-show="visible === 'index'">
          <input x-model="search" class="mt-4 block w-full bg-gray-100 focus:outline-none focus:bg-white focus:shadow text-gray-700 font-bold rounded-lg px-4 py-3" placeholder="Search...">
          <ul>
            <div class="mt-4 grid grid grid-cols gap-4">
              <template x-for="item in filteredItems">
                <button class="col-span-2" @click="form = item;  $refs.page.value = item.body; tinymce.get('page').setContent(item.body); visible = 'add'; url = '{{route('admin.page.index')}}/'+ form.id; visible='add';">
                  <div class="flex justify-between items-center shadow hover:bg-indigo-100 ">
                    <div class="text-sm">
                      <p class="text-gray-900 leading-none text-3xl font-bold" x-text="item.title"></p>
                    </div>
                  </div>
                </button>
              </template>
            </div>
          </ul>
        </div>
        <form class="grid md:gap-6 py-2" x-show="visible === 'add'" @submit.prevent="
              form.body = $refs.page.value;
              form._token ='{{ csrf_token() }}';
              form.id ? (form._method='PATCH') : '';
              items = await fetch('{{route('admin.page.index')}}'+(form.id ? ('/'+form.id) : ''), {method: 'POST',headers:{'Content-Type': 'application/json'},body: JSON.stringify(form)}).then(response => response.json());
              visible = 'index';
              "
              >
          <div class="">
            <div class="mx-auto" >
              <div class="sm:px-5 py-2">
                <x-jet-label for="name" :value="__('Title')" />
                <x-jet-input id='name' x-model='form.title' @keyup="form.slug=form.title.replaceAll(' ','-').toLowerCase()" class="w-full rounded-md " type="text" required  />
              </div>
              <div class="sm:px-5 py-2">
                <x-jet-label for="page_category" :value="__('Active')" />
                <x-jet-input id='page_category' x-model='form.category' class="w-full rounded-md " type="text" required  />
              </div>
              <div class="sm:px-5 py-2 hidden">
                <input x-model='form.slug' class="w-full rounded-md " type="text"  required/>
              </div>
              <div class="sm:px-5 py-2">
                <script>
tinymce.init({
  selector: '#page',
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
                <textarea x-ref="page" id="page" x-model='form.body' @change="" name='body' class="w-full rounded-md " placeholder="body">
                </textarea>
              </div>
              <div class="sm:px-5 sm:py-2">
                <button class="w-full rounded-md bg-gray-200 py-2 hover:bg-white transition-color  " type="submit">
                  Submit
                </button>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-2 mt-5 sm:px-5 py-2">
              <button class=" py-2 w-full bg-red-300 rounded-md hover:bg-red-500" type="button" @click="visible='index'; form = {}; tinymce.get('page').setContent('');">
                Reset
              </button>
              <button class="w-full bg-red-500 p-2 rounded-md hover:bg-red-700 hover:text-white" type="button" 
                      @click="await fetch('{{route('admin.page.store')}}'+'/'+form.id, {
                      method: 'POST',
                      headers: { 'Content-Type': 'application/json' },
                      body: JSON.stringify({_token:'{{ csrf_token() }}',_method:'DELETE'})
                      })
                      .then(response => response.json())
                      .then(data => {
                      visible = 'index';
                      items = data;
                      method ='POST';
                      form={_token:'{{ csrf_token() }}'};
                      img = '';
                      tinymce.get('page').setContent('');
                      })">
                <div class="m-auto h-9 w-9">
                  Delete
                </div>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>