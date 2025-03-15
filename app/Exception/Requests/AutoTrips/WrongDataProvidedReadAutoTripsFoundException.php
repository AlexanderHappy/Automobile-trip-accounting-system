<?php

namespace App\Exception\Requests\AutoTrips;

use Exception;

class WrongDataProvidedReadAutoTripsFoundException extends Exception
{
    public function __construct($message, $code = 204)
    {
        parent::__construct($message, $code);
    }
}
