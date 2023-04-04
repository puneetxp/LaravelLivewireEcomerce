<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

  use HasFactory;

  protected $fillable = ['name', 'description', 'photo', 'category_id', 'price'];
  protected $with = ['photos'];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function photos() {
    return $this->hasMany(ProductPhoto::class);
  }

  public function productprice() {
    return $this->hasMany(StorePrice::class);
  }

  public function orders() {
    return $this->hasMany(OrderDetail::class);
  }

  public function fav() {
    return $this->hasMany(Favourite::class);
  }

  public function scopeFilter($query, array $filters) {
    $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                    $query->where('name', 'like', '%' . $search . '%')
            )
    );
    
    $query->whereHas('productprice', fn($query) =>
            $query
    );
  }

}
