<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Photo;

class Photoupload extends Component
{
    public $photo;
    public $name;
    public $alt;

    public function create(){
        $new = Photo::create([
            'name' => $this->name,
            'alt' => $this->alt,
        ]);
        if ($this->photo) {
            $imgx = ($new->id) . str_replace('', "-", $this->name) . '.' . $this->photo->extension();
            $this->photo->storeAs('public/photos/', $imgx);
            Photo::find($new->id)->update(['photo' => $imgx]);
        }
    }
    public function render()
    {
        return view('livewire.admin.photoupload');
    }
}
