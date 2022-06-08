@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Paciente
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar Paciente</li>
        </ol>
    </nav>
</div>
<div class="row ">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class=" mb-5" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos paciente</h3>
            </div>
            <div class="card-body" style="padding-right:13rem;padding-left:13rem">

                <form method="POST" action="{{route('paciente.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px"  name="nombre" type="text" class="form-control" id="exampleInputUsername2"
                                placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Apellido:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="apellido" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el apellido">
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
                            class="col-sm-2 col-form-label">Edad:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="edad" type="number" min="1" max="60" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese la edad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Sexo:</label>
                        <div class="col-sm-10">
                          <select style="border-radius:10px; background-color:#F0F0F0" class="form-control" name="sexo" id="" >
                              <option selected disabled>Seleccione una opción</option>
                              <option value="1">Femenino</option>
                              <option value="2">Masculino</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputEmail2"
                            class="col-sm-2 col-form-label">Tipo diabetes:</label>
                        <div class="col-sm-10">
                          <select style="border-radius:10px; background-color:#F0F0F0" class="form-control" name="tipo_diabetes" id="" >
                              <option selected disabled>Seleccione una opción</option>
                              <option value="1">Tipo 1</option>
                              <option value="2">Tipo 2</option>
                              <option value="3">Gestacional</option>
                          </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputMobile"
                            class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px" name="telefono" type="text" class="form-control" id="exampleInputMobile"
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
                            class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input style="border-radius:10px;background-color:#F0F0F0" name="password" type="password" class="form-control"
                                id="exampleInputPassword2" placeholder="Ingrese la contraseña">
                        </div>
                    </div>

                  <div class="mt-5 form-group text-center" >
                    <button type="submit" class="btn btn-success mr-2">Guardar</button>
                    {{-- <a  data-toggle="modal" data-target="#exampleModal-2" class="btn btn-info">Añadir datos antropométricos</a> --}}
                    <button class="btn btn-light mx-2">Cancelar</button>
                  </div>


                </form>

            </div>
        </div>
    </div>

</div>
@endsection
