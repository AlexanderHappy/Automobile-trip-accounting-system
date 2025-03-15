<?php

namespace App\Attributes\AutoTripsDto;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IsDateTime
{
    public string $message;

    public function __construct(string $property, string $message) {
        $this->message = $property . ' ' . $message;
    }
}
