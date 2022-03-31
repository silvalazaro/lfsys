<?php

namespace Database\Factories\Register;

use App\Models\Register\Permission;
use App\Models\Register\PermissionEnum;
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
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'company_id' => $this->faker->buildingNumber()
        ];
    }

    /**
     * Define the model's default state for new company.
     *
     * @return array<string, mixed>
     */
    public function default($company_id)
    {
        Permission::insert([
            'name' => PermissionEnum::USER_CREATE,
            'description' => 'Cadastrar usuário',
            'company_id' => $company_id
        ]);
    }
}
