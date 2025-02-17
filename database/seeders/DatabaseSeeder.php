<?php

namespace Database\Seeders;

use App\Models\AutoTripsModel;
use App\Models\CarBrandsModel;
use App\Models\CarModelsModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarBrandsModel::factory(100)->create();
        CarModelsModel::factory(100)->create();
        AutoTripsModel::factory(100)->create();
    }
}
