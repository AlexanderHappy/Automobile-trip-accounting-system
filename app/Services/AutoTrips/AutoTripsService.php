<?php

namespace App\Services\AutoTrips;

use App\Dto\AutoTrips\DtoDataAutoTripAbstractAutoTrips;
use App\Dto\AutoTrips\DtoIndexAutoTripsAbstractAutoTrips;
use App\Dto\AutoTrips\DtoStoreAutoTripsAbstractAutoTrips;
use App\Dto\CarModels\CarBrandModelNamesDto;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Interfaces\InterfaceRepositoriesAutoTrips;
use App\Repositories\AutoTripBrandModel\AutoTripBrandModelRepository;
use App\Repositories\AutoTripData\AutoTripDataRepositories;
use App\Repositories\AutoTrips\AutoTripsRepositories;
use App\Repositories\CarModels\CarModelsRepository;

class AutoTripsService extends AbstractAutoTrips
{
    private int $autoTripDataId;
    private CarBrandModelNamesDto $carBrandModelNameDto;
    private int $autoTripId;
    private string $createdAt;

    public function __construct(
        private readonly InterfaceRepositoriesAutoTrips $autoTripsRepository,
        private readonly AutoTripDataRepositories       $autoTripData,
        private readonly CarModelsRepository            $carModelsRepository,
        private readonly AutoTripBrandModelRepository   $autoTripBrandModelRepository,
    )
    {
        parent::__construct($autoTripsRepository);
    }

    public function store(DtoDataAutoTripAbstractAutoTrips $autoTripDataDto): object
    {
        $this->autoTripDataId = $this->autoTripData->storeAutoTripData(
            $autoTripDataDto,
        );
        $this->createdAt = $autoTripDataDto->__get("created_at");
        return $this;
    }

    public function getCarModelsAndBrand(int $car_model_id): object
    {
        $this->carBrandModelNameDto = $this->carModelsRepository->getCarModelsAndBrand($car_model_id);
        return $this;
    }

    public function getAutoTripDataId(string $createdAt): object
    {
        $this->autoTripId = $this->autoTripBrandModelRepository->storeAutoTripBrandModelData(
            $this->carBrandModelNameDto,
            $createdAt
        );
        return $this;
    }

    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public function setAutoTripRecord(): bool
    {
        return $this->autoTripsRepository->store(
            new DtoStoreAutoTripsAbstractAutoTrips(
                $this->carBrandModelNameDto->__get('brandId'),
                $this->carBrandModelNameDto->__get('modelId'),
                $this->autoTripDataId,
                $this->autoTripId,
                $this->createdAt
            )
        );
    }
}
