<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class Update extends Component {
public $product;
public $number;
    public function uporder() {
        Inventory::CreateOrUpdate(['store_id'=>$user,'store_id'=>''],['stock'=>$this->product->Inventories+$this->number]);
    }

    public function mount($advert) {
        $this->product = $advert;
    }

    public function render() {
        return view('livewire.store.update');
    }

}
