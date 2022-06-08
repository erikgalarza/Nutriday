<?php

namespace App\Http\Controllers;

use App\Models\CategoriaAlimento;
use App\Http\Requests\StoreCategoriaAlimentoRequest;
use App\Http\Requests\UpdateCategoriaAlimentoRequest;

class CategoriaAlimentoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaAlimento::all();
        return view('admin.categoriaAlimentos.index',compact('categorias'));
    }

    public function create()
    {
        return view('admin.categoriaAlimentos.create');
    }


    public function store(StoreCategoriaAlimentoRequest $request)
    {
        //validacion
        CategoriaAlimento::create([
            "nombre"=>$request->nombre
        ]);
        return redirect()->route('categoriaAlimento.index');
    }

  
    public function show(CategoriaAlimento $categoriaAlimento)
    {
        //
    }

   
    public function edit(CategoriaAlimento $categoriaAlimento)
    {
        //
    }

    public function update(UpdateCategoriaAlimentoRequest $request, $id)
    {
        $categoria= CategoriaAlimento::find($id);
      $categoria->update([
          "nombre"=>$request->nombre,
      ]);
      return back();
    }

    public function destroy($id)
    {
        CategoriaAlimento::destroy($id);
        return back();
    }
}
