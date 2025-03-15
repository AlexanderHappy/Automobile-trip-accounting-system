<?php

namespace Database\Seeders;

use App\Models\CarBrandsModel;
use App\Models\CarModelsModel;
use App\Models\AutoTripsModel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarBrandsModel::factory(5)->create();
        CarModelsModel::factory(5)->create();
        AutoTripsModel::factory(5)->create();
        User::factory(1)->create();
    }
}
