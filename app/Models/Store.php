<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model {

  use HasFactory;

//    protected $with = ['products'];
  protected $fillable = ['name', 'user_id', 'log', 'lat', 'address', 'status'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function products() {
    return $this->hasMany(StorePrice::class);
  }

  public function product() {
    return $this->hasOne(StorePrice::class);
  }

  public function orderitems() {
    return $this->hasMany(OrderDetail::class);
  }

  public function delivery_boys() {
    return $this->hasMany(deliveryboy::class);
  }

}
