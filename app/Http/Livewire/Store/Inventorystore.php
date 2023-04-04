<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Im;
use Illuminate\Support\Facades\Auth;

class Inventorystore extends Component {

    public $perpage = 30;
    public $inventory;
    public $query;
    public $products;
    public $quantity;
    public $add;
    public $addproduct;
    public $productid;
    public $stock;
    public $stores;
    public $storeproducts;

    public function inventoryadd() {
        $x = Auth::id();
        $y = User::find($x)->stores->first();
        $stock = $this->stock;
        //Im::create(['product_id' => $this->productid, 'store_id' => $y->id, 'stock' => $this->stock]);
        $check = Inventory::where('store_id', $y->id)->orWhere('product_id', $this->productid)?->first();
       if (!empty($check)){
            $stock = $stock +$check->stock;
        }
        Inventory::updateOrInsert(['store_id' => $y->id, 'product_id' => $this->productid],
        ['stock' => $stock]);
    }
    
    public function inventoryupdate($x , $y){
        ddd($y);
    }

    public function render() {
        
        //$this->storeproducts = User::find($x)->storeproducts;
        $this->products = Product::all();
        $x = Auth::id();
        //$y = User::find($x)->stores->first();
        //$z = User::find($x);
        //$this->storeproducts = $z->with(['stores.inventories.product'])->get();
        $y = User::with(['stores.inventories.product.inventories'])->find($x);
        $this->stores = $y->stores;
        //$this->storeproducts = Inventory::find(1)?->with('store.user')->get();
        //dd($this->storeproducts);   
        //$this->inventory = Store::with('inventories.products')->where('id', $usr)->where('name', $serach)->get();
        return view('livewire.store.inventorystore');
    }

}
