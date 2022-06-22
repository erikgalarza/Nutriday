<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDatosAntropometricoRequest;
use App\Models\User;
use App\Models\Paciente;
use App\Models\EstadoAnimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DatosAntropometrico;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PacienteController extends Controller
{

    public function index()
    {
        // $lastRecordDate = DatosAntropometrico::all()->sortByDesc('created_at')->take(1)->toArray();
        // dd($lastRecordDate);
        // $imcs = DB::table('datos_antropometricos')->select('imc')->latest()->get();
        // $sexos = DB::table('datos_antropometricos')->select('sexo')->latest()->get();
        // $alturas = DB::table('datos_antropometricos')->select('altura')->latest()->get();
        // $pesos = DB::table('datos_antropometricos')->select('peso')->latest()->get();
        // dd($alturas,$sexos,$pesos,$imcs);
        $pacientes = Paciente::all();

        return view('admin.paciente.index',compact('pacientes'));
    }

    public function estadosPaciente($paciente_id){

        $estados = EstadoAnimo::where('paciente_id',$paciente_id)->get();
        $paciente = Paciente::find($paciente_id);
        return view('admin.estados.estadosByPaciente',compact('estados','paciente'));
    }

    public function historialPaciente($paciente_id){
        $paciente = Paciente::find($paciente_id);
        $datos = $paciente->dato_antropometrico()->get();
        $dietas = $paciente->dietas()->get();
        $actividades = $paciente->actividades()->get();
        $duraciones =  $paciente->actividades()->get(['duracion']);
        $estados = $paciente->estados_animo()->get();
        return view('admin.paciente.progreso',compact('datos','dietas','actividades','duraciones','estados','paciente'));
    }


    public function create()
    {
        return view('admin.paciente.create');
    }

    public function eliminarPaciente($id)
    {
        // Paciente::destroy($id);
        $paciente = Paciente::find($id);
        // dd($paciente);
        if($paciente->estado=="activo")
        {
            // dd("1");
            $paciente->update(
                ["estado"=>"inactivo"]
            );
        }else{
            $paciente->update([
                "estado"=>"activo"
            ]);
        }

            return back();
    }

    public function actualizarPaciente(UpdatePacienteRequest $request){
        // dd($request);
        $paciente = Paciente::find($request->idpaciente);
        $pass=$paciente->password;
        if($request->password)
            $pass = Hash::make($request->password);

        $paciente->update([
            "name"=>$request->name,
            "apellido"=>$request->apellido,
            "email"=>$request->email,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "sexo"=>$request->sexo,
            "password"=>$pass,
            // "tipo_diabetes"=>$request->tipo_diabetes,
        ]);
        return back();
    }

    public function store(StorePacienteRequest $request)
    {
        $hashpass = Hash::make($request->password);
        $user = User::create([
            "email"=>$request->email,
            "password"=>$hashpass,
        ]);

        $paciente = Paciente::create([
            "nombre"=>$request->nombre,
            "telefono"=>$request->telefono,
            "cedula"=>$request->cedula,
            "apellido"=>$request->apellido,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "edad"=>$request->edad,
            "sexo"=>$request->sexo,
            "user_id"=>$user->id
        ]);
        $paciente->assignRole('Paciente');
        $id_paciente = $paciente->id;
        return view('admin.paciente.datosAntropometricos',compact('paciente'));
    }

    public function guardarDatosAntropometricos(StoreDatosAntropometricoRequest $request)
    {
        // dd($request);
        $paciente = Paciente::find($request->id_paciente);
        // $datos = DatosAntropometrico::where('paciente_id',$paciente->id)->get();

        $datosAntropometrico =  DatosAntropometrico::create([
            "altura"=>$request->altura,
            "peso"=>$request->peso,
            "imc"=>$request->imc,
            "masa_muscular"=>$request->masa_muscular,
            "grasa_corporal"=>$request->grasa_corporal,
            "paciente_id"=>$request->id_paciente,
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

        return redirect()->route('da.datosByPaciente',$paciente->id);
    }


    public function show(Paciente $paciente)
    {
        //
    }


    public function edit(Paciente $paciente)
    {
        //
    }


    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        //
    }


    public function destroy(Paciente $paciente)
    {
        //
    }
}
