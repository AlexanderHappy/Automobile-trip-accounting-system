<?php

namespace App\Dto;

use App\Attributes\Description;
use BadMethodCallException;
use ReflectionClass;
use function Termwind\renderUsing;

readonly class AbstractDto
{
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    public function __set(string $name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return;
        }
        throw new BadMethodCallException("Cannot set property '$name'.");
    }

    public function __call(string $method, array $parameters = [])
    {
        switch ($method) {
            case 'getPropsInArray':
                return $this->getPropsInArray();
            case 'getPropsWithDescriptions':
                return $this->getPropsWithDescriptions();
        }

        throw new BadMethodCallException("Method $method does not exist.");
    }

    protected function getPropsWithDescriptions(): array
    {
        $reflection = new ReflectionClass($this);
        $result = [];
        $descriptions = [];

        foreach ($reflection->getProperties() as $property) {
            $value = $property->getValue($this);
            $description = 'Нет описания';

            $attributes = $property->getAttributes(Description::class);
            if (!empty($attributes)) {
                $description = $attributes[0]->newInstance()->text;
            }

            $result[$property->getName()] = $value;
            $descriptions[$property->getName()] = $description;
        }

        $result['descriptions'] = $descriptions;

        return $result;
    }

    protected function getPropsInArray(): array
    {
        return get_object_vars($this);
    }
}
