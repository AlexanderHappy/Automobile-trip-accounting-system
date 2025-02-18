<?php

use App\Http\Controllers\ControllerAutoTrips;
use Illuminate\Support\Facades\Route;

Route::prefix('/auto')->group(function () {
    Route::get('/trips/index/', [ControllerAutoTrips::class, 'index']);
});
