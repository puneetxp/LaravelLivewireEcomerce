<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\{
  Store,
  Product,
  StorePrice
};

class Productstore extends Component {

  public $store;
  public $products;
  public $productsprice;
  public $perpage = 25;
  public $query;
  public $select = '';
  public $price;

  public function mount(Store $store) {
    $this->store = $store;
  }

  public function loadMore() {
    $this->perpage += 15;
  }

  public function save() {
    StorePrice::upsert([
        [
            'store_id' => $this->store->id,
            'product_id' => $this->select,
            'price' => $this->price]],
            ['store_id', 'product_id'], ['price']);
  }

  public function del(StorePrice $storeprice) {
    $storeprice->delete();
    $this->productsprice = $this->store->products;
  }

  public function edit(Product $product) {
    $this->select = $product->id;
  }

  public function render() {
    if ($this->select != '') {
      $this->price = Product::find($this->select)->price;
    }
    $this->productsprice = $this->store->products;
    $this->products = Product::where('name', 'like', '%' . $this->query . '%')->get();
    return view('livewire.store.productstore');
  }

}
