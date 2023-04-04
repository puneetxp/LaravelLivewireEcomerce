<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

  protected $fillable = ['name', 'coupon_id', 'photo'];

  public function coupon() {
    return $this->belongsTo(Coupon::class);
  }

  use HasFactory;
}
