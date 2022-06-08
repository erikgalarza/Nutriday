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
                <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos administrador</h3>
            </div>
            <div class="card-body" style="padding-right:13rem;padding-left:13rem">
                <form method="POST" enctype="multipart/form-data" action="{{route('administrador.registrar')}}" class="forms-sample">
                    @csrf
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="nombre" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Cédula:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="cedula" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese la cédula">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="telefono" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el teléfono">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="email" type="email" class="form-control" id="exampleInputEmail2"
                                placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputPassword2"
                            class="col-sm-2 col-form-label">Contraseña:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px;background-color:#F0F0F0" name="password" type="password" class="form-control"
                                id="exampleInputPassword2" placeholder="Ingrese la contraseña">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Foto del administrador</label>
                        <div class="col-sm-9">
                            <input name="imagen" type="file" class="form-control" id=""
                                >
                        </div>
                    </div>

                    <div class=" mt-5 form-group text-center">
                        <button type="submit" class="btn btn-success mr-2">Guardar</button>
                        <button class="btn btn-light">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
