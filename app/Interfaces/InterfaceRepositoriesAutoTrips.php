<?php

namespace App\Interfaces;

use App\Dto\AutoTrips\DtoIndexAutoTripsAbstractAutoTrips;
use App\Dto\AutoTrips\DtoStoreAutoTripsAbstractAutoTrips;

interface InterfaceRepositoriesAutoTrips
{
    public function index(): \SplFixedArray;
    public function store(DtoStoreAutoTripsAbstractAutoTrips $autoTripsStoreDto): bool;
    public function read(int $autoTripId): DtoIndexAutoTripsAbstractAutoTrips;
    public function destroy(int $autoTripId): bool;
}
