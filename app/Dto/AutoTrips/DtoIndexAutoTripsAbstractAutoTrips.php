<?php

namespace App\Dto\AutoTrips;

use App\Attributes\AutoTripsDto\IsDateTime;
use App\Attributes\AutoTripsDto\IsInteger;
use App\Attributes\AutoTripsDto\IsString;
use App\Attributes\Description;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Validators\Dto\AutoTripsDtoValidator;

readonly class DtoIndexAutoTripsAbstractAutoTrips extends DtoAbstractAutoTrips
{
    public function __construct(
        #[Description('Идентификатор поездки')]
        protected int    $id,

        #[Description('Марка автомобиля')]
        protected string $carBrandName,

        #[Description('Модель автомобиля')]
        protected string $carModelName,

        #[Description('Объем перевозимого груза')]
        protected int    $bulk,

        #[Description('Потребление')]
        protected int    $consumption,

        #[Description('Пробег за рейс')]
        protected int    $mileage,

        #[Description('Пробег за рейс')]
        protected string $createdAt,
    )
    {
    }
}
