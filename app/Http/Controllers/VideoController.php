<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Imagen;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Alert;

class VideoController extends Controller
{

    public function index()
    {
        $videos_receta = Video::where('categoria','Recetas')->get();
         $videos_ejercicio = Video::where('categoria','Ejercicios')->get();
          $videos_motivacion = Video::where('categoria','Motivacion')->get();

        return view('admin.videos.index',compact('videos_receta','videos_motivacion','videos_ejercicio'));
    }

    public function verTodos()
    {
        $videos_receta = Video::where('categoria','Recetas')->get();
        $videos_ejercicio = Video::where('categoria','Ejercicios')->get();
         $videos_motivacion = Video::where('categoria','Motivacion')->get();

       return view('admin.videos.index',compact('videos_receta','videos_motivacion','videos_ejercicio'));
    }


    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(StoreVideoRequest $request)
    {
        $recorte = substr($request->url, 32,strlen($request->url));
        $recorte2 = explode('&',$recorte);
        $url = $recorte2[0];
        $video = Video::create([
            "titulo"=>$request->titulo,
            "categoria"=>$request->categoria,
            "descripcion"=>$request->descripcion,
            "url"=>$url
        ]);

        return redirect()->route('video.index');
    }


    public function show(Video $video)
    {
        //
    }


    public function edit(Video $video)
    {
        //
    }

    public function update(UpdateVideoRequest $request , $id)
    {

        $video = Video::find($id);
        $video->update([
            "titulo"=>$request->titulo,
            "categoria"=>$request->categoria,
            "descripcion"=>$request->descripcion,
            "url"=>$request->url
        ]);





    return back();
    }


    public function destroy($id)
    {
        Video::destroy($id); // eliminamos el video con sus datos, titulo, categoria, descripcion, url

        return back();
    }
}
