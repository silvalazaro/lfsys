<?php

namespace Database\Factories\register;

use Illuminate\Database\Eloquent\Factories\Factory;

/** 
 * Represents a Factory's Company
 * 
 * @author silvalazaro <lazarofdsilva@gmail.com>
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\register\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'activity' => $this->faker->company(),
            'cnpj' => $this->faker->md5(),
            'corporate_name' => $this->faker->company(),
            'cpf' => $this->faker->md5(),
            'fantasy_name' => $this->faker->name(),
        ];
    }
}
