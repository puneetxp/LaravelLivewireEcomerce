<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Myorders extends Component {

  public $orders;
  public $perpage = 15;

  public function loadmore() {
    $this->perpage += 10;
  }

  public function render() {
    $this->orders = Auth::user()->orders()->limit($this->perpage)->get();
    return view('livewire.user.myorders');
  }

}
