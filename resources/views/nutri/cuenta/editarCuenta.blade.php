@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Editar datos de nutricionista
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
        </ol>
    </nav>
</div>

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card"
            style="display:flex; flex-wrap:wrap; flex-direction:row; justify-content:center; align-items:center; ">

            <form method="POST" action="{{ route('nutricionista.updateCuenta') }}" enctype="multipart/form-data"
                style="display:contents">
                @csrf

                <div class="imagencard">
                    @if (isset($nutricionista->imagen->url))
                        <img style="max-width:300px;" src="{{ $nutricionista->imagen->url }}">
                    @else
                        <img style="max-width:300px;" src="{{ asset('img/icons/Nutricionista.png') }}">
                    @endif
                </div>
                <div class="infopaciente" style="margin-right:10px;">
                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Nombre</label>
                        <input name="nombre" type="text" class="form-control my-3" value="{{ $nutricionista->nombre }}">
                    </div>
                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Apellido</label>
                        <input name="apellido" type="text" class="form-control my-3" value="{{ $nutricionista->apellido }}">
                    </div>
                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Cedula</label>
                        <input name="cedula" type="text" class="form-control my-3" value="{{ $nutricionista->cedula }}">
                    </div>

                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Especialidad</label>
                        <input name="especialidad" type="text" class="form-control my-3" value="{{ $nutricionista->especialidad }}">
                    </div>
             
                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Teléfono</label>
                        <input name="telefono" type="tel" class="form-control my-3" value="{{ $nutricionista->telefono }}">
                    </div>
                    {{-- <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Email</label>
                        <input name="email" type="email" class="form-control my-3" value="{{ $nutricionista->user->email }}" disabled>
                    </div> --}}
                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Contraseña</label>
                        <input name="password" type="password" class="form-control my-3" >
                    </div>
                    <div style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                        <label class="mx-3">Confirmar contraseña</label>
                        <input name="confirm-password" type="password" class="form-control my-3">
                    </div>
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
