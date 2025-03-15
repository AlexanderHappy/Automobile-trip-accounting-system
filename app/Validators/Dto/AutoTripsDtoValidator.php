<?php

namespace App\Validators\Dto;

use App\Attributes\AutoTripsDto\IsDateTime;
use App\Attributes\AutoTripsDto\IsInteger;
use App\Attributes\AutoTripsDto\IsString;
use App\Exception\AutoTripsDto\WrongTypePropException;

class AutoTripsDtoValidator
{
    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public static function validateIsString(object $object, string $property, int $id = 0): void
    {
        self::validatePropertyType(
            $id,
            $object,
            $property,
            fn($value) => $value !== "",
            'Property "' . $property . '" is not supposed to be a empty string.'
        );
    }

    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public static function validateIsInteger(object $object, string $property, int $id = 0): void
    {
        self::validatePropertyType(
            $id,
            $object,
            $property,
            fn($value) => is_integer($value),
            'Property "' . $property . '" is supposed to be a Integer.'
        );
    }

    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public static function validateIsDateTime(object $object, string $property, int $id = 0): void
    {
        $pattern = '/^\d{2}.\d{2}.\d{4}$/';;
        self::validatePropertyType(
            $id,
            $object,
            $property,
            fn ($date) =>preg_match($pattern, $date) === 1,
            "Property '" . $property . "' is supposed to be a DateTime. Pattern -> $pattern."
        );
    }

    /**
     * Общий метод для проверки свойства с атрибутом NotEmpty
     *
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    private static function validatePropertyType(
        int $rowId,
        object   $object,
        string   $property,
        callable $isCondition,
        string   $exceptionMessage
    ): void
    {
        $reflection = new \ReflectionProperty($object, $property);

        // Собираем атрибуты для всех указанных типов
        $attributeClasses = [IsInteger::class, IsString::class, IsDateTime::class];

        foreach ($attributeClasses as $attributeClass) {
            $attributes = $reflection->getAttributes($attributeClass);
            if (!empty($attributes)) {
                break;
            }
        }

        if (empty($attributes)) {
            return; // Если атрибута нет, валидация не требуется
        }

        // Извлекаем первый атрибут и его параметры
        $attributeInstance = $attributes[0]->newInstance(); // Создаём экземпляр атрибута
        $customMessage = $exceptionMessage; // Значение по умолчанию

        // Проверяем, какой атрибут был найден, и извлекаем сообщение
        switch ($attributeInstance) {
            case IsInteger::class:
            case IsString::class:
            case IsDateTime::class:
                $customMessage = $attributeInstance->message ?? $exceptionMessage;;
                break;
        }

        $reflection->setAccessible(true); // Делаем свойство доступным, если оно приватное
        $propertyValue = $reflection->getValue($object);

        if (!$isCondition($propertyValue)) {
            throw new WrongTypePropException($customMessage, $propertyValue, $rowId); // Используем сообщение из атрибута
        }
    }
}
