@extends('client.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Mi perfil cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card"
                style="display:flex; flex-wrap:wrap; flex-direction:row; justify-content:center; align-items:center; ">

                <!-- <h4 class="card-title">Mi perfil</h4> -->
                <form method="POST" action="{{ route('cliente.updateCuenta') }}" enctype="multipart/form-data"
                    style="display:contents">
                    @csrf

                    <div class="imagencard">
                        @if (isset($paciente->imagen->url))
                            <img style="max-width:300px;" src="{{$paciente->imagen->url}}">
                        @else
                            <img style="max-width:300px;" src="{{ asset('img/icons/Pacient.png') }}">
                        @endif
                    </div>
                    <div class="infopaciente" style="margin-right:10px;">
                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Nombre</label>
                            <input name="nombre" type="text" class="form-control my-3" value="{{ $paciente->nombre }}">
                        </div>
                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Apellido</label>
                            <input name="apellido" type="text" class="form-control my-3" value="{{ $paciente->apellido }}">
                        </div>
                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Cedula</label>
                            <input name="cedula" type="text" class="form-control my-3" value="{{ $paciente->cedula }}">
                        </div>

                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Edad</label>
                            <input name="edad" type="number" class="form-control my-3" value="{{ $paciente->edad }}">
                        </div>
                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Tipo de diabetes</label>
                            <select class="form-control" name="tipo_diabetes">
                                <option value="1">Tipo 1</option>
                                <option value="2">Tipo 2</option>
                                <option value="3">Gestacional</option>
                            </select>
                        </div>
                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Teléfono</label>
                            <input name="telefono" type="tel" class="form-control my-3" value="{{ $paciente->telefono }}">
                        </div>
                        {{-- <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Email</label>
                            <input name="email" type="email" class="form-control my-3" value="{{ $paciente->user->email }}">
                        </div> --}}
                        <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                            <label class="mx-3">Nueva foto</label>
                            <input name="imagen" type="file" class="form-control my-3">
                        </div>

                        <div style="display:flex; justify-content:center; margin-bottom:10px;">
                            <button type="submit" class="btn btn-success mt-3">Guardar cambios</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
