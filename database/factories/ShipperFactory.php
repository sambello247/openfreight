<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Package;

class ShipperFactory extends Factory
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
            'package_id' => Package::all()->random()->id,
            'fullname' => $this->faker->name(),
            'company_name' => $this->faker->company(),
            'department' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address_line_1' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal' => $this->faker->postcode(),
            'country' => $this->faker->country(),
        ];
    }
}
