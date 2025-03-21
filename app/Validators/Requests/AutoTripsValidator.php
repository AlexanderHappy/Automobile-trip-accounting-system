<?php

namespace App\Validators\Requests;

use App\Exception\Requests\AutoTrips\WrongDataProvidedAutoTripsFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoTripsValidator
{
    /**
     * @throws WrongDataProvidedAutoTripsFoundException
     */
    public static function validateRead(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|integer",
        ]);

        if ($validator->fails()) {
            throw new WrongDataProvidedAutoTripsFoundException(
                $validator->errors()->first(),
                204
            );
        }
    }

    /**
     * @throws WrongDataProvidedAutoTripsFoundException
     */
    public static function validateDelete(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|integer",
        ]);

        if ($validator->fails()) {
            throw new WrongDataProvidedAutoTripsFoundException(
                $validator->errors()->first(),
                204
            );
        }
    }

    /**
     * @throws WrongDataProvidedAutoTripsFoundException
     */
    public static function validateStore(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            "car_model_id" => "required|integer",
            "bulk" => "required|integer",
            "consumption" => "required|integer",
            "mileage" => "required|integer",
            "created_at" => "required|date_format:Y-m-d",
        ]);

        if ($validator->fails()) {
            throw new WrongDataProvidedAutoTripsFoundException(
                $validator->errors()->first(),
                204
            );
        }
    }
}
