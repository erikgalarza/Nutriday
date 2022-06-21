@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar actividad
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar actividad</li>
        </ol>
    </nav>
</div>

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class=" mb-3" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-lg-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos de la actividad</h3>
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

            <div class="card-body"  >
                <div class="col-12 row justify-content-center">
                    <div class="col-md-8 col-lg-9 px-xl-4 px-lg-2 px-md-2 text-left ">

                        <form method="POST" action="{{route('actividad.store')}}" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <div class="container" style="max-width: 568px">

                    <div class="form-group row mb-1 no-gutters">
                        <label for="exampleInputEmail2" style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            class="col-xl-5  col-form-label">Nombre de la actividad:</label>
                        <div class="col-xl-7 ">
                            <input  style="border-radius: 10px"name="nombre" type="text" class="form-control" id="exampleInputEmail2"
                              placeholder="Ingrese el nombre de la actividad... Ejm: Correr">
                        </div>
                    </div>
                    <div class="form-group row mb-2 no-gutters">
                        <label
                            style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            for="exampleInputUsername2" class="col-xl-5  col-form-label">Prioridad:
                        </label>
                        <div class="col-xl-7 ">
                            <select class="form-control"
                                style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px"
                                name="prioridad" id="exampleInputUsername2">
                                <option value="" selected disabled>Seleccione la prioridad</option>
                                    <option value="1">Baja</option>
                                    <option value="2">Media</option>
                                    <option value="3">Alta</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2 no-gutters">
                        <label for="exampleInputEmail2" style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            class="col-xl-5  col-form-label">Descripción de la actividad:</label>
                        <div class="col-xl-7 ">
                            <textarea style="border-radius: 10px" name="descripcion" rows="4" class="form-control" id="exampleInputEmail2"></textarea>
                        </div>
                    </div>

                     <div class="form-group row mb-3  no-gutters">
                        <label for="exampleInputEmail2" style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            class="col-xl-5  col-form-label">Imagen de la actividad:</label>
                        <div class="col-xl-7 ">
                            <input style="border-radius: 10px" name="imagen" type="file" class="form-control" id="exampleInputEmail2"
                               >
                        </div>
                    </div>

                    <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                        <div class="col-md-8 p-0 col-xl-7 justify-content-space-around">
                            <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-4">Guardar
                            </button>
                            <a class="btn btn-light mb-2 col-sm-12 col-md-4" href="{{route('actividad.index')}}">Cancelar</a>
                        </div>
                    </div>


                </div>
                </form>



        </div>
    </div>

@endsection
