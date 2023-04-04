<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\{
  Store,
  deliveryboy,
  OrderDetail
};
use Illuminate\Support\Facades\Auth;

class Orderstore extends Component {

  public $orders;
  public $deliveryboys;
  public $orderitems;

  public function mount(Store $store) {
    $this->deliveryboys = deliveryboy::where('store_id', $store->id)->get();
    $this->orderitems = OrderDetail::latest()->where('store_id', $store->id)->orderactive()->get();
    $this->store = collect($this->orderitems->groupBy('order_id'));
  }

  public function render() {
    return view('livewire.store.orderstore');
  }

}
