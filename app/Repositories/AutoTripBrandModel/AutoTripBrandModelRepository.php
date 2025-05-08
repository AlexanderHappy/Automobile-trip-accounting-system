<?php

namespace App\Repositories\AutoTripBrandModel;

use App\Dto\AutoTrips\DtoDataAutoTripAbstractAutoTrips;
use App\Dto\CarModels\CarBrandModelNamesDto;
use App\Models\AutoTripDataModel;
use App\Models\AutoTripsBrandModelModel;

readonly class AutoTripBrandModelRepository
{
    public function __construct(
        private AutoTripsBrandModelModel $autoTripBrandModelModel
    )
    {
    }

    public function storeAutoTripBrandModelData(CarBrandModelNamesDto $carBrandModelNameDto, string $createdAt): int
    {
        return $this->autoTripBrandModelModel->insertGetId([
            'car_brand_name' => $carBrandModelNameDto->__get('brand'),
            'car_model_name' => $carBrandModelNameDto->__get('model'),
            'created_at' => $createdAt,
            'updated_at' => now(),
        ]);
    }
}
