<?php

namespace Tests\Feature\Register\Permission;

use App\Models\Register\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertNull;

class PermissionDatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_permission()
    {
        $permission = Permission::factory()->make();

        assertNull($permission->id);

        $permission->save();

        assertIsInt($permission->id);
    }
}
