<?php

namespace App\Services\AutoTrips;

use App\Dto\AutoTrips\DtoDataAutoTripAbstractAutoTrips;
use App\Dto\AutoTrips\DtoIndexAutoTripsAbstractAutoTrips;
use App\Interfaces\InterfaceRepositoriesAutoTrips;

abstract class AbstractAutoTrips
{
    public function __construct(
        private readonly InterfaceRepositoriesAutoTrips $repositoriesAutoTrips
    )
    {
    }

    abstract public function store(DtoDataAutoTripAbstractAutoTrips $autoTripDataDto);
    public function index(): \SplFixedArray
    {
        return $this->repositoriesAutoTrips->index();
    }

    public function read(int $autoTripId): DtoIndexAutoTripsAbstractAutoTrips
    {
        return $this->repositoriesAutoTrips->read($autoTripId);
    }

    public function destroy(int $autoTripId): bool
    {
        return $this->repositoriesAutoTrips->destroy($autoTripId);
    }
}
