<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\deliveryboy;

class Deliveryboyadmin extends Component {

    public $deliverybodys;

    public function render() {
        $this->deliverybodys = deliveryboy::all();
        return view('livewire.admin.deliveryboyadmin');
    }

}
