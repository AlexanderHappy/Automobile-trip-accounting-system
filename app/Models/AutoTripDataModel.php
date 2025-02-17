<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoTripDataModel extends Model
{
    /** @use HasFactory<\Database\Factories\AutoTripDataModelFactory> */
    use HasFactory;

    protected $table = 'auto_trip_data';
}
