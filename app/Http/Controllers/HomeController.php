<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMensajeRequest;

class HomeController extends Controller
{
  

   
    public function index()
    {
      
        return view('index');
    }

    public function contactanos()
    {
        return view('contactanos');
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contactar(StoreMensajeRequest $request)
    {
        Mensaje::create([
            "nombres"=>$request->nombres,
            "correo"=>$request->correo,
            "asunto"=>$request->asunto,
            "mensaje"=>$request->mensaje
        ]);
        return back();
    }
}
