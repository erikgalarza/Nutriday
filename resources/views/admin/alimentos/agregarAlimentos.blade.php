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
                <div class="mb-5" style="background-color:#4b6ac3">
                    <h3 class="card-title titulosa text-lg-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">Datos del alimento</h3>
                    </div>

                <div class="card-body" style="padding-right:13rem;padding-left:13rem">

                    <form method="POST" class="forms-sample" action="{{ route('alimento.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Categoría: </label>
                            <div class="col-sm-10">
                                <select  class="form-control" style="border-radius:10px;background-color:#F0F0F0;height:45px" name="categoria"
                                    id="exampleInputUsername2">
                                    <option value="" selected disabled>Seleccione una categoría</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Nombre: </label>
                            <div class="col-sm-10">
                                <input style="border-radius:10px" name="nombre" type="text" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Peso: </label>
                            {{-- <div class=" col-4 row">
                            </div> --}}
                            <div class="col-sm-10 d-flex justify-content-around" >
                                        <input style="border-radius:10px;height:45px" name="peso" type="number"
                                            class="form-control" id="exampleInputUsername2">
                                        <select  class="form-control" style="border-radius:10px;background-color:#F0F0F0;height:45px; margin-left:2rem"
                                            name="medida" id="unidad">
                                            <option value="" selected disabled>Seleccione una medida</option>
                                            @foreach($medidas as $medida)
                                            <option value="{{$medida->id}}">{{$medida->medida}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Proteínas: </label>
                            <div class="col-sm-10">
                                <input style="border-radius:10px" name="proteina" type="number" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Valor calórico: </label>
                            <div class="col-sm-10">
                                <input style="border-radius:10px" name="valor_calorico" type="number" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Grasas: </label>
                            <div class="col-sm-10">
                                <input style="border-radius:10px" name="grasa" type="number" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2" class="col-sm-2 col-form-label">Carbohidratos: </label>
                            <div class="col-sm-10">
                                <input style="border-radius:10px" name="carbohidrato" type="number" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputPassword2" class="col-sm-2 col-form-label">Imagen: </label>
                            <div class="col-sm-10">
                                <input style="border-radius:10px" name="imagen" type="file" class="form-control">
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
