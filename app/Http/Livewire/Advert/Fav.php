<?php

namespace App\Http\Livewire\Advert;

use Livewire\Component;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

class Fav extends Component {

  public $select;
  public $favourite;

  public function mount($select) {
    $this->select = $select;
  }

  public function tooglefav() {
    if ($this->favourite) {
      $this->favourite->delete();
    } else {
      Favourite::create(['user_id' => Auth::id(), 'product_id' => $this->select]);
    }
  }

  public function render() {
    $this->favourite = Favourite::where('product_id', $this->select);
    return view('livewire.advert.fav');
  }

}
