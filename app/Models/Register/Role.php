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

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function createDefault($company_id)
    {
        return $this->create([
            'name' => 'Administrador',
            'description' => 'Acesso liberado para todos os módulos',
            'company_id', $company_id
        ]);
    }
}
