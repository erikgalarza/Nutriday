@extends('admin.dashboard')
@section('contenido')
<div class="page-header mb-2">
    <h3 class="page-title">
       Agregar nutricionista
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar nutricionista</li>
        </ol>
    </nav>
</div>
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class=" mb-4" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos nutricionista</h3>
            </div>

           


            <div class="card-body">
                <div class="col-12 row justify-content-center m-0 ">
                    <div class="col-lg-9 col-12  text-left">
                <form method="POST" action="{{route('nutricionista.store')}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="container p-0"  style="max-width:524px">
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class=" col-xl-3 col-form-label">Nombre:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px"  name="nombre" type="text" class="form-control" id="exampleInputUsername2"
                                placeholder="Ingrese el nombre">
                                   <p class="text-danger font-weight-bold">{{$errors->first('nombre')}}</p>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class=" col-xl-3 col-form-label">Apellido:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px" name="apellido" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el apellido">
                                   <p class="text-danger font-weight-bold">{{$errors->first('apellido')}}</p>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class=" col-xl-3 col-form-label">Cédula:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px" name="cedula" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese la cédula">
                                <p class="text-danger font-weight-bold">{{$errors->first('cedula')}}</p>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class=" col-xl-3 col-form-label">Sexo:</label>
                        <div class=" col-xl-9">
                            <select class="form-control" name="sexo" id="sexo" style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                            <p class="text-danger font-weight-bold">{{$errors->first('sexo')}}</p>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class=" col-xl-3 col-form-label">Especialidad:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px"  name="especialidad" type="text" class="form-control" id="exampleInputUsername2"
                                placeholder="Escriba la especialidad">
                                <p class="text-danger font-weight-bold">{{$errors->first('especialidad')}}</p>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputMobile"
                            class=" col-xl-3 col-form-label">Teléfono:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px" name="telefono" type="text" class="form-control" id="exampleInputMobile"
                                placeholder="Ingrese el teléfono">
                                <p class="text-danger font-weight-bold">{{$errors->first('telefono')}}</p>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class=" col-xl-3 col-form-label">Email:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px" name="correo" type="email" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el correo electrónico">
                                <p class="text-danger font-weight-bold">{{$errors->first('correo')}}</p>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputPassword2"
                            class=" col-xl-3 col-form-label">Contraseña:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px;background-color:#F0F0F0" name="password" type="password" class="form-control"
                                id="exampleInputPassword2" placeholder="Ingrese la contraseña">
                                <p class="text-danger font-weight-bold">{{$errors->first('password')}}</p>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputPassword2"
                            class=" col-xl-3 col-form-label">Imagen:</label>
                        <div class=" col-xl-9">
                            <input style="border-radius:10px" name="imagen" type="file" class="form-control"
                                id="exampleInputPassword2" >
                        </div>
                    </div>

                    <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                        <div class="col-md-8 p-0 col-xl-5 justify-content-space-around">
                            <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar
                            </button>
                            <a class="btn btn-light mb-2 col-sm-12 col-md-5" href="{{route('nutricionista.index')}}">Cancelar</a>
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
