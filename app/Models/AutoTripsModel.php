<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoTripsModel extends Model
{
    use HasFactory;

    protected $table = 'auto_trips';

    protected $primaryKey = 'id';

    protected $fillable = [
        'car_brand_id',
        'car_model_id',
        'auto_trip_data_id',
        'created_at',
        'updated_at',
    ];
}
