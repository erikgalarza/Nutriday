@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Crear dieta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar dieta</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class=" mb-4" style="background-color:#4b6ac3 ">
                    @if (isset($paciente))
                        <h3 class="card-title text-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Datos para la dieta del paciente
                            {{ $paciente->nombre }}</h3>
                    @else
                        <h3 class="card-title text-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Datos para la dieta del paciente</h3>
                    @endif
                </div>
                <div class="card-body">
                    <div class="col-12 row justify-content-center">
                        <div class="col-md-9 col-12 text-left ">
                            <form method="POST" action="{{ route('dieta.store') }}" enctype="multipart/form-data"
                                class="forms-sample">
                                @csrf
                                <div class="container" style="max-width:596px">
                                    @if (isset($paciente))
                                        <input type="hidden" name="paciente" value="{{ $paciente }}">
                                    @endif

                                    <div class="form-group row no-gutters ">
                                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"
                                            class="col-xl-4 col-form-label">Nombre de la dieta:</label>
                                        <div class="col-xl-8">
                                            <input name="nombre" type="text" class="form-control"
                                                id="exampleInputUsername2" placeholder="Ingrese el nombre de la dietas">
                                                <p class="text-danger font-weight-bold">{{$errors->first('nombre')}}</p>
                                        </div>
                                    </div>


                                    <div class="form-group row no-gutters ">
                                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"
                                            class="col-xl-4    col-form-label">Tipo de diabetes:</label>
                                        <div class="col-xl-8 ">
                                            @if (!isset($paciente))
                                                <select style="background-color:#F0F0F0;min-height:45.2px"
                                                    class="form-control" name="tipo_diabetes">
                                                    <option selected disabled>Seleccione una opción</option>
                                                    <option value="1">Tipo 1</option>
                                                    <option value="2">Tipo 2</option>
                                                    <option value="3">Gestacional</option>
                                                </select>
                                                <p class="text-danger font-weight-bold">{{$errors->first('tipo_diabetes')}}</p>
                                            @else
                                                <select style="background-color:#F0F0F0;min-height:45.2px"
                                                    class="form-control" name="tipo_diabetes" id="">
                                                    <option selected disabled>{{ $paciente->tipo_diabetes }}</option>
                                                </select>
                                                <input type="hidden" name="tipo_diabetes"
                                                    value="{{ $paciente->tipo_diabetes }}">
                                                    <p class="text-danger font-weight-bold">{{$errors->first('tipo_diabetes')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters  ">
                                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"
                                            class="col-xl-4  col-form-label">IMC: <button class="ml-3"
                                                disabled title="IMC es Índice de masa corporal "
                                                style="border-radius:10px; border:1px solid grey"><i
                                                    class="fas fa-info"></i></button></label>
                                        <div class="col-xl-8  ">
                                            @if (!isset($imc))
                                                <select style="background-color:#F0F0F0;min-height:45.2px"
                                                    class="form-control" name="imc" id="">
                                                    <option selected disabled>Seleccione una opción</option>
                                                    <option value="1">Bajo peso</option>
                                                    <option value="2">Normal</option>
                                                    <option value="3">Sobrepeso</option>
                                                    <option value="4">Obeso</option>
                                                </select>
                                            @else
                                                {{-- <select style="background-color:#F0F0F0;min-height:45.2px"
                                                    class="form-control" name="imc">
                                                    <option selected disabled>{{ $imc }}</option>

                                                </select> --}}
                                                <input type="number" class="form-control" name="imc" readonly="readonly" value="{{ $imc }}">
                                            @endif
                                        </div>
                                    </div>


                                    @if (isset($paciente))
                                        <div class="form-group row no-gutters ">
                                            <label style="font-weight:bold; font-size:12px; text-transform:uppercase"
                                                class="col-xl-4  col-form-label">Fecha finalización dieta:</label>
                                            <div class="col-xl-8 ">
                                                <input name="fecha_fin" type="date" class="form-control"
                                                    id="exampleInputUsername2">
                                                    <p class="text-danger font-weight-bold">{{$errors->first('fecha_finalizacion')}}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group row no-gutters ">
                                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"
                                            class="col-xl-4  col-form-label">Observaciones:</label>
                                        <div class="col-xl-8 ">
                                            <textarea name="observaciones" class="form-control" rows="5"></textarea>
                                            <p class="text-danger font-weight-bold">{{$errors->first('observaciones')}}</p>
                                        </div>
                                    </div>



                                    <div
                                        class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                                        <div class="col-md-8 p-0 col-xl-7 justify-content-space-around">
                                            <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-6">Agregar
                                                alimentos
                                            </button>
                                            <a class="btn btn-light mb-2 col-sm-12 col-md-5"
                                                href="{{ route('dieta.index') }}">Cancelar</a>
                                        </div>
                                    </div>


                                </div>
                            </form>
                    </div>
                </div>



                <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel-2">Añadir datos antropométricos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                {{-- <form method="POST">
                                    @csrf --}}

                                    <div class="form-group row no-gutters">
                                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Sexo</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="tipo_diabetes" id="">
                                                <option selected disabled>Seleccione una opción</option>
                                                <option value="1">Femenino</option>
                                                <option value="2">Masculino</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters">
                                        <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Peso</label>
                                        <div class="col-sm-8">
                                            <input name="peso" type="text" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Altura</label>
                                        <div class="col-sm-8">
                                            <input name="altura" type="text" class="form-control"
                                                id="exampleInputUsername2">
                                        </div>
                                    </div>



                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
