<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model {

  use HasFactory;

  protected $fillable = ['photo_id', 'product_id'];

  protected $with = ['photo'];


  public function photo() {
    return $this->belongsTo(Photo::class);
  }

}
