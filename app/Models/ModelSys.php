<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method \Illuminate\Database\Eloquent\Builder company(int $company_id)
 */
class ModelSys extends Model
{
    /**
     * The column label for the model.
     *
     * @var string
     */
    protected $label = 'name';

    /**
     * Scope a query to only include mmodels of a company.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $company_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompany($query, int $company_id)
    {
        return $query->where('company_id', $company_id);
    }
}
