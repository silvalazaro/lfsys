<?php

namespace App\Repositories;

use App\Models\User;

class Repository
{

    protected User $user;

    /**
     * @var \Illuminate\Database\Eloquent\Model
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
    }

    /**
     * Return options for select
     *
     * @return \Illuminate\Http\Response
     */
    public function optionsForSelect(array $params)
    {
        $label = $this->model->label;

        foreach($params as $key => $value){
            $this->query->where($key, $value);
        }

        return $this->query::select($label . ' as label', 'id')->get();
    }

}
