@extends('admin.dashboard')
@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <div class="page-header mb-2">
        <h3 class="page-title">
            Ver dietas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Dashboard</a></li>
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
                                                href="{{ route('dieta.editarAlimentosDietaPredefinida', base64_encode($dieta->id)) }}"
                                                class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>
                                            <a onclick="obtenerIdDieta({{ $dieta->id }});" data-toggle="modal"
                                                data-target="#exampleModal{{ $dieta->id }}"
                                                class="btn btn-outline-primary mb-1" title="Ver alimentos"><i
                                                    class="fa-solid fa-utensils"></i></a>
                                        </td>
                                        <td>

                                            <a title="Ver más" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $dieta->id }}"
                                                class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>

                                            <a title="Editar datos de la dieta" class="btn btn-outline-warning mb-1"
                                                data-toggle="modal" data-target="#exampleModal-2{{ $dieta->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                            <form method="post" id="deletedietapredefinida{{$key}}"
                                                action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a title="Eliminar dieta predefinida"
                                                onclick="obtenerKeyDP({{$key}}); eliminarDietaPredefinida({{$dieta}})"
                                                    type="submit" class="btn btn-outline-danger mb-1"><i
                                                        class="fas fa-trash"></i></a>
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
                                                                        <textarea name="observaciones"cols="30" rows="5" class="form-control" id="exampleInputUsername2"
                                                                            required>
                                                                            {{ $dieta->observaciones }}
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
                                                                        class="col-sm-8 text-justify">{{ $dieta->observaciones }}</label>
                                                                @else
                                                                    <label class="col-sm-8">Sin observaciones</label>
                                                                @endif
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4"><strong>Fecha
                                                                        creación:</strong></label>
                                                                <label class="col-sm-8">{{ date('Y-m-d',strtotime($dieta->created_at)) }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>


                    <div class="modal fade" id="exampleModal{{ $dieta->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #4b6ac3">
                                    <h5 class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;"
                                        id="ModalLabel">
                                        Alimentos de la dieta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body py-3 px-0">
                                    <div class="container">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Dieta semanal</h4>
                                                    <p class="card-description">Nombre de la dieta: <strong>{{ $dieta->nombre }}</strong></p>
                                                <select class="form-control"
                                                    onchange="opcionDietaPredefinida({{ $key }});"
                                                    id="selectorDiaTop{{ $key }}">
                                                    <option selected disabled>Seleccione un día</option>
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miercoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sabado</option>
                                                    <option value="7">Domingo</option>
                                                </select>
                                                <div class="container my-2 p-0"
                                                    style=" min-height:600px; display:flex; flex-wrap:wrap; flex-direction:row; display:none;"
                                                    id="container{{ $key }}">


                                                    <div class="vacio w-100 text-center mt-3" id="vacio{{ $key }}">
                                                    </div>


                                                    <div class="desayuno w-100 text-center mt-3" id="desayuno{{ $key }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">DESAYUNO</h5>
                                                        </div>
                                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                            <h5 class="col-2 m-0 ">Peso</h5>
                                                            <h5 class="col-3 m-0">Imagen</h5>
                                                            <h5 class="col-3 m-0">Porción</h5>
                                                        </div>
                                                        <div class="col-12 my-2" style="border-top:1px solid"></div>
                                                        <div class="alimentosDesayuno col-12 w-100"id="alimentosDesayuno{{ $key }}"></div>
                                                    </div>
                                                    </div>


                                                    <div class="colacion1 w-100 text-center mt-3" id="colacion1{{ $key }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">COLACIÓN DE LA MAÑANA</h5>
                                                        </div>
                                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                        <div class="cabecera mt-2 col-12 text-center row no-gutters  align-items-center justify-content-center">
                                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                            <h5 class="col-2 m-0 ">Peso</h5>
                                                            <h5 class="col-3 m-0">Imagen</h5>
                                                            <h5 class="col-3 m-0 ">Porción</h5>
                                                        </div>
                                                        <div class="col-12 my-2" style="border-top:1px solid"></div>
                                                        <div class="alimentosColacion1 col-12 w-100"id="alimentosColacion1{{ $key }}"></div>
                                                        </div>
                                                    </div>


                                                    <div class="almuerzo w-100 text-center mt-3" id="almuerzo{{ $key }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">ALMUERZO</h5>
                                                        </div>
                                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                            <h5 class="col-2 m-0 ">Peso</h5>
                                                            <h5 class="col-3 m-0">Imagen</h5>
                                                            <h5 class="col-3 m-0">Porción</h5>
                                                        </div>
                                                        <div class="col-12 my-2" style="border-top:1px solid"></div>
                                                        <div class="alimentosAlmuerzo col-12 w-100"id="alimentosAlmuerzo{{ $key }}"></div>
                                                        </div>
                                                    </div>

                                                    <div class="colacion2 w-100 text-center mt-3" id="colacion2{{ $key }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">COLACIÓN DE LA TARDE</h5>
                                                        </div>
                                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                            <h5 class="col-2 m-0 ">Peso</h5>
                                                            <h5 class="col-3 m-0">Imagen</h5>
                                                            <h5 class="col-3 m-0">Porción</h5>
                                                        </div>
                                                        <div class="col-12 my-2" style="border-top:1px solid"></div>

                                                        <div class="alimentosColacion2 col-12 w-100"id="alimentosColacion2{{ $key }}"></div>
                                                        </div>
                                                    </div>

                                                    <div class="merienda w-100 text-center mt-3" id="merienda{{ $key }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">MERIENDA</h5>
                                                        </div>
                                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                            <h5 class="col-2 m-0 ">Peso</h5>
                                                            <h5 class="col-3 m-0">Imagen</h5>
                                                            <h5 class="col-3 m-0">Porción</h5>
                                                        </div>
                                                        <div class="col-12 my-2" style="border-top:1px solid"></div>

                                                        <div class="alimentosMerienda col-12 w-100"id="alimentosMerienda{{ $key }}"></div>
                                                        </div>
                                                    </div>

                                                    <div class="cena w-100 text-center mt-3" id="cena{{ $key }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">CENA</h5>
                                                        </div>
                                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                            <h5 class="col-2 m-0 ">Peso</h5>
                                                            <h5 class="col-3 m-0">Imagen</h5>
                                                            <h5 class="col-3 m-0">Porción</h5>
                                                        </div>
                                                        <div class="col-12 my-2" style="border-top:1px solid"></div>

                                                        <div class="alimentosCena col-12 w-100"id="alimentosCena{{ $key }}"></div>
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
                        <table id="order-listing2" class="table text-center">
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
                                                                <p class="card-description">Dieta asignada a:
                                                                    <strong>{{ $paciente->nombre }} {{ $paciente->apellido }}</strong>
                                                                </p>
                                                                <select class="form-control"
                                                                    onchange="opcion({{ $key }});"
                                                                    id="selectorDia{{ $key }}">
                                                                    <option selected disabled>Seleccione un día</option>
                                                                    <option value="1">Lunes</option>
                                                                    <option value="2">Martes</option>
                                                                    <option value="3">Miercoles</option>
                                                                    <option value="4">Jueves</option>
                                                                    <option value="5">Viernes</option>
                                                                    <option value="6">Sabado</option>
                                                                    <option value="7">Domingo</option>
                                                                </select>
                                                                <div class="container my-2 p-0"
                                                                style=" min-height:600px; display:flex; flex-wrap:wrap; flex-direction:row; display:none;"
                                                                id="containerDA{{ $key }}">

                                                                <div class="vacio w-100 text-center mt-3" id="vacioDA{{ $key }}">
                                                                </div>

                                                                <div class="desayuno w-100 text-center mt-3" id="desayuno{{ $key }}">
                                                                    <div class="row justify-content-center align-items-center">
                                                                        <h5 class="textoDesayuno col-12 text-left" style="color:#828383">DESAYUNO</h5>
                                                                    </div>
                                                                    <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                                    <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                                        <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                                        <h5 class="col-2 m-0 ">Peso</h5>
                                                                        <h5 class="col-3 m-0">Imagen</h5>
                                                                        <h5 class="col-3 m-0">Porción</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2" style="border-top:1px solid"></div>
                                                                    <div class="alimentosDesayuno col-12 w-100"id="alimentosDesayunoDA{{ $key }}">
                                                                    </div>
                                                                </div>
                                                                </div>


                                                                <div class="colacion1 w-100 text-center mt-3" id="colacion1{{ $key }}">
                                                                    <div class="row justify-content-center align-items-center">
                                                                        <h5 class="textoDesayuno col-12 text-left" style="color:#828383">COLACIÓN DE LA MAÑANA</h5>
                                                                    </div>
                                                                    <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                                    <div class="cabecera mt-2 col-12 text-center row no-gutters  align-items-center justify-content-center">
                                                                        <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                                        <h5 class="col-2 m-0 ">Peso</h5>
                                                                        <h5 class="col-3 m-0">Imagen</h5>
                                                                        <h5 class="col-3 m-0 ">Porción</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2" style="border-top:1px solid"></div>
                                                                    <div class="alimentosColacion1 col-12 w-100"id="alimentosColacion1DA{{ $key }}"></div>
                                                                    </div>
                                                                </div>


                                                                <div class="almuerzo w-100 text-center mt-3" id="almuerzo{{ $key }}">
                                                                    <div class="row justify-content-center align-items-center">
                                                                        <h5 class="textoDesayuno col-12 text-left" style="color:#828383">ALMUERZO</h5>
                                                                    </div>
                                                                    <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                                    <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                                        <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                                        <h5 class="col-2 m-0 ">Peso</h5>
                                                                        <h5 class="col-3 m-0">Imagen</h5>
                                                                        <h5 class="col-3 m-0">Porción</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2" style="border-top:1px solid"></div>
                                                                    <div class="alimentosAlmuerzo col-12 w-100"id="alimentosAlmuerzoDA{{ $key }}"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="colacion2 w-100 text-center mt-3" id="colacion2{{ $key }}">
                                                                    <div class="row justify-content-center align-items-center">
                                                                        <h5 class="textoDesayuno col-12 text-left" style="color:#828383">COLACIÓN DE LA TARDE</h5>
                                                                    </div>
                                                                    <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                                    <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                                        <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                                        <h5 class="col-2 m-0 ">Peso</h5>
                                                                        <h5 class="col-3 m-0">Imagen</h5>
                                                                        <h5 class="col-3 m-0">Porción</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2" style="border-top:1px solid"></div>

                                                                    <div class="alimentosColacion2 col-12 w-100"id="alimentosColacion2DA{{ $key }}"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="merienda w-100 text-center mt-3" id="merienda{{ $key }}">
                                                                    <div class="row justify-content-center align-items-center">
                                                                        <h5 class="textoDesayuno col-12 text-left" style="color:#828383">MERIENDA</h5>
                                                                    </div>
                                                                    <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                                    <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                                        <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                                        <h5 class="col-2 m-0 ">Peso</h5>
                                                                        <h5 class="col-3 m-0">Imagen</h5>
                                                                        <h5 class="col-3 m-0">Porción</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2" style="border-top:1px solid"></div>

                                                                    <div class="alimentosMerienda col-12 w-100"id="alimentosMeriendaDA{{ $key }}"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="cena w-100 text-center mt-3" id="cena{{ $key }}">
                                                                    <div class="row justify-content-center align-items-center">
                                                                        <h5 class="textoDesayuno col-12 text-left" style="color:#828383">CENA</h5>
                                                                    </div>
                                                                    <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                                                    <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                                                        <h5 class="col-4 m-0 text-left">Nombre</h5>
                                                                        <h5 class="col-2 m-0 ">Peso</h5>
                                                                        <h5 class="col-3 m-0">Imagen</h5>
                                                                        <h5 class="col-3 m-0">Porción</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2" style="border-top:1px solid"></div>

                                                                    <div class="alimentosCena col-12 w-100"id="alimentosCenaDA{{ $key }}"></div>
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
                    @foreach ($paciente->dietas()->get() as $key => $dieta)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $dieta->nombre }}</td>

                            <td>{{ $dieta['tipo_diabetes'] }}</td>

                            @if ($dieta['imc'] == 1)
                            <td>{{ $dieta['imc'] }}  (Bajo peso)</td>
                        @endif
                        @if ($dieta['imc'] == 2)
                            <td>{{ $dieta['imc'] }}  (Normal)</td>
                        @endif
                        @if ($dieta['imc'] == 3)
                            <td>{{ $dieta['imc'] }}  (Sobrepeso)</td>
                        @endif
                        @if ($dieta['imc'] == 4)
                            <td>{{ $dieta['imc'] }}  (Obeso)</td>
                        @endif

                            @if ($dieta['imc'] >= 10.5 && $dieta['imc'] <= 18.4)
                                <td>{{ $dieta['imc'] }}  (Bajo peso)</td>
                            @endif
                            @if ($dieta['imc'] >= 18.5 && $dieta['imc'] <= 24.9)
                                <td>{{ $dieta['imc'] }}  (Normal)</td>
                            @endif
                            @if ($dieta['imc'] >= 25 && $dieta['imc'] <= 29.9)
                                <td>{{ $dieta['imc'] }}  (Sobrepeso)</td>
                            @endif
                            @if ($dieta['imc'] >= 30)
                                <td>{{ $dieta['imc'] }}  (Obeso)</td>
                            @endif

                            <td>
                                <a title="Agregar alimentos a la dieta"
                                    href="{{ route('dieta.editarAlimentosDieta', base64_encode($dieta->id)) }}"
                                    class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>
                                <a onclick="obtenerIdPaciente({{ $paciente->id }});obtenerIdDieta({{ $dieta->id }});"
                                    data-toggle="modal" data-target="#exampleModal-4{{ $paciente->id }}"
                                    class="btn btn-outline-primary mb-1" title="Ver alimentos"
                                    href="{{ route('alimento.alimentosByDieta', $dieta->id) }}"><i
                                        class="fa-solid fa-utensils"></i></a>
                            </td>
                            <td>
                                <a href="{{route('dieta.dietasByPaciente',$paciente->id)}}">{{ $paciente->nombre }} {{ $paciente->apellido }}</a>
                            </td>
                            <td>{{date('Y-m-d',strtotime($dieta->created_at)) }}</td>
                            <td>
                                <style>
                                    .bboo{
                                        color:#04B76B !important;
                                    }
                                    .bboo:hover{
                                        color:white !important;
                                    }
                                </style>
                                <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{ $dieta->id }}"
                                    class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>

                                    @if($dieta->estado=="activa")
                                <form method="post" id="deletedietaasignada{{$key}}"
                                    action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a title="Eliminar dieta asignada"
                                        onclick="obtenerKeyDA({{$key}}); eliminarDietaAsignada({{$dieta}})"
                                        class="btn btn-outline-danger mb-1"><i
                                            class="fas fa-trash"></i></a>
                                </form>
                                @else
                                <form method="post" id="deletedietaasignada{{$key}}"
                                action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a title="Activar"
                                    onclick="obtenerKeyActivarDP({{$key}});"
                                    class="btn btn-outline-success mb-1 bboo"><i
                                        class="fas fa-share bbo"></i></a>
                            </form>
                                @endif
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
                                    <div></div>
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
                                                        <label
                                                            class="col-sm-8 text-justify">{{ $dieta->observaciones }}</label>
                                                    @else
                                                        <label class="col-sm-8">Sin observaciones</label>
                                                    @endif
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-sm-4"><strong>Fecha
                                                            creación:</strong></label>

                                                    <label class="col-sm-8">{{ date('Y-m-d',strtotime($dieta->created_at)) }}</label>
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
    <style>
        .swal-footer{
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
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

        var estadoVisibleModal1 = false, estadoVisibleModal2 = false;

        function obtenerKeyActivarDP(key)
        {
            document.getElementById('deletedietaasignada'+key).submit();

        }


        var k = null;
        function obtenerKeyDP(key)
        {
            k = key;

        }

        function eliminarDietaPredefinida(dieta) {
            var form = document.getElementById('deletedietapredefinida' +k);
            swal({
            title: "Estas seguro que quieres la dieta " + dieta.nombre + " ?",
            text: "Al confirmar, la dieta será eliminada permanentemente!",
            icon: "warning",
            buttons: [
                'No, cancelar!',
                'Si, estoy seguro!'
            ],
            dangerMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                form.submit(); // <--- submit form programmatically
            }
        })

    }


        var k2 = null;
        function obtenerKeyDA(key)
        {
            k2 = key;

        }



        function eliminarDietaAsignada(dieta) {
            var form = document.getElementById('deletedietaasignada' +k2);
            swal({
            title: "Estas seguro que quieres eliminar la dieta " + dieta.nombre + " ?",
            text: "Al confirmar, la dieta será eliminada  de la asignación del paciente permanentemente!",
            icon: "warning",
            buttons: [
                'No, cancelar!',
                'Si, estoy seguro!'
            ],
            dangerMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                form.submit(); // <--- submit form programmatically
            }
        })

    }


        var pacienteid = null,
            dietaid = null;

        function opcionDietaPredefinida(key) {

            // estadoVisibleModal1 = true;

            let diaSeleccionado = document.getElementById('selectorDiaTop' + key).value;
            container = document.getElementById('container'+key);
            $(container).show();

            $.ajax({
                url: "{{ route('dieta.traerAlimentosDietaPredefinida') }}",
                dataType: "json",
                data: {
                    dieta_id: dietaid,
                    diaSeleccionado: diaSeleccionado
                }
            }).done(function(res) {

                console.log(res);
                // let arreglo = JSON.parse(res)
                // console.log(arreglo)
                var contenedorDefault = document.getElementById('vacio'+key);
                var contenedor1 = document.getElementById('alimentosDesayuno' + key);
                var contenedor2 = document.getElementById('alimentosColacion1' + key);
                var contenedor3 = document.getElementById('alimentosAlmuerzo' + key);
                var contenedor4 = document.getElementById('alimentosColacion2' + key);
                var contenedor5 = document.getElementById('alimentosMerienda' + key);
                var contenedor6 = document.getElementById('alimentosCena' + key);

                contenedorDefault.innerHTML = '';
                contenedor1.innerHTML = '';
                contenedor2.innerHTML = '';
                contenedor3.innerHTML = '';
                contenedor4.innerHTML = '';
                contenedor5.innerHTML = '';
                contenedor6.innerHTML = '';


                for (let i = 0; i < res.length; i++) {
                    let comida = res[i]

                    cant = Object.keys(comida);
                    long = cant.length
                    for (let j = 0; j < long - 2; j++) {

                        if (i == 0) {
                            console.log(res[i]);
                            let contenido =
                                `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor1).append(contenido)
                        }
                        if (i == 1) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor2).append(contenido)
                        }
                        if (i == 2) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor3).append(contenido)
                        }
                        if (i == 3) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor4).append(contenido)
                        }
                        if (i == 4) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor5).append(contenido)
                        }
                        if (i == 5) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor6).append(contenido)
                        }
                    }

                }

            })

        }

        function opcion(key) {
            let diaSeleccionado = document.getElementById('selectorDia' + key).value;

            let container = document.getElementById('containerDA'+key);
            $(container).show();

            $.ajax({
                url: "{{ route('dieta.traerAlimentos') }}",
                dataType: "json",
                data: {
                    dieta_id: dietaid,
                    paciente_id: pacienteid,
                    diaSeleccionado: diaSeleccionado
                }
            }).done(function(res) {

                console.log('res es:',res);
                // let arreglo = JSON.parse(res)
                // console.log(arreglo)

                var contenedor1 = document.getElementById('alimentosDesayunoDA' + key);
                var contenedor2 = document.getElementById('alimentosColacion1DA' + key);
                var contenedor3 = document.getElementById('alimentosAlmuerzoDA' + key);
                var contenedor4 = document.getElementById('alimentosColacion2DA' + key);
                var contenedor5 = document.getElementById('alimentosMeriendaDA' + key);
                var contenedor6 = document.getElementById('alimentosCenaDA' + key);


                contenedor1.innerHTML = '';
                contenedor2.innerHTML = '';
                contenedor3.innerHTML = '';
                contenedor4.innerHTML = '';
                contenedor5.innerHTML = '';
                contenedor6.innerHTML = '';


                for (let i = 0; i < res.length; i++) {
                    let comida = res[i]
                        console.log('ress');

                    cant = Object.keys(comida);
                    long = cant.length
                    for (let j = 0; j < long - 2; j++) {
                        console.log('long-2');
                        if (i == 0) {
                            // console.log('lfkdfdlflkadlk')
                                let contenido =
                                    `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                                $(contenedor1).append(contenido)
                        }
                        if (i == 1) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor2).append(contenido)
                        }
                        if (i == 2) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor3).append(contenido)
                        }
                        if (i == 3) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor4).append(contenido)
                        }
                        if (i == 4) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor5).append(contenido)
                        }
                        if (i == 5) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor6).append(contenido)
                        }
                    }
                }


            })


        }

        function obtenerIdPaciente(idpaciente) {
            pacienteid = idpaciente;
        }

        function obtenerIdDieta(iddieta) {
            dietaid = iddieta;
        }
    </script>
@endsection
