<?php

namespace App\Dto\AutoTrips;

use App\Attributes\AutoTripsDto\IsDateTime;
use App\Attributes\AutoTripsDto\IsInteger;
use App\Attributes\AutoTripsDto\IsString;
use App\Attributes\Description;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Validators\Dto\AutoTripsDtoValidator;

readonly class AutoTripsDto extends AbstractAutoTripsDto
{
    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public function __construct(
        #[IsInteger(property: "id", message: "supposed to be integer.")]
        #[Description('Идентификатор поездки')]
        protected int    $id,

        #[IsString(property: "car_brand_name", message: "supposed to be string.")]
        #[Description('Марка автомобиля')]
        protected string $car_brand_name,

        #[IsString(property: "car_model_name", message: "supposed to be string.")]
        #[Description('Модель автомобиля')]
        protected string $car_model_name,

        #[IsInteger(property: "bulk", message: "supposed to be integer.")]
        #[Description('Объем перевозимого груза')]
        protected int    $bulk,

        #[IsInteger(property: "consumption", message: "supposed to be integer.")]
        #[Description('Потребление')]
        protected int    $consumption,

        #[IsInteger(property: "mileage", message: "supposed to be integer.")]
        #[Description('Пробег за рейс')]
        protected int    $mileage,

        #[IsDateTime(property: "created_at", message: "supposed to be datetime.")]
        #[Description('Пробег за рейс')]
        protected string $created_at,
    )
    {
        AutoTripsDtoValidator::validateIsInteger($this, 'id');
        AutoTripsDtoValidator::validateIsString($this, 'car_brand_name', $this->id);
        AutoTripsDtoValidator::validateIsString($this, 'car_model_name', $this->id);
        AutoTripsDtoValidator::validateIsInteger($this, 'bulk', $this->id);
        AutoTripsDtoValidator::validateIsInteger($this, 'consumption', $this->id);
        AutoTripsDtoValidator::validateIsInteger($this, 'mileage', $this->id);
        AutoTripsDtoValidator::validateIsDateTime($this, 'created_at', $this->id);
    }
}
