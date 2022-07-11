<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'business_name' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'postal' => $this->faker->postcode(),
            'dob' => $this->faker->dateTime(),
            'phone' => $this->faker->phoneNumber(),
            'facebook' => $this->faker->url(),
            'linkedin' => $this->faker->url(),
            'twitter' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'website' => $this->faker->url()
            
            
        ];
    }
}
