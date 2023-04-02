<?php

namespace Database\Seeders\api;

use Illuminate\Database\Seeder;
use App\Models\api\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)
            ->hasAddress()
            ->hasPhones(2)
            ->hasWallet()
            ->create();
    }
}
