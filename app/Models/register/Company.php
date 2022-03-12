<?php

namespace App\Models\register;

use App\Models\stock\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Represents a Company
 * 
 * @property mixed activity
 * @property mixed cnpj
 * @property mixed corporate_name
 * @property mixed cpf
 * @property mixed created_at
 * @property mixed deleted_at
 * @property mixed fantasy_name
 * @property mixed id
 * @property mixed site
 * @property mixed updated_a
 */
class Company extends Model
{
    use HasFactory;

    /**
     * Get the company's products.
     */
    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

}
