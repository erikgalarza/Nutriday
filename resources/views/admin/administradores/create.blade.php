@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Agregar administrador
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar administrador</li>
        </ol>
    </nav>
</div>
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class=" mb-5" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">
                    Datos administrador
                </h3>
            </div>
            
            <div class="card-body ">
            <div class="col-12 row justify-content-center m-0">
                <div class="col-md-8 col-xl-9 col-12 text-left">
                    <form method="POST" enctype="multipart/form-data" action="{{route('administrador.registrar')}}" class="forms-sample">
                        @csrf
                        <div class="container"  style="max-width:596px">
                    <div class="form-group row no-gutters">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-xl-2 col-form-label">Nombre:</label>
                        <div class="col-xl-10 ">
                            <input style="border-radius:10px" name="nombre" type="text" class="form-control" id="exampleInputEmail2" value="{{ old('nombre') }}"
                                placeholder="Ingrese el nombre">
                                <p class="text-danger font-weight-bold">{{$errors->first('nombre')}}</p>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-xl-2  col-form-label">Cédula:</label>
                        <div class="col-xl-10 ">
                            <input style="border-radius:10px" name="cedula" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese la cédula">
                                <p class="text-danger font-weight-bold">{{$errors->first('cedula')}}</p>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-xl-2  col-form-label">Teléfono:</label>
                        <div class="col-xl-10 ">
                            <input style="border-radius:10px" name="telefono" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el teléfono">
                                <p class="text-danger font-weight-bold">{{$errors->first('telefono')}}</p>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-xl-2  col-form-label">Email:</label>
                        <div class="col-xl-10 ">
                            <input style="border-radius:10px" name="email" type="email" class="form-control" id="exampleInputEmail2"
                                placeholder="Correo electrónico">
                                <p class="text-danger font-weight-bold">{{$errors->first('email')}}</p>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <label style="font-weight:bold; font-size:11px; text-transform:uppercase" for="exampleInputPassword2"
                            class="col-xl-2   col-form-label">Contraseña:</label>
                        <div class="col-xl-10 ">
                            <input style="border-radius:10px;background-color:#F0F0F0" name="password" type="password" class="form-control"
                                id="exampleInputPassword2" placeholder="Ingrese la contraseña">
                                <p class="text-danger font-weight-bold">{{$errors->first('password')}}</p>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <label for="exampleInputEmail2"style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            class="col-xl-2  col-form-label">Imagen:</label>
                        <div class="col-xl-10 ">
                            <input name="imagen" type="file" class="form-control" id=""
                                >
                        </div>
                    </div>

                    <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                        <div class="col-md-8 col-xl-5 p-0 justify-content-space-around">
                        <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar</button>
                        <a class="btn btn-light mb-2 col-sm-12 col-md-5" href="{{route('administrador.listar')}}">Cancelar</a>
                    </div>
                    </div>
                </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
