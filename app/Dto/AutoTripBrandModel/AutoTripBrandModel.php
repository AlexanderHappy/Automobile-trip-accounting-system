<?php

namespace App\Dto\AutoTripBrandModel;

use App\Dto\AbstractDto;

readonly class AutoTripBrandModel extends AbstractDto
{
    public function __construct(
        public string $carBrandName,
        public string $carModelName,
    )
    {
    }
}
