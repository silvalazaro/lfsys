<?php

namespace App\Models\Register;

use App\Models\stock\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Represents a Company
 * @author silvalazaro <lazarofdsilva@gmail.com>
 * 
 * @property int id
 * @property mixed activity
 * @property string cnpj
 * @property string corporate_name
 * @property string cpf
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon deleted_at
 * @property \Carbon\Carbon updated_a
 * @property string fantasy_name
 * @property string site
 * 
 */
class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity',
        'cnpj',
        'corporate_name',
        'cpf',
        'fantasy_name',
        'id',
        'site',
        'updated_at',
    ];

    /**
     * Get the company's products.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
