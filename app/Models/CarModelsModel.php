<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelsModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';
    protected $fillable = ['car_model_name'];

    // Relationship with CarBrand model
    public function carBrand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CarBrandsModel::class, 'car_brand_id');
    }
}
