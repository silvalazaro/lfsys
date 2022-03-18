<?php

namespace App\Repositories\Register;

use App\Models\register\Company;

class CompanyRepository
{

    /**
     * 
     */
    public function find($id)
    {
        return Company::find($id);
    }

    /**
     * Create register
     * 
     * @param array $data
     * @return Company
     */
    public function create($data)
    {
        return Company::create($data);
    }

}
