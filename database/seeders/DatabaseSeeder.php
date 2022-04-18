<?php

namespace Database\Seeders;

use App\Models\Register\City;
use Database\Seeders\Register\CitySeeder;
use Database\Seeders\Register\CompanySeeder;
use Database\Seeders\Register\UfSeeder;
use Database\Seeders\Register\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // CompanySeeder::class,
            // UfSeeder::class,
            // UserSeeder::class,
            CitySeeder::class
        ]);
    }
}
