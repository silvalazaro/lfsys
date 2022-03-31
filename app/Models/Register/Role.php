<?php

namespace App\Models\Register;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string guard_name
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at

 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'updated_at'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
