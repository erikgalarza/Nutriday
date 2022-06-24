@extends('admin.dashboard')
@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <div class="page-header mb-2">
        <h3 class="page-title">
            Ver dietas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dietas</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-3" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Dietas predefinidas</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre dieta</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Alimentos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dietas_predefinidas as $key => $dieta)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $dieta->nombre }}</td>
                                        <td>{{ $dieta->tipo_diabetes }}</td>

                                        @if ($dieta->imc == '1')
                                            <td>(Bajo peso)</td>
                                        @endif
                                        @if ($dieta->imc == '2')
                                            <td>(Normal)</td>
                                        @endif
                                        @if ($dieta->imc == '3')
                                            <td>(Sobrepeso)</td>
                                        @endif
                                        @if ($dieta->imc == '4')
                                            <td>(Obeso)</td>
                                        @endif




                                        <td>
                                            <a title="Agregar alimentos a la dieta"
                                                href="{{ route('alimento.addAlimentoDieta', $dieta->id) }}"
                                                class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>

                                            <a class="btn btn-outline-primary mb-1" title="Ver alimentos"><i
                                                    class="fa-solid fa-utensils"></i></a>
                                        </td>
                                        <td>

                                            <a title="Ver más" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $dieta->id }}"
                                                class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>

                                            <a title="Editar datos de la dieta" class="btn btn-outline-warning mb-1"
                                                data-toggle="modal" data-target="#exampleModal-2{{ $dieta->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                            <form method="post" id="deletecategoria"
                                                action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Eliminar dieta"
                                                    onclick="if(!confirm('Está seguro que desea eliminar la dieta?'))return false;"
                                                    type="submit" class="btn btn-outline-danger mb-1"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal-2{{ $dieta->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"id="exampleModalLabel-2">
                                                        Editar dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-9 mt-4 col-11 text-left">
                                                            <form method="POST"
                                                                action="{{ route('dieta.update', $dieta->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}

                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label"><strong>Nombre
                                                                            dieta:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <input name="nombre" type="text"
                                                                            value="{{ $dieta->nombre }}"
                                                                            class="form-control" id="exampleInputUsername2"
                                                                            required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputEmail2"
                                                                        class="col-sm-4 col-form-label"> <strong>Tipo
                                                                            diabetes:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control" name="tipo_diabetes"
                                                                            id=""
                                                                            style="min-height:45.2px;background-color:#F0F0F0"
                                                                            required>

                                                                            <option value="1"
                                                                                {{ $dieta->tipo_diabetes == '1' ? 'selected' : '' }}>
                                                                                Tipo 1</option>
                                                                            <option value="2"
                                                                                {{ $dieta->tipo_diabetes == '2' ? 'selected' : '' }}>
                                                                                Tipo 2</option>
                                                                            <option value="3"
                                                                                {{ $dieta->tipo_diabetes == '3' ? 'selected' : '' }}>
                                                                                Gestacional</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label"><strong>IMC:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control" name="imc"
                                                                            class="form-control"
                                                                            id=""style="min-height:45.2px;background-color:#F0F0F0"
                                                                            required>
                                                                            <option value="1"
                                                                                {{ $dieta->imc == '1' ? 'selected' : '' }}>
                                                                                Bajo peso</option>
                                                                            <option value="2"
                                                                                {{ $dieta->imc == '2' ? 'selected' : '' }}>
                                                                                Normal</option>
                                                                            <option value="3"
                                                                                {{ $dieta->imc == '3' ? 'selected' : '' }}>
                                                                                Sobrepeso</option>
                                                                            <option value="4"
                                                                                {{ $dieta->imc == '4' ? 'selected' : '' }}>
                                                                                Obeso</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label"><strong>Observaciones:</strong></label>
                                                                    <div class="col-sm-8">
                                                                        <textarea name="observaciones"cols="30" rows="5" value="{{ $dieta->observaciones }}"
                                                                            class="form-control" id="exampleInputUsername2" required>
                            </textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                        </div>
                                                        <div
                                                            class="modal-footer mt-2 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                            <div
                                                                class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                                                                <button type="submit"
                                                                    class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                                                                <button type="button"
                                                                    class="btn btn-light mb-2 col-12 col-sm-5"
                                                                    data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>





                                    <div class="modal fade" id="exampleModal-3{{ $dieta->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5
                                                        class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;  id="ModalLabel">
                                                        Datos de la dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0">
                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div
                                                            class="col-sm-12 pl-3 col-11 text-left justify-content-center">
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Nombre:</strong> </label>
                                                                <label class="col-sm-8">{{ $dieta->nombre }}</label>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Tipo de diabetes:</strong>
                                                                </label>
                                                                <label
                                                                    class="col-sm-8">{{ $dieta->tipo_diabetes }}</label>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>IMC:</strong></label>
                                                                <label class="col-sm-8">{{ $dieta->imc }}
                                                                    (Normal)
                                                                </label>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-sm-4"><strong>Observaciones:</strong></label>
                                                                @if (isset($dieta->observaciones))
                                                                    <label
                                                                        class="col-sm-8">{{ $dieta->observaciones }}</label>
                                                                @else
                                                                    <label class="col-sm-8">Sin observaciones</label>
                                                                @endif
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Fecha
                                                                        creación:</strong></label>
                                                                <label class="col-sm-8">{{ $dieta->created_at }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- =============== tabla dietas asignadas a pacientes ========================================== -->
    <div class="card mt-4">
        <div class=" mb-3" style="background-color: #4eba74">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Dietas Asignadas a pacientes</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre dieta</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Alimentos</th>
                                    <th>Paciente</th>
                                    <th>Fecha asignación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientesc as $key => $paciente)
                                    {{-- MODAL PARA VER ALIMENTOS DE LA DIETA --}}
                                    <div class="modal fade" id="exampleModal-4{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5
                                                        class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;  id="ModalLabel">
                                                        Alimentos de la dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0">
                                                    <div class="container">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Dieta semanal</h4>
                                                                <p class="card-description">Paciente: </p>
                                                                <select class="form-control"
                                                                    onchange="opcion({{ $key }});"
                                                                    id="selectorDia{{ $key }}">
                                                                    <option disabled>Seleccione un día</option>
                                                                    <option value="1">Lunes</option>
                                                                    <option value="2">Martes</option>
                                                                    <option value="3">Miercoles</option>
                                                                    <option value="4">Jueves</option>
                                                                    <option value="5">Viernes</option>
                                                                    <option value="6">Sabado</option>
                                                                    <option value="7">Domingo</option>
                                                                </select>
                                                                <div class="container my-2"
                                                                    style=" height:600px; display:flex; flex-wrap:wrap; flex-direction:row;"
                                                                    id="container{{ $key }}">
                                                                    <div class="desayuno w-100 text-center text-center"
                                                                        id="desayuno{{ $key }}">
                                                                        <h5 class="textoDesayuno">Desayuno</h5>
                                                                        <div class="cabecera"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center;">
                                                                            <h5>Alimento</h5>
                                                                            <h5>Cantidad</h5>
                                                                        </div>
                                                                        <div class="alimentosDesayuno"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center"
                                                                            id="alimentosDesayuno{{ $key }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="colacion1 w-100 text-center text-center"
                                                                        id="colacion1{{ $key }}">
                                                                        <h5 class="textoColacion1">Colación mañanera</h5>
                                                                        <div class="cabecera"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center;">
                                                                            <h5>Alimento</h5>
                                                                            <h5>Cantidad</h5>
                                                                        </div>
                                                                        <div class="alimentosColacion1"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center"
                                                                            id="alimentosColacion1{{ $key }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="almuerzo w-100 text-center text-center"
                                                                        id="almuerzo{{ $key }}">
                                                                        <h5 class="textoAlmuerzo">Almuerzo</h5>
                                                                        <div class="cabecera"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center;">
                                                                            <h5>Alimento</h5>
                                                                            <h5>Cantidad</h5>
                                                                        </div>
                                                                        <div class="alimentosAlmuerzo"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center"
                                                                            id="alimentosAlmuerzo{{ $key }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="colacion2 w-100 text-center text-center"
                                                                        id="colacion2{{ $key }}">
                                                                        <h5 class="textoColacion2">Colación de la tarde
                                                                        </h5>
                                                                        <div class="cabecera"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center;">
                                                                            <h5>Alimento</h5>
                                                                            <h5>Cantidad</h5>
                                                                        </div>
                                                                        <div class="alimentosColacion2"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center"
                                                                            id="alimentosColacion2{{ $key }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="merienda w-100 text-center text-center"
                                                                        id="merienda{{ $key }}">
                                                                        <h5 class="textoMerienda">Merienda</h5>
                                                                        <div class="cabecera"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center;">
                                                                            <h5>Alimento</h5>
                                                                            <h5>Cantidad</h5>
                                                                        </div>
                                                                        <div class="alimentosMerienda"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center"
                                                                            id="alimentosMerienda{{ $key }}">
                                                                        </div>
                                                                    </div>


                                                                    <div class="cena w-100 text-center text-center"
                                                                        id="cena{{ $key }}">
                                                                        <h5 class="textoCena">Cena</h5>
                                                                        <div class="cabecera"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center;">
                                                                            <h5>Alimento</h5>
                                                                            <h5>Cantidad</h5>
                                                                        </div>
                                                                        <div class="alimentosCena"
                                                                            style="display:flex; flex-direction:row; justify-content:space-evenly; align-items:center"
                                                                            id="alimentosCena{{ $key }}">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    @foreach ($paciente->dietas()->get() as $dieta)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $dieta->nombre }}</td>
                            <td>{{ $dieta['tipo_diabetes'] }}</td>
                            @if ($dieta['imc'] <= 18.4)
                                <td>{{ $dieta['imc'] }} (Bajo peso)</td>
                            @endif
                            @if ($dieta['imc'] >= 18.5 && $dieta['imc'] <= 24.9)
                                <td>{{ $dieta['imc'] }} (Normal)</td>
                            @endif
                            @if ($dieta['imc'] >= 25 && $dieta['imc'] <= 29.9)
                                <td>{{ $dieta['imc'] }} (Sobrepeso)</td>
                            @endif
                            @if ($dieta['imc'] >= 30)
                                <td>{{ $dieta['imc'] }} (Obeso)</td>
                            @endif
                            <td>
                                <a title="Agregar alimentos a la dieta"
                                    href="{{ route('alimento.addAlimentoDieta', $dieta->id) }}"
                                    class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>
                                <a onclick="obtenerIdPaciente({{ $paciente->id }});obtenerIdDieta({{ $dieta->id }});"
                                    data-toggle="modal" data-target="#exampleModal-4{{ $paciente->id }}"
                                    class="btn btn-outline-primary mb-1" title="Ver alimentos"
                                    href="{{ route('alimento.alimentosByDieta', $dieta->id) }}"><i
                                        class="fa-solid fa-utensils"></i></a>
                            </td>
                            <td>
                                <a href="{{route('paciente.historial')}}">{{ $paciente->nombre }} {{ $paciente->aepllido }}</a>
                            </td>
                            <td>{{ $dieta->created_at }}</td>
                            <td>

                                <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{ $dieta->id }}"
                                    class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>


                                <form method="post" id="deletecategoria"
                                    action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button title="Eliminar dieta"
                                        onclick="if(!confirm('Está seguro que desea eliminar la dieta?'))return false;"
                                        type="submit" class="btn btn-outline-danger mb-1"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>


                        <div class="modal fade" id="exampleModal-2{{ $dieta->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#4b6ac3">
                                        <h5 class="modal-title text-white"
                                            style="text-transform: uppercase; font-weight:bold; font-size:16px"id="exampleModalLabel-2">
                                            Editar dieta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body py-2 px-0">
                                        <div class="col-12 row m-0 justify-content-center">
                                            <div class="col-sm-9 mt-4 col-11 text-left">
                                                <form method="POST" action="{{ route('dieta.update', $dieta->id) }}">
                                                    @csrf
                                                    {{ method_field('PATCH') }}

                                                    <div class="form-group row mb-3">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-4 col-form-label"><strong>Nombre
                                                                dieta:</strong></label>
                                                        <div class="col-sm-8">
                                                            <input name="nombre" type="text"
                                                                value="{{ $dieta->nombre }}" class="form-control"
                                                                id="exampleInputUsername2" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">
                                                            <strong>Tipo
                                                                diabetes:</strong></label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="tipo_diabetes"
                                                                id=""
                                                                style="min-height:45.2px;background-color:#F0F0F0"
                                                                required>

                                                                <option value="1"
                                                                    {{ $dieta->tipo_diabetes == '1' ? 'selected' : '' }}>
                                                                    Tipo 1</option>
                                                                <option value="2"
                                                                    {{ $dieta->tipo_diabetes == '2' ? 'selected' : '' }}>
                                                                    Tipo 2</option>
                                                                <option value="3"
                                                                    {{ $dieta->tipo_diabetes == '3' ? 'selected' : '' }}>
                                                                    Gestacional</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row mb-3">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-4 col-form-label"><strong>Observaciones:</strong></label>
                                                        <div class="col-sm-8">
                                                            <textarea name="observaciones"cols="30" rows="5" value="{{ $dieta->observaciones }}"
                                                                class="form-control" id="exampleInputUsername2" required>
                              </textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                            </div>
                                            <div
                                                class="modal-footer mt-2 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                <div class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                                                    <button type="submit"
                                                        class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                                                    <button type="button" class="btn btn-light mb-2 col-12 col-sm-5"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>




                        <div class="modal fade" id="exampleModal-3{{ $dieta->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #4b6ac3">
                                        <h5
                                            class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;  id="ModalLabel">
                                            Datos de la dieta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body py-3 px-0">
                                        <div class="col-12 row m-0 justify-content-center">
                                            <div class="col-sm-12 pl-3 col-11 text-left justify-content-center">
                                                <div class="form-group row mb-2">
                                                    <label class="col-sm-4"><strong>Nombre:</strong>
                                                    </label>
                                                    <label class="col-sm-8">{{ $dieta->nombre }}</label>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-sm-4"><strong>Tipo de
                                                            diabetes:</strong> </label>
                                                    <label class="col-sm-8">{{ $dieta->tipo_diabetes }}</label>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-sm-4"><strong>IMC:</strong></label>
                                                    <label class="col-sm-8">{{ $dieta->imc }}
                                                        (Normal)
                                                    </label>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-sm-4"><strong>Observaciones:</strong></label>
                                                    @if (isset($dieta->observaciones))
                                                        <label class="col-sm-8">{{ $dieta->observaciones }}</label>
                                                    @else
                                                        <label class="col-sm-8">Sin observaciones</label>
                                                    @endif
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-sm-4"><strong>Fecha
                                                            creación:</strong></label>
                                                    <label class="col-sm-8">{{ $dieta->created_at }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- {{ $dietas->links() }} --}}
    </div>
    </div>
    {{-- {{ $dietas->links() }} --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var pacienteid = null,
            dietaid = null;

        function opcion(key) {
         let diaSeleccionado =  document.getElementById('selectorDia'+key).value;
            // console.log('valor de dieta:'+dietaid)
            // console.log('valor de paciente:'+pacienteid)
<<<<<<< HEAD
            
                $.ajax({
                    url: "{{ route('dieta.traerAlimentos') }}",
                    dataType: "json",
                    data: {
                        dieta_id: dietaid,
                        paciente_id: pacienteid,
                        diaSeleccionado:diaSeleccionado
                    }
                }).done(function(res){

                    console.log(res);
                    // let arreglo = JSON.parse(res)
                    // console.log(arreglo)
                    var contenedor1 = document.getElementById('alimentosDesayuno'+key);
                    var contenedor2 = document.getElementById('alimentosColacion1'+key);
                    var contenedor3 = document.getElementById('alimentosAlmuerzo'+key);
                    var contenedor4 = document.getElementById('alimentosColacion2'+key);
                    var contenedor5 = document.getElementById('alimentosMerienda'+key);
                    var contenedor6 = document.getElementById('alimentosCena'+key);

                    contenedor1.innerHTML='';  contenedor2.innerHTML='';  contenedor3.innerHTML=''; contenedor4.innerHTML='';
                    contenedor5.innerHTML='';  contenedor6.innerHTML='';

                    
                    for(let i =0 ; i<res.length ; i++)
                    {
                        let comida = res[i]

                        cant = Object.keys(comida);
                        long = cant.length
                        for(let j= 0; j<long-2; j++)
                        {
                        
                            if(i==0)
                        {
                            let contenido = `<div><img style="max-width:50px;"  src='${res[i][j].imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                            $(contenedor1).append(contenido)
                        }
                        if(i==1)
                        {
                            let contenido = `<div><img style="max-width:50px;"  src='${res[i][j].imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                            $(contenedor2).append(contenido)
                        }
                        if(i==2)
                        {
                            let contenido = `<div><img style="max-width:50px;"  src='${res[i][j].imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                            $(contenedor3).append(contenido)
                        }
                        if(i==3)
                        {
                            let contenido = `<div><img style="max-width:50px;"  src='${res[i][j].imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                            $(contenedor4).append(contenido)
                        }
                        if(i==4)
                        {
                            let contenido = `<div><img style="max-width:50px;"  src='${res[i][j].imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                            $(contenedor5).append(contenido)
                        }
                        if(i==5)
                        {
                            let contenido = `<div><img style="max-width:50px;"  src='${res[i][j].imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                            $(contenedor6).append(contenido)
                        }
                        }

                    }
                 
                })
=======

            $.ajax({
                url: "{{ route('dieta.traerAlimentos') }}",
                dataType: "json",
                data: {
                    dieta_id: dietaid,
                    paciente_id: pacienteid,
                    diaSeleccionado: key
                }
            }).done(function(res) {
                console.log(res);
                var contenedor1 = document.getElementById('alimentosDesayuno' + key);
                var contenedor2 = document.getElementById('alimentosColacion1' + key);
                var contenedor3 = document.getElementById('alimentosAlmuerzo' + key);
                var contenedor4 = document.getElementById('alimentosColacion2' + key);
                var contenedor5 = document.getElementById('alimentosMerienda' + key);
                var contenedor6 = document.getElementById('alimentosCena' + key);

                contenedor1.innerHTML = '';
                contenedor2.innerHTML = '';
                contenedor3.innerHTML = '';
                contenedor4.innerHTML = '';
                contenedor5.innerHTML = '';
                contenedor6.innerHTML = '';

                for (let i = 0; i < res.length; i++) {
                    if (res[i].horario == "Desayuno") {
                        let contenido = `<div><img style="max-width:50px;"  src='${res[i].alimento.imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                        $(contenedor1).append(contenido)
                    }
                    if (res[i].horario == "Colacion de la mañana") {
                        let contenido = `<div><img style="max-width:50px;"  src='${res[i].alimento.imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                        $(contenedor2).append(contenido)
                    }
                    if (res[i].horario == "Almuerzo") {
                        let contenido = `<div><img style="max-width:50px;"  src='${res[i].alimento.imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                        $(contenedor3).append(contenido)
                    }
                    if (res[i].horario == "Colación de la tarde") {
                        let contenido = `<div><img style="max-width:50px;"  src='${res[i].alimento.imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                        $(contenedor4).append(contenido)
                    }
                    if (res[i].horario == "Merienda") {
                        let contenido = `<div><img style="max-width:50px;"  src='${res[i].alimento.imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                        $(contenedor5).append(contenido)
                    }
                    if (res[i].horario == "Cena") {
                        let contenido = `<div><img style="max-width:50px;"  src='${res[i].alimento.imagen.url}'></div>
                            <div><h5 >${res[i].cantidad}</h5></div>`
                        $(contenedor6).append(contenido)
                    }
                }

            })
>>>>>>> alvaro
        }

        function obtenerIdPaciente(idpaciente) {
            pacienteid = idpaciente;
        }

        function obtenerIdDieta(iddieta) {
            dietaid = iddieta;
            console.log('valor de dietaid:' + dietaid + ' valor de pacienteid:' + pacienteid);

        }
    </script>
@endsection
