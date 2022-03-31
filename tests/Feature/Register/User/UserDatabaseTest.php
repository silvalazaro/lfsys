<?php

namespace Tests\Feature\Register\User;

use App\Models\Register\Company;
use App\Models\User;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsInt;

class UserDatabaseTest extends TestCase
{
    /**
     * @return void
     */
    public function test_should_create_a_user()
    {
        $user = User::factory()->create();
        assertIsInt($user->id);
    }

     /**
     *
     * @return void
     */
    public function test_user_register_a_company()
    {
        $user = User::factory()->create();
        $user->companiesOwner()->save(Company::factory()->make());
        assertEquals(1, $user->companiesOwner()->count());
    }
}
