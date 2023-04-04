<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Categoryadmin extends Component {

  use WithFileUploads;

  public $name;
  public $parent;
  public $category;
  public $message;
  public $categories;
  public $edit;
  public $click;
  public $image;
  public $imageurl;
  public $ids;

  public function resetcategory() {
    $this->reset();
  }

  public function submitcategory() {
    if ($this->image) {
      $slug = ($this->ids) . str_replace(" ", "-", $this->name) . '.' . $this->image->extension();
      $this->image->storeAs("public/photos/category/", $slug);
      if ($this->parent) {

        Category::create([
            'name' => $this->name,
            'category_id' => $this->parent,
            'photo' => $slug,]);
      } else {
        if (is_null($this->edit)) {
          Category::create(['name' => $this->name, 'photo' => $slug,]);
        } else {
          //ddd($this->parent);
          Category::upsert([
              'id' => $this->ids,
              'name' => $this->name,
              'category_id' => $this->parent,
              'photo' => $slug,
                  ], ['id'], ['name', 'category_id', 'photo']);
        }
      }
    } else {
      if ($this->parent) {
        Category::create([
            'name' => $this->name,
            'category_id' => $this->parent,]);
      } else {
        if (is_null($this->edit)) {
          Category::create(['name' => $this->name,]);
        } else {
          //ddd($this->parent);
          Category::upsert([
              'id' => $this->ids,
              'name' => $this->name,
              'category_id' => $this->parent,
                  ], 'id', ['name', 'category_id']);
        }
      }
    }
    $this->reset();
  }

  public function checkedit($click) {
    $this->reset();
    $this->ids = $click;
    $edit = Category::where("id", $click)->get();
    $this->edit = $edit[0];
    $this->name = $edit[0]->name;
    $this->parent = $edit[0]->category_id;
    //dd($edit[0]->photo);
    if ($edit[0]->photo) {
      $this->imageurl = $edit[0]->photo;
    }
  }

  public function deletecategory($click) {
    Category::destroy($click);
  }

  public function render() {
    $this->categories = Category::with('categoryid')->get();
    return view('livewire.admin.categoryadmin');
  }

}
