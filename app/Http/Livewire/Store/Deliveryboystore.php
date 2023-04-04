<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\{
  Store,
  deliveryboy
};
use Illuminate\Support\Facades\Auth;

class Deliveryboystore extends Component {

  public $name;
  public $phone;
  public $store;
  public $deliveryboys;
  public $stores;
  public $page;
  public $edit;
  public $perpage = 35;

  public function edit($x) {
    $this->edit = deliveryboy::find($x);
    $this->name = $this->edit->name;
    $this->phone = $this->edit->phone;
    $this->deliveryboys = $this->store->delivery_boys;
  }

  public function resets() {
    $this->edit = '';
    $this->name = '';
    $this->phone = '';
  }

  public function save() {
    deliveryboy::create([
        'store_id' => $this->store->id, 'name' => $this->name, 'phone' => $this->phone]);
    $this->store = Store::find($this->store->id);
  }

  public function update() {
    $this->edit->update([
        'store_id' => $this->store->id, 'name' => $this->name, 'phone' => $this->phone]);
    $this->store = Store::find($this->store->id);
  }

  public function mount(Store $store) {
    $this->store = $store;
  }

  public function del($x) {
    deliveryboy::find($x)->delete();
    $this->store = Store::find($this->store->id);
  }

  public function loadMore() {
    $this->perpage += 15;
  }

  public function render() {
    $this->deliveryboys = $this->store->delivery_boys;
    return view('livewire.store.deliveryboystore');
  }

}
