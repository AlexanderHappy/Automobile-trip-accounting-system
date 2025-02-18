<?php

namespace App\Repositories;

use App\Interfaces\InterfaceRepositoriesAutoTrips;
use App\Models\AutoTripsModel;

class RepositoriesAutoTrips implements InterfaceRepositoriesAutoTrips
{
    public function index(): array
    {
        return AutoTripsModel::get()->toArray();
    }
}
