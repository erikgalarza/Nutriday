<?php

namespace App\Http\Controllers;

use App\Models\Dieta;
use App\Models\Alimento;
use Illuminate\Http\Request;
use App\Models\MedidaAlimento;
use App\Models\CategoriaAlimento;
use App\Http\Requests\UpdateAlimentoRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AlimentoController extends Controller
{
    public function index()
    {
        $alimentos = Alimento::all();
        $categorias = CategoriaAlimento::all();
        $medidas = MedidaAlimento::all();
        return view('admin.alimentos.index', compact('alimentos','categorias','medidas'));
    }

    public function datosDietaGuardar(Request $request)
    {
            // dd($request->get('listaLunes'));
            $lista = $request->get('listaLunes');
            $desayuno = $lista['0'];//tiene uno o varios alimentos
            $almuerzo = $lista['1'];
            $merienda = $lista['2'];
            
            foreach($desayuno as $alimento){
                $alimento_id = $alimento['id'];
                $alimento = Alimento::find($alimento_id);
                $alimento->dias()->attach(1,['horario'=>'desayuno']);//agregamos al dia lunes y especifico el horario
            }
            foreach($almuerzo as $alimento){
                $alimento_id = $alimento['id'];
                $alimento = Alimento::find($alimento_id);
                $alimento->dias()->attach(1,['horario'=>'almuerzo']);//agregamos al dia lunes y especifico el horario
            }
            foreach($merienda as $alimento){
                $alimento_id = $alimento['id'];
                $alimento = Alimento::find($alimento_id);
                $alimento->dias()->attach(1,['horario'=>'merienda']);//agregamos al dia lunes y especifico el horario
            }


            // MARTES 

             return 1;
    }

    public function datosAlimento(Request $request)
    {
        $alimento_id = $request->get('alimento_id');
        $alimento = Alimento::find($alimento_id);
        $imagen = $alimento->imagen->url;
        $coleccion = collect($alimento);
        $coleccion->push($imagen);
        return $coleccion;
    }

    public function alimentosByDieta($dieta_id){
        $dieta = Dieta::find($dieta_id);
        $dias = $dieta->dias();
        $alimentos = $dieta->alimentos()->get();
        dd($alimentos);
        return view('admin.alimentos.alimentosByDieta',compact('dieta','alimentos'));
    }

    public function addAlimentoDieta($dieta_id)
    {
        $alimentos = Alimento::all();
        $dieta = Dieta::find($dieta_id);
        $imc = $dieta->imc;
        return view('admin.alimentos.create',compact('dieta','alimentos','imc'));
    }

    public function agregarAlimento()
    {
        $categorias = CategoriaAlimento::all();
        $medidas = MedidaAlimento::all();
        return view('admin.alimentos.agregarAlimentos',compact('categorias','medidas'));
    }

    function formularioAlimento2(Request $request){
        $dieta = Dieta::find($request->dieta_id);
        $dieta->alimentos()->detach($request->alimento_id_eliminar);
        $alimentos = $dieta->alimentos->all(); //ALIMENTOS PIVOT

        $n = count($alimentos);
        $arreglo = [];
        for ($i = 0; $i <$n; $i++) {
            $cantidadx = $request->selectCantidad[$i];
            $alimento = Alimento::find($request->alimento_id[$i]);
            $totalCarbohidrato = $cantidadx*$alimento->carbohidrato;
            $totalGrasa = $cantidadx*$alimento->grasa;
            $totalProteina = $cantidadx*$alimento->proteina;
            $totalValorCalorico = $cantidadx*$alimento->valor_calorico;
            $coleccion=collect([ //creamos la coleccion con los resultados
                "totalCarbohidrato"=>$totalCarbohidrato,
                "totalGrasa"=>$totalGrasa,
                "totalProteina"=>$totalProteina,
                "totalValorCalorico"=>$totalValorCalorico
            ]);
            $arreglo[$i]=$coleccion;
        }
        return $arreglo;


    }
    function formularioAlimento(Request $request){
        $n = count($request->alimento_id);
        $arreglo = [];
        for ($i = 0; $i <$n; $i++) {
            $cantidadx = $request->selectCantidad[$i];
            $alimento = Alimento::find($request->alimento_id[$i]);
            $totalCarbohidrato = $cantidadx*$alimento->carbohidrato;
            $totalGrasa = $cantidadx*$alimento->grasa;
            $totalProteina = $cantidadx*$alimento->proteina;
            $totalValorCalorico = $cantidadx*$alimento->valor_calorico;
            $coleccion=collect([ //creamos la coleccion con los resultados
                "totalCarbohidrato"=>$totalCarbohidrato,
                "totalGrasa"=>$totalGrasa,
                "totalProteina"=>$totalProteina,
                "totalValorCalorico"=>$totalValorCalorico
            ]);
            $arreglo[$i]=$coleccion;
        }
        return $arreglo;
    }

    public function cargarAlimentos()
    {
        $alimentos = Alimento::all();
        return $alimentos;
    }

    public function retirarAlimentoDieta($dieta_id,$alimento_id){
        $dieta = Dieta::find($dieta_id);
        $dieta->alimentos()->detach($alimento_id);
        $alimentos = $dieta->alimentos->all(); //ALIMENTOS PIVOT

     
    }

    public function eliminarAlimentoDieta($dieta_id, $alimento_id)
    {   
        $dieta = Dieta::find($dieta_id);
        $dieta->alimentos()->detach($alimento_id);
        $alimentosprev = $dieta->alimentos->all();

        $alimentos  = [];
        foreach($alimentosprev as $key => $alimento)
        {
            $alimentoOriginal= Alimento::find($alimento->id);
            $coleccion = collect($alimentoOriginal);
            $coleccion->push($alimentoOriginal->imagen->url);
            $alimentos[$key] = $coleccion;
        }

        return $alimentos;
    }

    public function agregarAlimentoDieta(Request $request)
    {

        $alimento_id = $request->get('term');
        $dieta_id = $request->get('dieta_id');

        $alimento = Alimento::find($alimento_id);
        $dieta = Dieta::find($dieta_id);
         $alimento->dietas()->attach($dieta->id);

        $alimentosprev = $dieta->alimentos->all();
        //foreach de los alimento encontrados 
      
        $alimentos = [];
        foreach($alimentosprev as $key => $alimento)
        {
            $alimentoOriginal= Alimento::find($alimento->id);
            $coleccion = collect($alimentoOriginal);
            $coleccion->push($alimentoOriginal->imagen->url);
            $alimentos[$key] = $coleccion;
        }

        return $alimentos;
    }


    public function create()
    {
        $alimentos = Alimento::all();
       
        return view('admin.alimentos.create', compact('alimentos'));
    }


    public function store(Request $request)
    {
        //validar

        $alimento = Alimento::create([
            "nombre" => $request->nombre,
            "peso" => $request->peso,
            "valor_calorico" => $request->valor_calorico,
            "carbohidrato" => $request->carbohidrato,
            "proteina" => $request->proteina,
            "grasa" => $request->grasa,
            "categoria_id"=>$request->categoria,
            "medida_id"=>$request->medida
        ]);

        if ($request->hasFile('imagen')) {

            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'alimento']);
            // dd($elemento);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $alimento->imagen()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);
        }

      

        return redirect()->route('alimento.index');
    }


    public function show(Alimento $alimento)
    {
    }


    public function edit(Alimento $alimento)
    {
    }


    public function update(Request $request, $id)
    {
        //validar 

      $alimento= Alimento::find($id);
      $alimento->update([
          "nombre"=>$request->nombre,
          "peso"=>$request->peso,
        "valor_calorico"=>$request->valor_calorico,
        "carbohidrato"=>$request->carbohidrato,
        "proteina"=>$request->proteina,
        "grasa"=>$request->grasa,
      ]);

      //si hay imagen significa que quiere cambiarla
      $file = $request->imagen;
      $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'alimento']);
      $public_id = $elemento->getPublicId();
      $url = $elemento->getSecurePath();
if(is_null($alimento->imagen)){
      $alimento->imagen()->create([
          'url'=>$url,
          'public_id'=>$public_id
          ]);
}else{
    $pid = $alimento->imagen->public_id;
    if(isset($pid)){
        Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
        $alimento->imagen()->update([
            'url'=>$url,
            'public_id'=>$public_id
            ]);
            $alimento->imagen()->update([
                'url'=>$url,
                'public_id'=>$public_id
                ]);
          }
    }
    return back();
    }


    public function destroy($id)
    {
        $alimento = Alimento::find($id);
        $imagen_id = $alimento->imagen->id;
        $public_id = $alimento->imagen->public_id;
        Alimento::destroy($imagen_id);//eliminamos el registro de la imagen que depende de la clase alimento
        Alimento::destroy($id); // eliminamos el alimento con sus datos, nombre, etc.
        if(isset($public_id)){
            Cloudinary::destroy($public_id); //eliminamos la imagen del alimento de la nube
        }
        return back();
    }
}
