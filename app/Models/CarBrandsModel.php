<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrandsModel extends Model
{
    use HasFactory;

    protected $table = 'car_brands';
    protected $fillable = ['car_brand_name'];
}
