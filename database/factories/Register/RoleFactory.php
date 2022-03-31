<?php

namespace Database\Factories\Register;

use App\Models\Register\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register\Role>
 */
class RoleFactory extends Factory
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
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }

    /**
     * Define the model's default state for new company.
     *
     * @return array<string, mixed>
     */
    public function default($company_id)
    {
        $admin = $this->create([
            'name' => 'Administrador',
            'description' => 'Acesso liberado para todos os módulos',
            'company_id' => $company_id
        ]);
        Permission::factory()->default($company_id);
        $permissions =  Permission::where('company_id', $company_id)->get();

        $admin->permissions()->sync($permissions->map(fn($e) => $e->id));

    }
}
