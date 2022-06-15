@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h5 class="page-title" >
            Agregar alimento
        </h5>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar alimento</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-12 grid-margin stretch-card" >
            <div class="card">
                <div class="mb-3 px-3" style="background-color:#4b6ac3">
                    <h3 class="card-title titulosa text-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">Información nutricional del alimento</h3>
                    </div>

                <div class="card-body">
                    <div class="col-12 row justify-content-center px-0 m-0">
                        <div class="col-md-8 col-xl-9 col-11 text-left pl-md-0">

                            <form method="POST" class="forms-sample" action="{{ route('alimento.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Categoría: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <select  class="form-control" style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px" name="categoria"
                                        id="exampleInputUsername2">
                                        <option value="" selected disabled>Seleccione una categoría</option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Nombre: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <input style="border-radius:10px" name="nombre" type="text" class="form-control"
                                        id="exampleInputUsername2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Peso: </label>
                                {{-- <div class=" col-4 row">
                                </div> --}}
                                <div class="col-xl-9 col-lg-8 d-flex justify-content-around" >
                                            <input style="border-radius:10px;min-height:45.2px" name="peso" type="number"
                                                class="form-control" id="exampleInputUsername2">
                                            <select  class="form-control" style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px; margin-left:2rem"
                                                name="medida" id="unidad">
                                                <option value="" selected disabled>Seleccione una medida</option>
                                                @foreach($medidas as $medida)
                                                <option value="{{$medida->id}}">{{$medida->medida}}</option>
                                                @endforeach
                                            </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Proteínas: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <input style="border-radius:10px" name="proteina" type="number" class="form-control"
                                        id="exampleInputUsername2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Valor calórico: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <input style="border-radius:10px" name="valor_calorico" type="number" class="form-control"
                                        id="exampleInputUsername2">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Grasas: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <input style="border-radius:10px" name="grasa" type="number" class="form-control"
                                        id="exampleInputUsername2">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-xl-3 col-lg-4 col-form-label">Carbohidratos: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <input style="border-radius:10px" name="carbohidrato" type="number" class="form-control"
                                        id="exampleInputUsername2">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputPassword2" class="col-xl-3 col-lg-4 col-form-label">Imagen: </label>
                                <div class="col-xl-9 col-lg-8">
                                    <input style="border-radius:10px" name="imagen" type="file" class="form-control">
                                </div>
                            </div>

                            <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                                <div class="col-md-8 p-0 col-xl-5 justify-content-space-around">
                                    <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar
                                    </button>
                                    <a class="btn btn-light mb-2 col-sm-12 col-md-5" href="{{route('paciente.index')}}">Cancelar</a>
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
