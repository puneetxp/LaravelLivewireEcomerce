<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Page;

class Pageadmin extends Component {

  public $pages;
  public $title;
  public $body;
  public $category;
  public $edit;
  public $categories;
  public $query;
  public $visible = 'index';
  public $perpage = 25;

  public function visible($x) {
    $this->visible = $x;
  }

  public function resets() {
    $this->reset();
  }

  public function del($xyz) {
    Page::find($xyz)->delete();
    $this->pages = Page::latest()->where('title', 'like', '%' . $this->query . '%')->orwhere('body', 'like', '%' . $this->query . '%')->limit($this->perpage)->get();
  }

  public function create() {
    $product = Page::create([
                'title' => $this->title,
                'body' => $this->body,
                'slug' => str_replace(' ', '-', $this->title)
    ]);
    $this->reset();
  }

  public function edit($xyz) {
    $this->reset();
    $this->visible = 'add';
    $this->edit = Page::find($xyz);
    $this->title = $this->edit->title;
    $this->body = $this->edit->body;
  }

  public function update() {
    $this->edit->update([
        'title' => $this->title,
        'body' => $this->body,
        'slug' => str_replace(' ', '-', $this->title)]);
    $this->reset();
    $this->pages = Page::latest()->where('title', 'like', '%' . $this->query . '%')->orwhere('body', 'like', '%' . $this->query . '%')->limit($this->perpage)->get();
  }

  public function render() {
    $this->pages = Page::latest()->where('title', 'like', '%' . $this->query . '%')->orwhere('body', 'like', '%' . $this->query . '%')->limit($this->perpage)->get();
    return view('livewire.admin.pageadmin');
  }

}
