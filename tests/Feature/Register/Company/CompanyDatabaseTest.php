<?php

namespace Tests\Feature\Register\company;

use App\Models\Register\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertTrue;

class CompanyDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.testProductSoftDelete
     *
     * @return void
     */
    public function test_should_create_companys()
    {
        $companies = Company::factory()->count(3)->create();
        assertEquals(3, count($companies));
    }

    /**
     * @depends test_should_create_companys
     */
    public function test_update_a_company()
    {
        $this->seed();
        $company = Company::first();
        $company->corporate_name = 'Corporate Test';
        $company->save();
        $company->fresh();
        assertEquals('Corporate Test', $company->corporate_name);
    }

    public function test_auto_create_role_for_the_company()
    {
        $company = Company::factory()->create();
        assertFalse(empty($company->roles()->count()));
    }

}
