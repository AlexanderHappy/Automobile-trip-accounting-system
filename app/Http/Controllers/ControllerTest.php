<?php

namespace App\Http\Controllers;

class ControllerTest
{
    public function __invoke()
    {
        return response()->json(["Success!"]);
    }
}
