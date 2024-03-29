<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\api\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
    }
}
