<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {

  protected $fillable = ['order_id', 'store_id', 'product_id', 'status', 'price', 'qty'];
  protected $with = ['product'];

  public function product() {
    return $this->belongsTo(Product::class);
  }

  public function scopeOrderactive($query) {
    $query->whereHas('order', fn($query) =>
            $query->where('ok', '1')
    );
  }

  public function active() {
    return $this->belongsTo(Order::class)->where('ok', '1');
  }

  public function order() {
    return $this->belongsTo(Order::class);
  }

  use HasFactory;
}
