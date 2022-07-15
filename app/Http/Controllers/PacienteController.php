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
use App\Mail\EnvioCredenciales;
use App\Models\Admin;
use App\Models\Nutricionista;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $responsables = collect();
        foreach($pacientes as $key => $paciente)
        {
            $user = User::find($paciente->responsable_id);
           $nutri =  $user->nutricionistas()->first();

            if($nutri){$nombre = $nutri->nombre.' '.$nutri->apellido;}else{
                $admin = $user->administradores()->first();
                // dd($admin);
                $nombre = $admin->nombre;
            }

           $responsables->push($nombre);
        }
        // dd($responsables);

        return view('admin.paciente.index',compact('pacientes','responsables'));
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
        // dd($dietas);
        $actividades = $paciente->actividades()->get();
        $duraciones =  $paciente->actividades()->get(['duracion']);
        // $user_id = $paciente->dato_antropometrico()->get(['user_id']);

        $responsablesAntro = collect();
        foreach ($datos as $dato)
        {
            $user = User::find($dato->user_id);
            if($user->nutricionistas){$nombre=$user->nutricionistas->nombre.' '.$user->nutricionistas->apellido;}
            else{$nombre=$user->administradores->nombre;}
            $responsablesAntro->push($nombre);
        }

        $responsablesDieta = collect();
        $fechasFinDieta = collect();
        $fechasFinAsignacion = collect();
        foreach ($dietas as $key => $dieta)
        {
            $user_ids = $paciente->dietas()->get(['user_id']);
            $fechas_fin = $paciente->dietas()->get(['fecha_fin']);
            $fechas_asignacion = $paciente->dietas()->get(['fecha_asignacion']);

            $user_id = $user_ids[$key]->user_id;
            $fecha_fin = $fechas_fin[$key]->fecha_fin;
            $fecha_asignacion = $fechas_asignacion[$key]->fecha_asignacion;

            $user = User::find($user_id);
            if($user->nutricionistas){$nombre=$user->nutricionistas->nombre.' '.$user->nutricionistas->apellido;}
            else{$nombre=$user->administradores->nombre;}
            $responsablesDieta->push($nombre);
            $fechasFinDieta->push($fecha_fin);
            $fechasFinAsignacion->push($fecha_asignacion);
        }

        $estados = $paciente->estados_animo()->get();
        return view('admin.paciente.progreso',compact('datos','dietas','actividades','responsablesAntro','responsablesDieta','fechasFinDieta','fechasFinAsignacion','duraciones','estados','paciente'));
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

        $user_id = $paciente->user->id;
        $user = User::find($user_id);

        $pass=$user->password;
        if($request->password)
            $pass = Hash::make($request->password);

            $user->update([
                "email"=>$request->email,
                "password"=>$pass
            ]);

        $paciente->update([
            "nombre"=>$request->name,
            "apellido"=>$request->apellido,
            // "email"=>$request->email,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            // "edad"=>$request->edad,
            "sexo"=>$request->sexo,
            // "password"=>$pass,
            // "tipo_diabetes"=>$request->tipo_diabetes,
        ]);
        return back();
    }

    public function store(StorePacienteRequest $request)
    {
        $user = User::create([
            "email"=>$request->email,
            "password"=>$request->password,
        ]);

        $paciente = Paciente::create([
            "nombre"=>$request->nombre,
            "telefono"=>$request->telefono,
            "cedula"=>$request->cedula,
            "apellido"=>$request->apellido,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "edad"=>$request->edad,
            "sexo"=>$request->sexo,
            "user_id"=>$user->id,
            "responsable_id"=>Auth::id()
        ]);
        $paciente->assignRole('Paciente');
        $id_paciente = $paciente->id;
       // Mail::to( $email = $user->email)->send(new EnvioCredenciales($paciente->nombre, $user->email,$user->password));//se envian las credenciales al correo del cliente que se registro
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
            "user_id"=>Auth::id(),
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
