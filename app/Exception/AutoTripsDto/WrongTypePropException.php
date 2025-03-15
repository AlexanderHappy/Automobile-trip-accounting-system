<?php

namespace App\Exception\AutoTripsDto;

use Exception;

class WrongTypePropException extends Exception
{
    public function __construct(string $message, string $wrongValue, int $rowId, $code = 204)
    {
        parent::__construct($message . " You've send {{$wrongValue}}. Record id: $rowId", $code);
    }
}
