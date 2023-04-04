<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
  Catchofday,
  Product
};
use Livewire\WithFileUploads;

class Catchofdayadmin extends Component {

  public $name;
  public $products;
  public $photo;
  public $image;
  public $imageurl;
  public $product = '';

  use WithFileUploads;

  public function delimage() {
    Catchofday::all()->first()->update([
      'photo' => '',
    ]);
    $x = Catchofday::all()->first();
    if ($x) {
      $this->name = $x->name;
      $this->imageurl = $x->photo;
      $this->product = $x->product_id;
    }
  }

  public function update() {
    $x = '';
    if ($this->image) {
      $x = $this->name;
      $x = strtolower(str_replace(' ', '_', $x));
      $this->image->storeAs("public/photos/", $x . '.' . $this->image->getClientOriginalExtension());
      $x = "storage/photos/" . $x . '.' . $this->image->getClientOriginalExtension();
    }
    if (Catchofday::all()->first()) {
      if ($this->image) {
        Catchofday::all()->first()->update([
          'name' => $this->name,
          'product_id' => $this->product,
          'photo' => $x,
        ]);
      } else {
        Catchofday::all()->first()->update([
          'name' => $this->name,
          'product_id' => $this->product,
        ]);
      }
    } else {
      Catchofday::create([
        'name' => $this->name,
        'product_id' => $this->product,
        'photo' => $x,
      ]);
    }

    $x = Catchofday::all()->first();
    if ($x) {
      $this->name = $x->name;
      $this->imageurl = $x->photo;
      $this->product = $x->product_id;
    }
  }

  public function render() {
    $this->products = Product::all();
    $x = Catchofday::all()->first();
    if ($x) {
      $this->name = $x->name;
      $this->imageurl = $x->photo;
      $this->product = $x->product_id;
    }
    return view('livewire.admin.catchofdayadmin');
  }

}
