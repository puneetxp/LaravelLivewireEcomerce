<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Payment;

class Paymentadmin extends Component {

    public $payments;
    public $payment;
    public $name;
    public $status;
    public $edit;

    public function create() {
        if ($this->status) {
            $stat = 1;
        } else {
            $stat = 0;
        }
        Payment::create(['name' => $this->name, 'status' => $stat]);
    }

    public function destroys($xyz) {
        Payment::destroy($xyz);
    }

    public function resets() {
                $this->reset();
    }

    public function updates($value, $xyz) {
        if ($value == 0) {
            $value = 1;
        } else {
            $value = 0;
        }
        Payment::find($xyz)->update(['status' => $value]);
    }

    public function render() {
        $this->payments = Payment::all();
        return view('livewire.admin.paymentadmin');
    }

}
