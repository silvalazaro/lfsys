<?php

namespace Database\Seeders\Register;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Lázaro Silva',
            'email' => 'lazarofsilva@outlook.com',
            'password' => Hash::make('password'),
        ]);
    }
}
