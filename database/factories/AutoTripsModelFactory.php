<?php

namespace Database\Factories;


use App\Models\AutoTripsBrandModelModel;
use App\Models\CarBrandsModel;
use App\Models\CarModelsModel;
use App\Models\AutoTripDataModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutoTripsModelFactory extends Factory
{
    public function definition(): array
    {
        $carModel = CarModelsModel::inRandomOrder()->first();
        $autoTripData = AutoTripDataModel::factory()->create();
        $autTripId = AutoTripsBrandModelModel::factory()
            ->create([
                'car_brand_name' => CarBrandsModel::find($carModel->car_brand_id)->car_brand_name,
                'car_model_name' => $carModel->car_model_name
            ])->id;

        return [
            'car_brand_id' => $carModel->car_brand_id,
            'car_model_id' => $carModel->id,
            'auto_trip_data_id' => $autoTripData->id,
            'auto_trip_id' => $autTripId,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
