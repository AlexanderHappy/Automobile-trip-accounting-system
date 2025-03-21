<?php

namespace App\Validators\Repositories;

use App\Attributes\NotEmpty;
use App\Exception\Repositories\AutoTrips\NoAutoTripsFoundException;

class AutoTripsValidator
{
    /**
     * @throws NoAutoTripsFoundException
     * @throws \ReflectionException
     */
    public static function validate(object $object, string $property): void
    {
        self::validatePropertyNotEmpty(
            $object,
            $property,
            fn($value) => $value->isEmpty(),
            'No auto trips found in the repository.'
        );
    }

    /**
     * @throws NoAutoTripsFoundException
     * @throws \ReflectionException
     */
    public static function validateAutoTripReadDestroy(object $object, string $property, int $autoTripId): void
    {
        self::validatePropertyNotEmpty(
            $object,
            $property,
            fn($value) => is_null($value),
            "No auto trip not found by id: {$autoTripId}"
        );
    }

    /**
     * Общий метод для проверки свойства с атрибутом NotEmpty
     *
     * @throws NoAutoTripsFoundException
     * @throws \ReflectionException
     */
    private static function validatePropertyNotEmpty(
        object   $object,
        string   $property,
        callable $isEmptyCondition,
        string   $exceptionMessage
    ): void
    {
        $reflection = new \ReflectionProperty($object, $property);
        $attributes = $reflection->getAttributes(NotEmpty::class);

        if (empty($attributes)) {
            return; // Если атрибута нет, валидация не требуется
        }

        $reflection->setAccessible(true); // Делаем свойство доступным, если оно приватное
        $propertyValue = $reflection->getValue($object);

        if ($isEmptyCondition($propertyValue)) {
            throw new NoAutoTripsFoundException($exceptionMessage);
        }
        /*if ($isEmptyCondition($propertyValue->autoTripData)) {
            throw new NoAutoTripsFoundException("Related data 'autoTripData' not found for deletion.");
        }

        if ($isEmptyCondition($propertyValue->autoTripsBrandModel)) {
            throw new NoAutoTripsFoundException("Related data 'autoTripsBrandModel' not found for deletion.");
        }*/
    }
}
