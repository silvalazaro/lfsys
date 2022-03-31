<?php

namespace Tests\Feature\Register\Company;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_should_create_()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
