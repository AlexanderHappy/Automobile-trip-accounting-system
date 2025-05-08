<?php

use App\Http\Controllers\AutoTripsController;
use Illuminate\Support\Facades\Route;

Route::prefix("/auto-trips")->group(function () {
    Route::controller(AutoTripsController::class)->group(function () {
        Route::post("/store/", "store");
        Route::get("/index/", "index");
        Route::get("/read/", "read");
        Route::delete("/destroy/", "destroy");
    });
});
