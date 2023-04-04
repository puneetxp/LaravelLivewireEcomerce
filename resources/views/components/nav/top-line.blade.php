<nav class="bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between w-full">
      @can('admin')
      <x-jet-nav-link class="h-8 text-sm" href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
        {{ __('Admin') }}
      </x-jet-nav-link>
      <x-jet-nav-link class="h-8 text-sm" href="{{ route('store.dashboard') }}" :active="request()->routeIs('store.dashboard')">
        {{ __('Store') }}
      </x-jet-nav-link>
      @endcan
      @can('store')
      <x-jet-nav-link class="h-8 text-sm" href="{{ route('store.dashboard') }}" :active="request()->routeIs('store.dashboard')">
        {{ __('Store') }}
      </x-jet-nav-link>
      @endcan
    </div>
  </div>
</nav>