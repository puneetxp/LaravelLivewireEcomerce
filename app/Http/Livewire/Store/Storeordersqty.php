<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\{
  OrderDetail
};

class Storeordersqty extends Component {

  public $orders;
  public $deliveryboys;
  public $orderitems;
  public $store;

  public function mount($store) {
    $this->store = $store;
    $this->orderitems = OrderDetail::latest()->where('store_id', $store)->orderactive()->get();
    $this->orders = collect($this->orderitems->groupBy('order_id'));
  }

  public function render() {
    return view('livewire.store.storeordersqty');
  }

}
