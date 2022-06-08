<?php

namespace App\Http\Controllers;

use App\Models\EstadoAnimo;
use App\Http\Requests\StoreEstadoAnimoRequest;
use App\Http\Requests\UpdateEstadoAnimoRequest;

class EstadoAnimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstadoAnimoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadoAnimoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadoAnimo  $estadoAnimo
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoAnimo $estadoAnimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstadoAnimo  $estadoAnimo
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoAnimo $estadoAnimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstadoAnimoRequest  $request
     * @param  \App\Models\EstadoAnimo  $estadoAnimo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadoAnimoRequest $request, EstadoAnimo $estadoAnimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstadoAnimo  $estadoAnimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoAnimo $estadoAnimo)
    {
        //
    }
}
