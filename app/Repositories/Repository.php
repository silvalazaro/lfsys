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
        $label = $this->model->getLabel();
        $query = $this->model->query();

        if(isset($params['label'])){
            $query->where($label, 'like', '%'.$params['label'] . '%');
            unset($params['label']);
        }

        foreach($params as $key => $value){
            $query->where($key, $value);
        }

        return $query->select($label . ' as label', 'id')->get();
    }

}
