<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Myfav extends Component {

  public $favs;
  public $perpage = 15;

  public function loadmore() {
    $this->perpage += 10;
  }

  public function render() {
    $this->favs = Auth::user()->fav()->limit($this->perpage)->get();
    return view('livewire.user.myfav');
  }

}
