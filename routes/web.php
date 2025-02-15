<?php

use Illuminate\Support\Facades\Route;

Route::match(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'], '/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');
