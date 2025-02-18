<?php

namespace App\Http\Controllers;

use App\Services\ServiceAutoTrips;
use Illuminate\Http\JsonResponse;

readonly class ControllerAutoTrips
{
    public function __construct(
        private ServiceAutoTrips $serviceAutoTrips
    )
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(
            $this->serviceAutoTrips->index()
        );
    }
}
