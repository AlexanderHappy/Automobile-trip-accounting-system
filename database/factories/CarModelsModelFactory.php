<?php

namespace Database\Factories;

use App\Models\CarBrandsModel;
use Illuminate\Database\Eloquent\Factories\Factory;


class CarModelsModelFactory extends Factory
{
    public function definition(): array
    {
        $carBrandIds = CarBrandsModel::pluck('id')->toArray();

        return [
            'car_model_name' => fake()->lastName(),
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
            'car_brand_id' => fake()->randomElement($carBrandIds),
        ];
    }
}
