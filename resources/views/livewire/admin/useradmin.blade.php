<div class="w-full mx-auto ">
  @livewireStyles
  <div class="w-full flex flex-col justify-center text-center shadow-lg bg-gray-200">
    <input class="bg-white  shadow-xl border-0 rounded-lg my-4 w-4/5 px-6 sm:w-1/2  text-center mx-auto p-4" wire:model="query" placeholder="search">
    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>

        @foreach($users as $user)
      <form>
        <tr id="{{$user->id}}}">
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            <button class=" @if($user->role==0) bg-blue-500 @endif " wire:click="updates({{$user->id}}, 0)"> User</button>
            <button class=" @if($user->role==1) bg-blue-500 @endif " wire:click="updates({{$user->id}}, 1)"> Store</button>
            <button class=" @if($user->role==2) bg-blue-500 @endif " wire:click="updates({{$user->id}}, 2)"> Admin</button>
          </td>
          <td>
            <button class=" @if($user->satus==0) bg-blue-500 @endif " wire:click="satus({{$user->id}}, 0)"> Active</button>
            <button class=" @if($user->satus==1) bg-blue-500 @endif " wire:click="satus({{$user->id}}, 1)"> Block</button>
          </td>
        </tr>
      </form>
      @endforeach
      </tbody>
    </table>
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
</div>