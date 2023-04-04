<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model {

  protected $fillable = ['user_id', 'product_id'];
  protected $with = ['product'];

  use HasFactory;

  public function product() {
    return $this->belongsTo(Product::class);
  }

}
