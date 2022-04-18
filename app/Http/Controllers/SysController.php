<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Http\Request;

/**
 *
 */
abstract class SysController extends Controller
{
    /**
     * Repository for the model
     *
     * @var Repository $rp
     */
    private Repository $repo;

    public function __construct(Repository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Execute an action on the controller.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $this->repo->user = auth()->user();

        return parent::callAction($method, $parameters);
    }

     /**
     * Return options for select
     *
     * @return \Illuminate\Http\Response
     */
    public function optionsForSelect(Request $request)
    {
        return $this->repo->optionsForSelect($request->all());
    }

}
