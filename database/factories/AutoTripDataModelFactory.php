<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelsAutoTrips\AutoTripDataModel>
 */
class AutoTripDataModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bulk' => fake()->numberBetween(1500, 40000),
            'consumption' => fake()->numberBetween(3000, 6000),
            'mileage' => fake()->numberBetween(10000, 12500),
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ];
    }
}
