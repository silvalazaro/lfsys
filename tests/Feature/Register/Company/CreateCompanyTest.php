<?php

namespace Tests\Feature\register\company;

use App\Models\register\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class CreateCompanyTest extends TestCase
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
}
