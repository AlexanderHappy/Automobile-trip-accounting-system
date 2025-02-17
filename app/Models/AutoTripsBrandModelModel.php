<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoTripsBrandModelModel extends Model
{
    /** @use HasFactory<\Database\Factories\AutoTripsBrandModelModelFactory> */
    use HasFactory;

    protected $table = 'auto_trips_car_brand_car_model';
    protected $fillable = [
        'car_brand_name',
        'car_model_name',
        'created_at',
        'updated_at',
    ];
}
