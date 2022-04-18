<?php

namespace App\Models\Register;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

     /**
     * The column label for the model.
     *
     * @var string
     */
    protected $label = 'name';

    public function getLabel()
    {
        return $this->label;
    }

}
