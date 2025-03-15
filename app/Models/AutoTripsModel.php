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

    // Relationship with CarBrand model
    public function carBrand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CarBrandsModel::class, 'car_brand_id');
    }

    // Relationship with CarModel model
    public function carModel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CarModelsModel::class, 'car_model_id');
    }

    // Relationship with AutoTripData model
    public function autoTripData(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AutoTripDataModel::class, 'auto_trip_data_id');
    }
    // Relationship with AutoTripsBrandModel model
    public function autoTripsBrandModel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AutoTripsBrandModelModel::class, 'auto_trip_id');
    }
}
