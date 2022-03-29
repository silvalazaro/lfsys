<?php

namespace Database\Factories\Register;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'module' => $this->faker->name(),
            'function' => $this->faker->name(),
            'company_id' => $this->faker->buildingNumber()
        ];
    }
}
