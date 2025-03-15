<?php

namespace App\Providers;

use App\Interfaces\InterfaceRepositoriesAutoTrips;
use App\Repositories\AutoTrips\AutoTripsRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceRepositoriesAutoTrips::class, function ($app) {
            return $app->make(AutoTripsRepositories::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
