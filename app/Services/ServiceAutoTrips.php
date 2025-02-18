<?php

namespace App\Services;

use App\Interfaces\InterfaceRepositoriesAutoTrips;

readonly class ServiceAutoTrips
{
    public function __construct(
        private InterfaceRepositoriesAutoTrips $repositoriesAutoTrips
    )
    {
    }

    public function index(): array
    {
        return $this->repositoriesAutoTrips->index();
    }
}
