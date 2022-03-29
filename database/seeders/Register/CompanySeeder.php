<?php

namespace Database\Seeders\Register;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'id' => 1,
            'cnpj' => '98683681000134',
            'corporate_name' => 'Empresa Razão Test',
            'fantasy_name' => 'Empresa Fantasia Test',
            'activity' => 'Comercio e Serviços',
            'site' => 'http://teste.test'
        ]);
    }
}
