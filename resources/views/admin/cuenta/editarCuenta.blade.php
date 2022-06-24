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
    @foreach ($admins as $admin)
    <input type="hidden" name="id" id="" value="{{$admin->administradores->id}}">
            {{-- <form method="POST" id="formularioEditarPerfil" action="{{route('admin.updateCuenta')}}" style="display:hidden;">
                @csrf
                <input name="password" type="hidden" class="form-control my-3" placeholder="Nueva contraseña"
                id="password">
                <input name="confirm-password" class="form-control my-3" type="hidden"
                placeholder="Confirmar nueva contraseña" class="form-control" id="newpassword">
            </form> --}}
            <style>
                @media(max-width:1200px){
                    .imaagen{
                        min-width:410px !important;
                        max-width:410px !important;
                        min-height: 400px !important;
                        max-height: 400px !important;
                    }
                }
            </style>
            <div class="card">
                <div class=" mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
                    <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Mi perfil</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.updateCuenta') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-5 mb-4 mb-xl-0 row justify-content-center align-items-center">
                                        <img class="img-thumbnail imaagen" style="max-width:350px;max-height:350px" src="{{ asset('img/icons/Administrador.png') }}">
                                </div>
                                <div class="col-xl-7">

                                    <div class="container" style="max-width: 420px ">

                                    <div class="form-group row mb-2">
                                        <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                            class="col-sm-4 col-form-label text-left">Nombre:</label>
                                        <div class="col-sm-8">
                                            <input style="border-radius:10px" name="nombre" type="text"
                                                value="{{ $admin->administradores->nombre }}" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                            class="col-sm-4 col-form-label text-left">Cédula:</label>
                                        <div class="col-sm-8">
                                            <input style="border-radius:10px" name="cedula" type="number"
                                                value="{{ $admin->administradores->cedula }}" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                            class="col-sm-4 col-form-label text-left">Teléfono:</label>
                                        <div class="col-sm-8">
                                            <input style="border-radius:10px" name="telefono" type="tel"
                                                value="{{ $admin->administradores->telefono }}" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                            class="col-sm-4 col-form-label text-left">Email:</label>
                                        <div class="col-sm-8">
                                            <input style="border-radius:10px" name="email" type="email"
                                                value="{{ $admin->email }}" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                            class="col-sm-4 col-form-label text-left ">Contraseña:</label>
                                        <div class="col-sm-8">
                                            <input style="border-radius:10px;background-color:#F0F0F0" name="password"
                                                type="text" placeholder="Dejar en blanco si no va a cambiar" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-2">
                                        <label style="font-weight:bold;font-size:11px;" for="exampleInputUsername2"
                                            class="col-sm-4 col-form-label text-left ">Confirmar Contraseña:</label>
                                        <div class="col-sm-8">
                                            <input style="border-radius:10px;background-color:#F0F0F0" name="password"
                                                type="text" placeholder="Dejar en blanco si no va a cambiar" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div> --}}
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
                            <button type="submit" class="btn btn-success mr-2"><i class="fa-solid fa-floppy-disk mr-2"></i>Guardar cambios</button>
                            {{-- <a onclick="enviarFormulario();" class="btn btn-success mr-2">Guardar cambios</a> --}}
                            <a class="btn btn-light" href="{{route('admin.cuenta')}}">Cancelar</a>

                        </div>
                    </div>
                </form>
            </div>


    @endforeach









    {{-- </form> --}}


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
