<?php

namespace App\Validators\Requests;

use App\Exception\Requests\AutoTrips\WrongDataProvidedDeleteAutoTripsFoundException;
use App\Exception\Requests\AutoTrips\WrongDataProvidedReadAutoTripsFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoTripsValidator
{
    /**
     * @throws WrongDataProvidedReadAutoTripsFoundException
     */
    public static function validateRead(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|integer",
        ]);

        if ($validator->fails()) {
            throw new WrongDataProvidedReadAutoTripsFoundException(
                $validator->errors()->first(),
                204
            );
        }
    }
    public static function validateDelete(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|integer",
        ]);

        if ($validator->fails()) {
            throw new WrongDataProvidedDeleteAutoTripsFoundException(
                $validator->errors()->first(),
                204
            );
        }
    }
}
