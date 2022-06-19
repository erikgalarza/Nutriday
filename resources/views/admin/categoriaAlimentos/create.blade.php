@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar categoría
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar categoría</li>
        </ol>
    </nav>
</div>
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="mb-3 px-3" style="background-color:#4b6ac3">
                <h3 class="card-title titulosa text-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">Datos de la categoría</h3>
                </div>
            <div class="card-body">
                <div class="col-12 row justify-content-center px-0 m-0">
                    <div class="col-md-8 col-xl-9 col-11 text-left pl-md-0">
                        <form method="POST"  class="forms-sample" action="{{route('categoriaAlimento.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="container" style="max-width: 621px">

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4 col-12 col-form-label text-xl-right">Nombre de la categoría:</label>
                        <div class="col-xl-8 col-12">
                            <input style="border-radius:10px;"  name="nombre" type="text" class="form-control" id="exampleInputUsername2" placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                        <div class="col-md-8 p-0 col-xl-5 justify-content-space-around">
                            <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar
                            </button>
                            <a class="btn btn-light mb-2 col-sm-12 col-md-5" href="{{route('categoriaAlimento.index')}}">Cancelar</a>
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
