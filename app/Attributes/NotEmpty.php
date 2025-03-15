<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotEmpty
{
    public string $message;

    public function __construct(string $message) {
        $this->message = $message;
    }
}
