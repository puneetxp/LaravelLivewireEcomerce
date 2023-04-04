<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class Myadd extends Component {

  public $addresses;

  public function del($x) {
    Address::find($x)->delete();
    $this->addresses = Auth::user()->addresses;
  }

  public function render() {
    $this->addresses = Auth::user()->addresses;
    return view('livewire.user.myadd');
  }

}
