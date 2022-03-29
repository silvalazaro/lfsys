<?php

namespace Tests\Feature\Register\company;

use App\Models\Register\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class CompanyDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_create_companys()
    {
        $companies = Company::factory()->count(3)->create();
        assertEquals(3, count($companies));
    }

      /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_a_company()
    {
        $company = Company::limit(1)->first();
        $company->id = 1;
        $company->save();
        assertEquals(1, $company->id);
    }
}
