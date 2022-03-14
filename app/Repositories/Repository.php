<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class Repository{
    
    protected User $user;
    protected $modelClass;
    
    public function __construct(User $user, $modelClass)
    {
        $this->user = $user;
        $this->modelClass = $modelClass;        
    }
    
    public function find($id)
    {
        return app($this->modelClass)->where('company_id', $this->user->company_id);
    }

    public function create(array $data):Model{
        $model = new $this->modelClass();
        $model->company_id = $this->user->company_id;
        $model->save();
        $model->fresh();
        return $model;
    }

}