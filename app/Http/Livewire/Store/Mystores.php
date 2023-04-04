<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Mystores extends Component
{
    public $long;
    public $lat;
    public $status;
    public $stores;
    public $edit;
    public $name;
    public $user;
    

    public function create() {
        $userid = Auth::id();
        if ($this->status) {
            $status = 1;
        } else {
            $status = 0;
        }
        Store::create([
            'name' => $this->name,
            'lat' => $this->lat,
            'log' => $this->long,
            'user_id' => $userid,
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

    public function render()
    {
        $userid = Auth::id();
        $this->stores = User::find($userid)->stores;
        return view('livewire.store.mystores');
    }
}
