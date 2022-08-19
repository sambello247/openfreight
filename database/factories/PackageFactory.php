<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
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
            'shipping_code' => $this->faker->shuffle('2323234-hello-world'),
            'packaging' => $this->faker->name(),
            'declared_value' => $this->faker->numberBetween(0, 1000),
            'qty' => $this->faker->numberBetween(0, 50),
            'weight' => $this->faker->numberBetween(0, 1000),
            'weight_type' => 'lbs',
            'measurement_in' => 'inches',
            'length' => $this->faker->numberBetween(0, 50),
            'width' => $this->faker->numberBetween(0, 50),
            'height' => $this->faker->numberBetween(0, 50),
            
        ];
    }
}
