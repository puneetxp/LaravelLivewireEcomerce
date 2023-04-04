<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {

  protected $fillable = ['name', 'code', 'user_id', 'value', 'percentage', 'status', 'product_id', 'minimum', 'category_id'];

  use HasFactory;

  public function product() {
    return $this->belongsTo(Product::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

}
