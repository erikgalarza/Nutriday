@extends('admin.dashboard')
@section('contenido')
<div class="page-header mb-2">
    <h3 class="page-title">
       Agregar
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar Paciente</li>
        </ol>
    </nav>
</div>
<div class="row ">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class=" mb-4" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
                <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos paciente</h3>
            </div>

            @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="card-body" >

                <div class="col-12 row justify-content-center m-0">
                    <div class="col-md-9 col-12 text-left">


                <form method="POST" action="{{route('paciente.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="container" style="max-width:510px">
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputUsername2"
                            class="col-xl-3  col-form-label">Nombre:</label>
                        <div class="col-xl-9 ">
                            <input style="border-radius:10px"  name="nombre" type="text" class="form-control" id="exampleInputUsername2" value="{{old('nombre')}}"
                                placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Apellido:</label>
                        <div class="col-xl-9 ">
                            <input style="border-radius:10px" name="apellido" type="text" class="form-control" id="exampleInputEmail2" value="{{old('apellido')}}"
                                placeholder="Ingrese el apellido">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Cédula:</label>
                        <div class="col-xl-9 ">
                            <input onchange="leerCedula();" style="border-radius:10px" name="cedula" type="text" class="form-control" id="cedula" value="{{old('cedula')}}"
                                placeholder="Ingrese la cédula">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Edad:</label>
                        <div class="col-xl-9 ">
                            <input style="border-radius:10px" name="edad" type="number" min="1" max="80" class="form-control" id="exampleInputEmail2" value="{{old('edad')}}"
                                placeholder="Ingrese la edad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Sexo:</label>
                        <div class="col-xl-9 ">
                          <select style="border-radius:10px; background-color:#F0F0F0;min-height:45.2px" class="form-control" name="sexo" id="" >
                              <option selected disabled>Seleccione una opción</option>
                              <option value="1" {{old('sexo') == "1" ? 'selected' : ''}}>Femenino</option>
                              <option value="2" {{old('sexo') == "2" ? 'selected' : ''}}>Masculino</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Tipo diabetes:</label>
                        <div class="col-xl-9 ">
                          <select style="border-radius:10px; background-color:#F0F0F0;min-height:45.2px" class="form-control" name="tipo_diabetes" id="" >
                              <option selected disabled>Seleccione una opción</option>
                              <option value="1" {{old('tipo_diabetes') == "1" ? 'selected' : ''}}>Tipo 1</option>
                              <option value="2" {{old('tipo_diabetes') == "2" ? 'selected' : ''}}>Tipo 2</option>
                              <option value="3" {{old('tipo_diabetes') == "3" ? 'selected' : ''}}>Gestacional</option>
                          </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputMobile"
                            class="col-xl-3  col-form-label">Teléfono:</label>
                        <div class="col-xl-9 ">
                            <input style="border-radius:10px" name="telefono" type="text" class="form-control" id="exampleInputMobile" value="{{old('telefono')}}"
                                placeholder="Ingrese el teléfono">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Email:</label>
                        <div class="col-xl-9 ">
                            <input style="border-radius:10px" name="email" type="email" class="form-control" id="exampleInputEmail2" value="{{old('email')}}"
                                placeholder="Correo electrónico">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase;" for="exampleInputEmail2"
                            class="col-xl-3  col-form-label">Contraseña:</label>
                        <div class="col-xl-9 ">
                            <input style="border-radius:10px" readonly="readonly" name="password" type="password" class="form-control" id="password" value="{{old('password')}}"
                                placeholder="Contraseña">
                        </div>
                    </div>


                    <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                        <div class="col-md-8 col-xl-5 p-0 justify-content-space-around">
                        <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar</button>
                        <a class="btn btn-light mb-2 col-sm-12 col-md-5" href="{{route('paciente.index')}}">Cancelar</a>
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

<script>


    function leerCedula()
    {
          let cedula =  document.getElementById('cedula').value;
          document.getElementById('password').value = cedula;
    }

</script>
@endsection
