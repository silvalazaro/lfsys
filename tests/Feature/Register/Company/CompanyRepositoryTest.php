<?php

namespace Tests\Feature\Register\Company;

use App\Models\register\Company;
use App\Repositories\Register\CompanyRepository;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertTrue;

class CompanyRepositoryTest extends TestCase
{
    private  CompanyRepository $repositoy;

    public function __construct()
    {
        parent::__construct();
        $this->repositoy = new CompanyRepository();
    }

    /**
     * A basic feature test
     *
     * @return void
     */
    public function test_should_create_a_single_company()
    {
        $company = Company::factory()->make();
        assertNull($company->id);

        $company = $this->repositoy->create($company->toArray());
        assertIsInt($company->id);
    }

    /**
     * A basic feature test
     *
     * @return void
     */
    public function test_get_by_id()
    {
        $company = Company::factory()->make();
        $company = $this->repositoy->create($company->toArray());

        $company = $this->repositoy->find($company->id);
        assertIsInt($company->id);
    }

     /**
     * A basic feature test
     *
     * @return void
     */
    public function test_update_company()
    {
        $company = Company::factory()->make();
        $company = $this->repositoy->create($company->toArray());

        $corporate_name = 'Corporate example';
        $id = $company->id;

        $company->corporate_name = $corporate_name;
        $company = $this->repositoy->update($company->toArray());

        
        assertEquals($corporate_name, $company->corporate_name);
        assertEquals($id, $company->id);
    }

}
