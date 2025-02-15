<?php

namespace Database\Seeders;

use App\Models\CarBrands;
use App\Models\CarModels;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarBrands::factory(100)->create();
        CarModels::factory(100)->create();
    }
}
