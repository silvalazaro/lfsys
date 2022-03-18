<?php

namespace Tests\Feature\Register\company;

use App\Models\register\Company;
use App\Repositories\Register\CompanyRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class CompanyRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CompanyRepository $repository
     */
    protected $repository;

    public function __construct()
    {
        $repository = new CompanyRepository();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_create_company()
    {
        $company = Company::factory()->make();
        assertFalse(isset($company->id));

        $company = $this->repository->create($company->toArray());
        assertTrue($company->id);

    }
}
