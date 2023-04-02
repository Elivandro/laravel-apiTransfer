<?php

namespace Database\Factories\api;

use App\Models\api\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    public function definition()
    {
        return [
            'ddd' => $this->faker->phoneNumber(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
            'user_id' => User::factory(),
        ];
    }
}
