<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catchofday extends Model {

  protected $fillable = ['name', 'product_id', 'photo'];

  public function product() {
    return $this->belongsTo(Product::class);
  }

  use HasFactory;
}
