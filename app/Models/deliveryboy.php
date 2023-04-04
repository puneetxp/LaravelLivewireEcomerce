<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliveryboy extends Model {

    protected $fillable = ['name', 'phone','store_id'];

    use HasFactory;
}
