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
            <div class=" mb-5" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos de la actividad</h3>
            </div>

            <div class="card-body"  >
                <div class="col-12 row justify-content-center">
                    <div class="col-md-10 col-12 px-xl-4 px-lg-2 px-md-2 text-left ">
                        <div class="container">

                <form method="POST" action="{{route('actividad.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group row mb-1 ">
                        <label for="exampleInputEmail2" style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            class="col-xl-4 col-lg-5 col-form-label">Nombre de la actividad:</label>
                        <div class="col-xl-8 col-lg-7">
                            <input  style="border-radius: 10px"name="nombre" type="text" class="form-control" id="exampleInputEmail2"
                              >
                        </div>
                    </div>
                    <div class="form-group row mb-2 ">
                        <label for="exampleInputEmail2" style="font-weight:bold; font-size:11px; text-transform:uppercase"
                            class="col-xl-4 col-lg-5 col-form-label">Descripción de la actividad:</label>
                        <div class="col-xl-8 col-lg-7">
                            <textarea style="border-radius: 10px" name="descripcion" rows="4" class="form-control" id="exampleInputEmail2"></textarea>
                        </div>
                    </div>

                     <div class="form-group row mb-3 ">
                        <label for="exampleInputEmail2" style="font-weight:bold; font-size:12px; text-transform:uppercase"
                            class="col-xl-4 col-lg-5 col-form-label">Imagen de la actividad:</label>
                        <div class="col-xl-8 col-lg-7">
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


                </form>



            </div>
        </div>
    </div>

</div>
@endsection
