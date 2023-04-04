<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\OrderDetail;

class Review extends Component {

  public $orderdetail;

  public function mount($orderdetail) {
    $this->orderdetail = OrderDetail::find($orderdetail);
  }

  public function set($x) {
    $this->orderdetail->review = $x;
    $this->orderdetail->update();
  }

  public function render() {
    return view('livewire.product.review');
  }

}
