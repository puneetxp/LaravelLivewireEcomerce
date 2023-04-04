<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;

class Productadonstore extends Component {

  public $product;

  public function mount($product) {
    $this->product = $product;
  }

  public function render() {
    return view('livewire.store.productadonstore');
  }

}
