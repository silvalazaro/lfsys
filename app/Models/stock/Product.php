<?php

namespace App\Models\stock;

use App\Models\register\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents a Product
 * 
 * @property mixed aliquot_fcp
 * @property mixed aliquot_icss
 * @property mixed barcode
 * @property mixed barcode_cashier
 * @property mixed barcode_local
 * @property mixed barcode_taxed
 * @property mixed brand
 * @property mixed brand_id
 * @property mixed cod_tax_ipi
 * @property mixed cod_tax_pis
 * @property mixed company_id
 * @property mixed cost_average
 * @property mixed cost_last
 * @property mixed created_at
 * @property mixed cson
 * @property mixed date_last_purchase
 * @property mixed date_last_sale
 * @property mixed deleted_at
 * @property mixed description
 * @property mixed field01
 * @property mixed field02
 * @property mixed field03
 * @property mixed field04
 * @property mixed field05
 * @property mixed field06
 * @property mixed field07
 * @property mixed field08
 * @property mixed field09
 * @property mixed field10
 * @property mixed group_id
 * @property mixed id
 * @property mixed measure_id
 * @property string name1 Default name
 * @property string name2 Secondary name
 * @property mixed price Salve price
 * @property mixed price_resale Price for resale
 * @property mixed provider_id
 * @property mixed quantity
 * @property mixed quantity_actual
 * @property mixed quantity_max
 * @property mixed quantity_min
 * @property mixed quantity_production
 * @property mixed quantity_purchase
 * @property mixed quantity_reserved
 * @property mixed quantity_sale
 * @property mixed quantity_starting
 * @property mixed updated_a
 */
class Product extends Model
{
    use HasFactory;

    /**
     * Get the Company thay owns the Product
     */
    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
