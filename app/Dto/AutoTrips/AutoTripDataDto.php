<?php

namespace App\Dto\AutoTrips;

use App\Attributes\AutoTripsDto\IsDateTime;
use App\Attributes\AutoTripsDto\IsInteger;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Validators\Dto\AutoTripsDtoValidator;

readonly class AutoTripDataDto extends AbstractAutoTripsDto
{
    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public function __construct(
        #[IsInteger(property: "bulk", message: "supposed to be integer.")]
        protected int $bulk,
        #[IsInteger(property: "consumption", message: "supposed to be integer.")]
        protected int $consumption,
        #[IsInteger(property: "mileage", message: "supposed to be integer.")]
        protected int $mileage,
        #[IsDateTime(property: "created_at", message: "supposed to be DateTime.")]
        protected string $created_at,
    )
    {
        AutoTripsDtoValidator::validateIsInteger($this, 'bulk');
        AutoTripsDtoValidator::validateIsInteger($this, 'consumption');
        AutoTripsDtoValidator::validateIsInteger($this, 'mileage');
        AutoTripsDtoValidator::validateIsDateTime($this, 'created_at');
    }
}
