<?php

namespace App\Services\AutoTrips;

use App\Dto\AutoTrips\AutoTripsDto;
use App\Interfaces\InterfaceRepositoriesAutoTrips;

class AutoTripsService
{
    public function __construct(
        private InterfaceRepositoriesAutoTrips $repositoriesAutoTrips
    )
    {
    }

    public function index(): \SplFixedArray
    {
        return $this->repositoriesAutoTrips->index();
    }

    public function read(int $autoTripId): AutoTripsDto
    {
        return $this->repositoriesAutoTrips->read($autoTripId);
    }

    public function destroy(int $autoTripId): bool
    {
        return $this->repositoriesAutoTrips->destroy($autoTripId);
    }
}
