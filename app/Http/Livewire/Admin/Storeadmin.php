<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Store;
use App\Models\User;

class Storeadmin extends Component {

    public $log;
    public $lat;
    public $status;
    public $stores;
    public $edit;
    public $name;
    public $user;

    public function create() {
        if ($this->status) {
            $status = 1;
        } else {
            $status = 0;
        }
        Store::create([
            'name' => $this->name,
            'lat' => $this->lat,
            'log' => $this->log,
            'user_id' => $this->user,
            'status' => $status,
        ]);
    }

    public function destroys($xyz) {
        Store::destroy($xyz);
    }

    public function updates($value, $xyz) {
        if ($value == 0) {
            $value = 1;
        } else {
            $value = 0;
        }
        Store::find($xyz)->update(['status' => $value]);
    }

    public function render() {
        $this->stores = Store::all();
        return view('livewire.admin.storeadmin');
    }

}
