<?php

namespace App\Dto\AutoTrips;

use App\Attributes\AutoTripsDto\IsDateTime;
use App\Attributes\AutoTripsDto\IsInteger;
use App\Attributes\AutoTripsDto\IsString;
use App\Attributes\Description;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Validators\Dto\AutoTripsDtoValidator;

readonly class DtoStoreAutoTripsAbstractAutoTrips extends DtoAbstractAutoTrips
{
    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public function __construct(
        #[IsInteger(property: "car_brand_id", message: "supposed to be int.")]
        #[Description('Марка автомобиля')]
        protected int $car_brand_id,

        #[IsInteger(property: "car_model_id", message: "supposed to be int.")]
        #[Description('Модель автомобиля')]
        protected int $car_model_id,

        #[IsInteger(property: "auto_trip_data_id", message: "supposed to be integer.")]
        #[Description('Id of trip data from auto_trip_data table')]
        protected int    $auto_trip_data_id,

        #[IsInteger(property: "auto_trip_id", message: "supposed to be integer.")]
        #[Description('Id of trip data from auto_trip_data table')]
        protected int    $auto_trip_id,

        protected string $created_at
    )
    {
        AutoTripsDtoValidator::validateIsInteger($this, 'car_brand_id');
        AutoTripsDtoValidator::validateIsInteger($this, 'car_model_id');
        AutoTripsDtoValidator::validateIsInteger($this, 'auto_trip_data_id');
        AutoTripsDtoValidator::validateIsInteger($this, 'auto_trip_id');
    }
}
