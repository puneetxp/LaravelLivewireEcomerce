<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\{
  Store,
  Order
};

class Dashboard extends Component {

  public $stores;
  public $orders;

  public function render() {
    $this->stores = Auth::user()->stores;
    return view('livewire.store.dashboard');
  }

}
