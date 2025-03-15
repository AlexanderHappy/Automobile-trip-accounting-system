<?php

namespace App\Exception\Requests\AutoTrips;

use Exception;

class WrongDataProvidedDeleteAutoTripsFoundException extends Exception
{
    public function __construct($message, $code = 204)
    {
        parent::__construct($message, $code);
    }
}
