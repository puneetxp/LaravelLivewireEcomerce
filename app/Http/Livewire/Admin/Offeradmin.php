<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
  Offer,
  Coupon
};
use Livewire\WithFileUploads;

class Offeradmin extends Component {

  use WithFileUploads;

  public $offers;
  public $name;
  public $message;
  public $coupon = '';
  public $coupons;
  public $edit;
  public $click;
  public $image;
  public $imageurl;
  public $ids;

  public function resetoffer() {
    $this->reset();
    $this->imageurl = '';
  }

  public function delimage() {
    $this->edit->update(['photo' => '']);
  }

  public function submitoffer() {
    if ($this->image) {
      $slug = ($this->ids) . str_replace(" ", "-", $this->name) . '.' . $this->image->extension();
      $this->image->storeAs("public/photos/", $slug);
      if ($this->coupon) {
        Offer::create([
          'name' => $this->name,
          'coupon_id' => $this->coupon,
          'photo' => $slug,]);
      } else {
        if (is_null($this->edit)) {
          Offer::create(['name' => $this->name, 'coupon_id' => $this->coupon, 'photo' => $slug,]);
        } else {
          //ddd($this->coupon);
          Offer::upsert([
            'id' => $this->ids,
            'name' => $this->name,
            'coupon_id' => $this->coupon,
            'photo' => $slug,
            ], ['id'], ['name', 'coupon_id', 'photo']);
        }
      }
    } else {
      if ($this->coupon) {
        Offer::create([
          'name' => $this->name,
          'coupon_id' => $this->coupon,]);
      } else {
        if (is_null($this->edit)) {
          Offer::create(['name' => $this->name,]);
        } else {
          //ddd($this->coupon);
          Offer::upsert([
            'id' => $this->ids,
            'name' => $this->name,
            'coupon_id' => $this->coupon,
            ], 'id', ['name', 'coupon_id']);
        }
      }
    }
    $this->reset();
  }

  public function checkedit($click) {
    $this->reset();
    $this->ids = $click;
    $edit = Offer::where("id", $click)->get();
    $this->edit = $edit[0];
    $this->name = $edit[0]->name;
    $this->coupon = $edit[0]->coupon_id;
    //dd($edit[0]->photo);
    if ($edit[0]->photo) {
      $this->imageurl = $edit[0]->photo;
    }
  }

  public function deleteoffer($click) {
    Offer::destroy($click);
  }

  public function render() {
    $this->offers = Offer::all();
    $this->coupons = Coupon::all();
    return view('livewire.admin.offeradmin');
  }

}
