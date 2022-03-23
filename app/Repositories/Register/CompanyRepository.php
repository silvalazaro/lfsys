<?php

namespace App\Repositories\Register;

use App\Models\Register\Company;

/**
 * Handle records
 * 
 */
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
     * Insert a register
     * 
     * @param array $data
     * @return Company
     */
    public function create($data)
    {
        return Company::create($data);
    }

     /**
     * Update a register
     * 
     * @param array $data
     * @return Company
     */
    public function update($data)
    {
        $company = Company::find($data['id']);
        $company->fill($data);
        $company->save();
        return $company;
    }

}
