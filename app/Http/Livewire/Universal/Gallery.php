<?php

namespace App\Http\Livewire\Universal;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Photo;

class Gallery extends Component {

  use WithFileUploads;

  public $add;
  public $active;
  public $mulitphoto;
  public $all_photos;
  public $name;
  public $alt;
  public $photos = [];

  public function upload() {
    $this->add = (int) !$this->add;
  }

  public function active($xyz) {
    $this->active = $xyz;
  }
  
  public function close() {
    $this->emit('selectimage', false);
    $this->emit('visible', 'add');
  }

  public function select($selected) {
    $this->emit('selectphoto', $selected);
    $this->emit('visible', 'add');
    $this->emit('selectimage', false);
  }

  public function selectmulti($x) {
    if (in_array($x, $this->mulitphoto)) {
      $this->mulitphoto = array_diff($this->mulitphoto, [$x]);
    } else {
      array_push($this->mulitphoto, $x);
    }
  }

  public function mount($select) {
    $this->select = $select;
    If ($select == "multiple") {
      $this->mulitphoto = [];
    }
  }

  public function save() {
    foreach ($this->photos as $photo) {
      $photo->storeAs('public/photos/', $photo->getClientOriginalName());
      Photo::upsert([['name' => $photo->getClientOriginalName(), 'alt' => '', 'dir' => 'storage/photos/']], ['name', 'dir'], ['alt']);
    }
    $this->photos = [];
  }

  public function resetit() {
    $this->photos = [];
  }

  public function destory($id) {

    Photo::destroy($id);
  }

  public function render() {
    $this->all_photos = Photo::all();
    return view('livewire.universal.gallery');
  }

}
