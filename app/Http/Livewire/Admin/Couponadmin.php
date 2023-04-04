<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
  Coupon,
  Product,
  User,
};
use Illuminate\Support\Str;

class Couponadmin extends Component {

  public $coupons;
  public $products;
  public $name;
  public $users;
  public $user;
  public $product;
  public $value;
  public $percentage;
  public $minimum;

  public function createcoupon() {
    Coupon::create(['name' => $this->name, 'user_id' => $this->user, 'product_id' => $this->product, 'value' => $this->value, 'percentage' => $this->percentage, 'minimum' => $this->minimum]);
  }

  public function toogle(Coupon $coupon, $y) {
    $coupon->status = $y;
    $coupon->update();
  }

  public function render() {
    $this->products = Product::all();
    $this->coupons = Coupon::all();
    $this->users = User::all();
    return view('livewire.admin.couponadmin');
  }

}
