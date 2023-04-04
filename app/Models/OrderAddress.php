<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model {

    protected $fillable = ['name', 'line', 'district', 'state', 'pincode', 'user_id', 'phone', 'alternate', 'email'];

    use HasFactory;
}
