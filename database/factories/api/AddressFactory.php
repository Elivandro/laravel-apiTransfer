<?php

namespace Database\Factories\api;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\api\User;

class AddressFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'street_name' => $this->faker->streetName(),
            'street_number' => $this->faker->numberBetween(10, 900),
            'neighborhood'  => $this->faker->text(),
            'postal_code' => $this->faker->postcode(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'description' => $this->faker->text(),
        ];
    }
}
