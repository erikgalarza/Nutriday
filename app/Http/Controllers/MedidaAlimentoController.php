<?php

namespace App\Http\Controllers;

use App\Models\MedidaAlimento;
use App\Http\Requests\StoreMedidaAlimentoRequest;
use App\Http\Requests\UpdateMedidaAlimentoRequest;

class MedidaAlimentoController extends Controller
{
    public function index()
    {
        $medidas = MedidaAlimento::all();
        return view('admin.medidas.index',compact('medidas'));
    }

    public function create()
    {
        return view('admin.medidas.create');
    }

    public function store(StoreMedidaAlimentoRequest $request)
    {
    
        //validaciones
        MedidaAlimento::create($request->all());
        return redirect()->route('medidaAlimento.index');
    }

    public function show(MedidaAlimento $medidaAlimento)
    {
        //
    }

    public function edit(MedidaAlimento $medidaAlimento)
    {
        //
    }

    public function update(UpdateMedidaAlimentoRequest $request, $id)
    {
  
        $medida= MedidaAlimento::find($id);
        $medida->update([
            "medida"=>$request->medida,
        ]);
        return back();
    }
   
    public function destroy($id)
    {
        MedidaAlimento::destroy($id);
        return back();
    }
}
