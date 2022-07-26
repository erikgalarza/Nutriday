@extends('client.dashboard')
@section('contenido')
<div class="page-header mb-2">
    <h3 class="page-title">
       Mi perfil
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
        </ol>
    </nav>
</div>


<div class="card ">
    <div class="mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
        <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Información personal</h3>
    </div>
    <div class="row px-3" style="margin-top:10px;">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title text-center" style="text-transform: uppercase; font-weight:bold;font-size: 14px">{{$paciente->nombre}} {{$paciente->apellido}}</h4>
                    <div style="width:100%;height:auto">
                        @if(isset($paciente->imagen))

                        {{-- <img style="max-width:300px;max-height:200px" src="{{$paciente->imagen->url}}"alt="Foto del paciente"> --}}
                        <img style="max-width:300px;max-height:200px" src="{{$paciente->imagen->url}}" alt="profile" />
                        @else
                        <div class="imagencard">
                            <img style="max-width:300px;max-height:200px" src="{{ asset('img/hombre.png') }}">
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-center pb-3">
                    <h4 class="card-title mb-5" style="text-transform: uppercase; font-weight:bold;font-size: 14px" >Datos Paciente</h4>
                    <div class="container" style="max-width: 325px">
                    <div class="col-md-12 col-10 text-left ml-4 p-0">
                            <div class="form-group row mb-1">
                                <label class="col-5 text-left"> <strong>
                                        Nombre:</strong></label>
                                <label class="col-7">{{$paciente->nombre}} {{$paciente->apellido}} </label>

                            </div>
                            <div class="form-group row mb-1">
                                <label
                                    class="col-5 text-left"><strong>Cédula:</strong></label>
                                <label class="col-7">{{$paciente->cedula}}
                                   </label>



                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-5 text-left"><strong>Sexo:</strong></label>
                                @if (  $paciente->sexo ==  1 )
                                    <label class="col-7">Masculino</label>
                                @else
                                    <label class="col-7">Femenino</label>
                                @endif
                            </div>
                            <div class="form-group row mb-1">
                                <label
                                    class="col-5 text-left"><strong>Tipo diabetes:</strong>
                                </label>
                                <label
                                    class="col-7">Tipo {{$paciente->tipo_diabetes}}</label>
                            </div>
                            <div class="form-group row mb-1">
                                <label
                                    class="col-5 text-left"><strong>Teléfono:</strong>
                                </label>
                                <label
                                    class="col-7">{{$paciente->telefono}}</label>
                            </div>

                            <div class="form-group row mb-1">
                                <label
                                    class="col-5 text-left"><strong>Email:</strong></label>
                                <label
                                    class="col-7">{{$paciente->user->email}}</label>
                            </div>
                            <div class="form-group row mb-1">
                                <label
                                    class="col-5 text-left"><strong>Activo desde:</strong></label>
                                <label
                                    class="col-7">{{ date('Y-m-d',strtotime($paciente->user->created_at)) }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
        <div class="col-6 row justify-content-center mb-4">
            <a href="{{route('cliente.editarCuenta')}}" class="btn btn-warning mr-2"><i class="fa-solid fa-user-pen mr-2"></i>Editar datos</a>
            <a href="{{ route('cliente.cuenta') }}" class="btn btn-light ">Cancelar</a>

        </div>
        </div>

    </div>

</div>






@endsection
