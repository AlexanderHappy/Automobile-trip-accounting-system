<?php

namespace App\Repositories\CarModels;

use App\Dto\CarModels\CarBrandModelNamesDto;
use App\Models\CarModelsModel;

readonly class CarModelsRepository
{
    public function __construct(
        private CarModelsModel $carModelsModel
    )
    {
    }

    public function getCarModelsAndBrand(int $carModelId): CarBrandModelNamesDto
    {
        $car =  $this->carModelsModel::where("id", $carModelId)
            ->with('carBrand')
            ->first();

        return new CarBrandModelNamesDto(
            $car->carBrand->id,
            $car->id,
            $car->car_model_name,
            $car->carBrand->car_brand_name,
        );
    }
}
