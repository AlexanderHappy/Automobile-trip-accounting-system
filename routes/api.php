<?php

use App\Http\Controllers\AutoTrips\AutoTripsController;
use Illuminate\Support\Facades\Route;

Route::prefix("/auto-trips")->group(function () {
    Route::get("/index/", [AutoTripsController::class, "index"]);
    Route::get("/read/", [AutoTripsController::class, "read"]);
    Route::get("/destroy/", [AutoTripsController::class, "destroy"]);
});
