<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarBrandsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'car_brand_name' => fake()->unique()->firstName(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
