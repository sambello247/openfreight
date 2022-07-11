<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'owner_name' => $this->faker->name(),
            'vehicle_brand' => $this->faker->name(),
            'vehicle_model' => $this->faker->name(),
            'vehicle_image' => $this->faker->imageUrl($width = 640, $height = 480),
            'fuel_type' => $this->faker->name(),
            'plate_number' => $this->faker->name(),
            'plate_expiry' => $this->faker->dateTime(),
            'weight' => $this->faker->name(),
            'mileage' => $this->faker->name(),
            'last_inspection' => $this->faker->dateTime(),
        ];
    }
}
