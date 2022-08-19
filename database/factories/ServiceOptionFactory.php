<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Package;

class ServiceOptionFactory extends Factory
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
            'dropoff_type' => 'Regular Pickup',
            'destination_is' => 'Business',
            'service' =>'Regular Pickup',
            'signature_option' => 'Deliver without signature',
        ];
    }
}
