<?php

namespace Database\Factories;

use App\Models\CarBrands;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CarModelsFactory extends Factory
{
    public function definition(): array
    {
        $carBrandIds = CarBrands::pluck('id')->toArray();

        return [
            'car_model_name' => fake()->lastName(),
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
            'car_brand_id' => fake()->randomElement($carBrandIds),
        ];
    }
}
