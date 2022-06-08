<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\DatosAntropometrico;
use App\Http\Requests\StoreDatosAntropometricoRequest;
use App\Http\Requests\UpdateDatosAntropometricoRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DatosAntropometricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function agregarDatosAntropometricos($paciente_id)
    {
        $paciente = Paciente::find($paciente_id);
    //    dd($datosantropometricos);
        return view('admin.paciente.datosAntropometricos',compact('paciente'));
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
     * @param  \App\Http\Requests\StoreDatosAntropometricoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $datosAntropometrico =  DatosAntropometrico::create([
            "altura"=>$request->altura,
            "peso"=>$request->peso,
            "imc"=>$request->imc,
            "masa_muscular"=>$request->masa_muscular,
            "grasa_corporal"=>$request->grasa_corporal,
            "paciente_id"=>$request->paciente_id,
            "osbservaciones"=>$request->observaciones
        ]);

        if ($request->hasFile('imagen')) {
            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'dato_bioquimico']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $datosAntropometrico->imagen()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);
        }

        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function show(DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatosAntropometricoRequest  $request
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatosAntropometricoRequest $request, DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosAntropometrico $datosAntropometrico)
    {
        //
    }
}
