<?php

namespace App\Interfaces;

use App\Dto\AutoTrips\AutoTripsDto;

interface InterfaceRepositoriesAutoTrips
{
    public function index(): \SplFixedArray;
    public function read(int $autoTripId): AutoTripsDto;
    public function destroy(int $autoTripId): bool;
}
