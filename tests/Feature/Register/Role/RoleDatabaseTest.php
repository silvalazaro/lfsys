<?php

namespace Tests\Feature\Register\Role;

use App\Models\Register\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertNull;

class RoleDatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_role()
    {
        $role = Role::factory()->make(['company_id' => 1]);

        assertNull($role->id);

        $role->save();

        assertIsInt($role->id);
    }

    public function test_create_role_and_set_permission(){
        $role = Role::factory()->create(['company_id' => 1]);
        $permissions = Role::factory()->count(3)->create();
        $role->permissions()->sync($permissions->map(fn($e) => $e->id));
    }

}
