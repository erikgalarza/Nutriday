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
            <div class="card-body" style="padding-right:13rem;padding-left:13rem" >


                <form method="POST" action="{{route('actividad.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group row mb-3">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label"> <strong> Nombre de la actividad: </strong></label>
                        <div class="col-sm-9">
                            <input  style="border-radius: 10px"name="nombre" type="text" class="form-control" id="exampleInputEmail2"
                              >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label"> <strong> Duración de la actividad: </strong></label>
                        <div class="col-sm-9">
                            <input style="border-radius: 10px" name="actividad" type="number" class="form-control" id="exampleInputEmail2"
                              >
                        </div>
                    </div>

                     <div class="form-group row mb-3">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label"> <strong> Imagen de la actividad: </strong></label>
                        <div class="col-sm-9">
                            <input style="border-radius: 10px" name="imagen" type="file" class="form-control" id="exampleInputEmail2"
                               >
                        </div>
                    </div>

                  <div class="mt-5" style="display:flex; justify-content:center">
                    <button type="submit" class="btn btn-success mr-2">Guardar</button>
                  </div>


                </form>



            </div>
        </div>
    </div>

</div>
@endsection
