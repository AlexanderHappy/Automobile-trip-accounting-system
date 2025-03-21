<?php

use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Exception\Repositories\AutoTrips\NoAutoTripsFoundException;
use App\Exception\Requests\AutoTrips\WrongDataProvidedDeleteAutoTripsFoundException;
use App\Exception\Requests\AutoTrips\WrongDataProvidedReadAutoTripsFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/*'
        ]);
        /*$middleware->append(\App\Http\Middleware\AuthenticateOnceWithBasicAuth::class);*/
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {

            /*
             * TODO Перенести все это в отдельный класс.
             * */

            switch (get_class($e)) {
                case (WrongDataProvidedReadAutoTripsFoundException::class):
                case (WrongDataProvidedDeleteAutoTripsFoundException::class):
                case (NoAutoTripsFoundException::class):
                case (WrongTypePropException::class):
                    return response()->json([
                        'message' => $e->getMessage(),
                        'code' => $e->getCode(),
                    ]);
            }
        });
    })->create();
