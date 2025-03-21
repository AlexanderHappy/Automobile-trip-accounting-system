<?php

namespace App\Repositories\AutoTripData;

use App\Dto\AutoTrips\AutoTripDataDto;
use App\Models\AutoTripDataModel;

readonly class AutoTripDataRepositories
{
    public function __construct(
        private AutoTripDataModel $autoTripDataModel,
    )
    {
    }

    public function storeAutoTripData(AutoTripDataDto $autoTripDataDto): int
    {
        return $this->autoTripDataModel->insertGetId([
            'bulk' => $autoTripDataDto->__get('bulk'),
            'consumption' => $autoTripDataDto->__get('consumption'),
            'mileage' => $autoTripDataDto->__get('mileage'),
            'created_at' => $autoTripDataDto->__get('created_at'),
            'updated_at' => now(),
        ]);
    }
}
