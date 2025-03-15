<?php

namespace App\Http\Controllers\AutoTrips;

use App\Services\AutoTrips\AutoTripsService;
use App\Validators\Requests\AutoTripsValidator;

readonly abstract class AbstractController
{
    abstract function __construct(
        AutoTripsValidator $autoTripsValidator,
        AutoTripsService   $serviceAutoTrips,
    );
    abstract function index();
}
