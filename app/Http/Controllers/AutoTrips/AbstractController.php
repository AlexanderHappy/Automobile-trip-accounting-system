<?php

namespace App\Http\Controllers\AutoTrips;

use App\Repositories\AutoTripBrandModel\AutoTripBrandModelRepository;
use App\Repositories\AutoTripData\AutoTripDataRepositories;
use App\Repositories\AutoTrips\AutoTripsRepositories;
use App\Repositories\CarModels\CarModelsRepository;
use App\Services\AutoTrips\AutoTripsService;
use App\Validators\Requests\AutoTripsValidator;

readonly abstract class AbstractController
{
    abstract function index();
}
