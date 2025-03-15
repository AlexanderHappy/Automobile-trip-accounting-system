<?php

namespace App\Exception\Repositories\AutoTrips;

use Exception;

class NoAutoTripsFoundException extends Exception
{
    public function __construct($message, $code = 204)
    {
        parent::__construct($message, $code);
    }
}
