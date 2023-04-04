<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Orderuser extends Component {

  public $orders;

  public function render() {
    $this->orders = Auth::user()->orders->where(['status' => 1]);
    return view('livewire.user.orderuser');
  }

}
