<?php

namespace Database\Factories\api;

use App\Models\api\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'balance_brl' => $this->faker->numberBetween(100, 900),
        ];
    }
}
