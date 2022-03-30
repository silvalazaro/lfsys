<?php

namespace App\Models\Register;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string module
 * @property string function
 * @property int company_id
 */
class Permission extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany(Role::class);
    }

    public function createDefault($company_id)
    {
        $this->create([
            'name' => 'user:create',
            'description' => 'user',
            'company_id' => $company_id
        ]);
    }
}
