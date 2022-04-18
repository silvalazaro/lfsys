<?php

namespace App\Repositories;

use App\Models\User;

class SysRepository
{

    protected User $user;

    /**
     * @var \App\Models\ModelSys
     */
    protected $model;

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    public function __construct(User $user, $model)
    {
        $this->user = $user;
        $this->model = $model;
        $this->query = $model->company($this->user->company_id);
    }

    /**
     * Return options for select
     *
     * @return \Illuminate\Http\Response
     */
    public function optionsForSelect(array $params)
    {
        $label = $this->model->label;
        return $label;

        foreach($params as $key => $value){
            $this->query->where($key, $value);
        }

        return $this->query::select($label . ' as label', 'id as value')->get();
    }

}
