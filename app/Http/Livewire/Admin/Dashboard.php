<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
  Category,
  Coupon,
  Product,
  ProductAddon,
  Store,
  User,
  Order,
  Page,
  Catchofday,
  Offer,
  deliveryboy
};

class Dashboard extends Component {

  public $categories;
  public $products;
  public $orders;
  public $stores;
  public $users;
  public $coupon;
  public $pages;
  public $catch;
  public $offer;
  public $delivery;

  public function render() {
    $this->categories = Category::all()->count();
    $this->orders = Order::where('ok', 1)->get();
    if ($this->orders) {
      $this->total_orders_amounts = $this->orders->sum('price');
    } else {
      $this->total_orders_amounts = 0;
    }
    $this->coupon = Coupon::all()->count();
    $this->product = Product::all()->count();
    $this->stores = Store::all()->count();
    $this->users = User::all()->count();
    $this->pages = Page::all()->count();
    $this->catch = Catchofday::all()->count();
    $this->offer = Offer::all()->count();
    $this->deliveryboy = deliveryboy::all();
    return view('livewire.admin.dashboard');
  }

}
