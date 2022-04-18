<?php

namespace Database\Seeders\Register;

use App\Models\Register\City;
use App\Models\Register\Uf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/municipios');
        $states = Uf::all()->groupBy('initials');
        foreach ($response->json() as $city) {
            try {
                DB::table('cities')->insert([
                    'name' => $city["nome"],
                    'uf_id' => $states[$city["microrregiao"]["mesorregiao"]["UF"]["sigla"]][0]["id"]
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }

            try {
                DB::table('cities')->insert([
                    'name' => $city["microrregiao"]["nome"],
                    'uf_id' => $states[$city["microrregiao"]["mesorregiao"]["UF"]["sigla"]][0]["id"]
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}
