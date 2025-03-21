<?php

namespace App\Interfaces;

use App\Dto\AutoTrips\AutoTripsDto;
use App\Dto\AutoTrips\AutoTripsStoreDto;

interface InterfaceRepositoriesAutoTrips
{
    public function index(): \SplFixedArray;
    public function store(AutoTripsStoreDto $autoTripsStoreDto): bool;
    public function read(int $autoTripId): AutoTripsDto;
    public function destroy(int $autoTripId): bool;
}
