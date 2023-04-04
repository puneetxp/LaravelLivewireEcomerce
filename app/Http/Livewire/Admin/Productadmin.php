<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
  Product,
  Category,
  ProductPhoto,
  Photo
};

class Productadmin extends Component {

  public $selectimage;
  public $products;
  public $name;
  public $category;
  public $image;
  public $price;
  public $productphoto = [];
  public $description;
  public $edit;
  public $categories;
  public $query;
  public $visible = 'index';
  public $perpage = 25;
  protected $listeners = ['selectimage', 'selectphoto', 'visible', 'load-more' => 'loadMore'];

  public function selectphoto($value) {
    $this->productphoto = Photo::find($value);
  }

  public function visible($x) {
    $this->visible = $x;
  }

  public function selectimage($bool) {
    $this->selectimage = $bool;
  }

  public function create() {
    $product = Product::create([
        'name' => $this->name,
        'description' => $this->description,
        'price' => $this->price,
        'category_id' => $this->category,
    ]);
    foreach ($this->productphoto as $x) {
      ProductPhoto::create(['photo_id' => $x->id, 'product_id' => $product->id]);
    }
    $this->reset();
  }

  public function resets() {
    $this->reset();
  }

  public function del($xyz) {
    $product = Product::find($xyz);
    $product->photos()->delete();
    $product->delete();
  }

  public function update() {
    $this->edit->update([
      'name' => $this->name,
      'description' => $this->description,
      'price' => $this->price,
      'category_id' => $this->category,]);
    $this->edit->photos()->delete();
    foreach ($this->productphoto as $x) {
      ProductPhoto::create(['photo_id' => $x->id, 'product_id' => $this->edit->id]);
    }
    $this->reset();
  }

  public function loadMore() {
    $this->perpage += 15;
  }

  public function edit($xyz) {
    $this->reset();
    $this->edit = Product::with('photos.photo')->find($xyz);
    $this->name = $this->edit->name;
    $this->description = $this->edit->description;
    $this->price = $this->edit->price;
    $this->category = $this->edit->category_id;
    $this->productphoto = [];
    if (count($this->edit->photos)) {
      foreach ($this->edit->photos as $x) {
        array_push($this->productphoto, ['name' => $x->photo->name, 'dir' => $x->photo->dir]);
      }
    }
  }

  public function render() {
    $this->categories = Category::all();
    $this->products = Product::latest()->where('name', 'like', '%' . $this->query . '%')->orwhere('description', 'like', '%' . $this->query . '%')->with('photos.photo')->limit($this->perpage)->get()->load(['category']);
    return view('livewire.admin.productadmin');
  }

}
