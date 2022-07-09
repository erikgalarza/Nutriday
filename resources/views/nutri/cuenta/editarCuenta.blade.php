@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Editar perfil
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
            </ol>
        </nav>
    </div>
    {{-- @foreach ($admins as $admin) --}}
    {{-- <input type="hidden" name="id" id="" value="{{$admin->administradores->id}}"> --}}
    <style>
        @media(max-width:1200px) {
            .imaagen {
                min-width: 420px !important;
                max-width: 420px !important;
                min-height: 400px !important;
                max-height: 400px !important;
            }
        }
    </style>
    <div class="card">
        <div class=" mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Mi
                perfil</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('nutricionista.updateCuenta') }}" enctype="multipart/form-data"
                style="display:contents">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 mb-4 mb-xl-0 row justify-content-center align-items-center">
                            @if (isset($nutricionista->imagen))
                                <img class="img-thumbnail imaagen" src="{{ $nutricionista->imagen->url }}">
                            @else
                                <img class="img-thumbnail imaagen" src="{{ asset('img/icons/Nutricionista.png') }}">
                            @endif
                        </div>
                        <div class="col-xl-7">

                            <div class="container" style="max-width: 450px ">

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px" name="nombre" type="text"
                                            value="{{ $nutricionista->nombre }}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Apellido:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px" name="apellido" type="text"
                                            value="{{ $nutricionista->apellido }}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Cédula:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px" name="cedula" type="text"
                                            value="{{ $nutricionista->cedula }}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Sexo:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="sexo">
                                            <option value="1" {{ $nutricionista->sexo === '1' ? 'selected' : '' }}>
                                                Masculino</option>
                                            <option value="2" {{ $nutricionista->sexo === '2' ? 'selected' : '' }}>
                                                Femenino</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Especialidad:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px" name="especialidad" type="text"
                                            value="{{ $nutricionista->especialidad }}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>


                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Teléfono:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px" name="telefono" type="tel"
                                            value="{{ $nutricionista->telefono }}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>

                                {{-- <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Email:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px" name="email" type="email"
                                            value="{{ $nutricionista->user->email }}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div> --}}

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left ">Contraseña:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px;background-color:#F0F0F0" name="password"
                                            type="password" placeholder="Dejar en blanco si no va a cambiar"
                                            class="form-control" id="exampleInputUsername2">
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left ">Confirmar contraseña:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px;background-color:#F0F0F0" name="confirm-password"
                                            type="password" placeholder="Dejar en blanco si no va a cambiar"
                                            class="form-control" id="exampleInputUsername2">
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                        class="col-sm-4 col-form-label text-left">Nueva imagen:</label>
                                    <div class="col-sm-8">
                                        <input style="border-radius:10px;background-color:#F0F0F0;max-height:45.2px"
                                            name="imagen" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5" style="display:flex; justify-content:center; margin-bottom:10px;">
                    <button type="submit" class="btn btn-success mr-2"><i
                            class="fa-solid fa-floppy-disk mr-2"></i>Guardar
                        cambios</button>

                    <a class="btn btn-light" href="{{ route('admin.cuenta') }}">Cancelar</a>

                </div>
        </div>
        </form>
    </div>



    <script>
        function enviarFormulario() {
            var form = document.getElementById('formularioEditarPerfil');

            password = document.getElementById('password2').value;
            newpassword = document.getElementById('newpassword2').value;

            password = document.getElementById('password').value = password;
            newpassword = document.getElementById('newpassword').value = newpassword;

            form.submit();
        }
    </script>
@endsection
