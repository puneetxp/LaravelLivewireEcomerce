<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
  Order,
  Store,
  deliveryboy,
  OrderDetail
};

class Orderadmin extends Component {

  public $orders;
  public $deliveryboys;
  public $orderitems;

  public function mount() {
    
  }

  public function storechange($orderitem, $storeid) {
    $x =OrderDetail::find($orderitem)->update(['store_id' => $storeid]);
  }

  public function render() {
    $this->deliveryboys = deliveryboy::latest()->get();
    $this->orderitems = OrderDetail::latest()->orderactive()->get();
    $this->store = collect($this->orderitems->groupBy('order_id'));
    $this->stores = Store::all();
    return view('livewire.admin.orderadmin');
  }

}
