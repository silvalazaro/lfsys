<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUfRequest;
use App\Http\Requests\UpdateUfRequest;
use App\Models\Register\Uf;
use Inertia\Inertia;

class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ufs = Uf::all();
        return $ufs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUfRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUfRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function show(Uf $uf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function edit(Uf $uf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUfRequest  $request
     * @param  \App\Models\Register\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUfRequest $request, Uf $uf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uf $uf)
    {
        //
    }

    /**
     * Return options for select
     *
     * @return \Illuminate\Http\Response
     */
    public function optionsForSelect()
    {
        return Uf::orderBy('initials')->select('id', 'initials as label')->get();
    }
}
