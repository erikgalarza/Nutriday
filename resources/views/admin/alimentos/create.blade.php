@extends('admin.dashboard')
@section('contenido')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('administracion/css/asignarAlimentosDieta.css') }}"> --}}
    {{-- <link rel="stylesheet" href="dias.css"> --}}

    <style>
        .swal-modal .swal-text {
            text-align: center;
        }

        .swal-footer {
            text-align: center;
        }
    </style>
    <div class="page-header mb-2" style="display:flex; text-align:center; justify-content:center; align-items:center;">
        <div>
            <h3 class="page-title">
                Crear dieta
            </h3>
        </div>
        @if (isset($paciente))
            <input type="hidden" id="paciente_id" value="{{ $paciente['id'] }}">
        @endif

        {{-- para saber quien esta emitiendo la dieta --}}
        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
        {{-- para obtener el contenido de la dieta en js --}}
        {{-- <input type="hidden" name="semana" id="semana" value="{{ $semana }}"> --}}

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dieta.index')}}">Dietas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alimentos</li>
            </ol>
        </nav>
    </div>
    @if (isset($paciente))
        <style>
            @media (max-width:992px) {
                .consulta {
                    order: 2;
                }
            }
        </style>
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card ">
                <div class="mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
                    <h3
                        class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                        Paciente {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
                </div>
                <div class="row px-4" style="margin-top:10px;">

                    <div class="col-lg-6 grid-margin stretch-card consulta ">
                        <div class="card m">
                            <div class="card-body text-center py-2 row justify-content-lg-center">

                                <div class="col-12 row justify-content-center">
                                    <div class=" col-12 row justify-content-center"
                                        style="border-bottom:1px solid;max-width:345px">
                                        <div class="col-6 col-lg-12 col-xl-6  p-0 ">
                                            <label class="col-form-label" style="font-size:16px;font-weight:bold">
                                                Última consulta:</label>
                                        </div>
                                        @foreach ($paciente->dato_antropometrico as $kp => $data)
                                            @if ($loop->last)
                                                <div class="col-6 col-lg-12 col-xl-6 no-gutters p-0 text-center ">
                                                    <label class="col-form-label"
                                                        style=";font-size:16px">{{ date('Y-m-d',strtotime($data->created_at)) }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <style>
                                    @media (max-width:992px) {
                                        .contenedor {
                                            max-width: 360px !important;
                                            padding-left: 2rem !important;
                                        }
                                    }

                                    @media (min-width:992px) {
                                        .contenedor2 {
                                            max-width: 290px !important;
                                            padding-left: 0rem !important;
                                        }
                                    }
                                </style>
                                <div class="container mt-3 contenedor contenedor2" style="">
                                    <div class="col-lg-12 col-10 text-left ml-4 p-0">
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Tipo diabetes:</strong></label>
                                            <label class="col-7">{{ $paciente->tipo_diabetes }}</label>
                                        </div>
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"> <strong>Edad:</strong></label>
                                            <label class="col-7">{{ $paciente->edad }}</label>
                                        </div>

                                        @foreach ($paciente->dato_antropometrico as $kp => $data)
                                            @if ($loop->last)
                                                <div class="form-group row mb-1">
                                                    <label class="col-5 text-left"><strong>Altura:</strong></label>
                                                    <label class="col-7">{{ $data->altura }} (m)</label>
                                                </div>
                                                <div class="form-group row mb-1">
                                                    <label class="col-5 text-left"><strong>Peso:</strong></label>
                                                    <label class="col-7">{{ $data->peso }} (kg)</label>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label class="col-5 text-left"><strong>Grasa corporal:</strong>
                                                    </label>
                                                    <label class="col-7">{{ $data->grasa_corporal }} (%)</label>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label class="col-5 text-left"><strong>Masa muscular:</strong></label>
                                                    <label class="col-7">{{ $data->masa_muscular }} (%) </label>
                                                </div>

                                                @if ($data->imc <= 18.4)
                                                    <div class="form-group row mb-1">
                                                        <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                        <label class="col-7">{{ $data->imc }} (Bajo peso)</label>
                                                    </div>
                                                @endif
                                                @if ($data->imc >= 18.5 && $data->imc <= 24.9)
                                                    <div class="form-group row mb-1">
                                                        <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                        <label class="col-7">{{ $data->imc }} (Normal)</label>
                                                    </div>
                                                @endif
                                                @if ($data->imc >= 25 && $data->imc <= 29.9)
                                                    <div class="form-group row mb-1">
                                                        <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                        <label class="col-7">{{ $data->imc }} (Sobrepeso)</label>
                                                    </div>
                                                @endif

                                                @if ($data->imc >= 30)
                                                    <div class="form-group row mb-1">
                                                        <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                        <label class="col-7">{{ $data->imc }} (Obeso)</label>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <img src="http://localhost:8000/img/icons/scale.png">
                                    Peso (Kg)
                                </h4>

                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-1 pb-3  text-center">
                    <a onclick="guardarDieta();" class="btn btn-warning "><i class="fa-solid fa-floppy-disk mr-2"></i>
                        Guardar dieta</a>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card ">
                <div class="mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
                    <h3
                        class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                        Datos de dieta predifinida</h3>
                </div>
                <div class="row px-4" style="margin-top:10px;">

                    <div class="col-lg-6 grid-margin stretch-card consulta ">
                        <div class="card ">
                            <div class="card-body text-center py-2 row justify-content-lg-center">

                                <div class="col-12 row justify-content-center">
                                    <div class=" col-12 row justify-content-center"
                                        style="border-bottom:1px solid;max-width:345px">
                                        <div class="col-6  col-xl-6  p-0 ">
                                            <label class="col-form-label" style="font-size:16px;font-weight:bold">
                                                Nombre dieta:</label>
                                        </div>
                                        <div class="col-6  col-xl-6 no-gutters p-0 text-center ">
                                            <label class="col-form-label"
                                                style=";font-size:16px">{{ $dieta->nombre }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    @media (max-width:992px) {
                                        .contenedor {
                                            max-width: 360px !important;
                                            padding-left: 2rem !important;
                                        }
                                    }

                                    @media (min-width:992px) {
                                        .contenedor2 {
                                            max-width: 290px !important;
                                            padding-left: 0rem !important;
                                        }
                                    }
                                </style>
                                <div class="container mt-3 contenedor contenedor2" style="">
                                    <div class="col-lg-12 col-10 text-left ml-4 p-0">
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Tipo diabetes:</strong></label>
                                            @if ($dieta->tipo_diabetes == 3)
                                                <label class="col-7">Tipo Gestacional</label>
                                            @else
                                                <label
                                                    class="col-7">Tipo{{ number_format($dieta->tipo_diabetes, 0) }}</label>
                                            @endif

                                        </div>
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"> <strong>IMC:</strong></label>
                                            @if ($dieta->imc == '1')
                                                <label class="col-7">(Bajo peso)</label>
                                            @endif
                                            @if ($dieta->imc == '2')
                                                <label class="col-7">(Normal)</label>
                                            @endif
                                            @if ($dieta->imc == '3')
                                                <label class="col-7">(Sobrepeso)</label>
                                            @endif
                                            @if ($dieta->imc == '4')
                                                <label class="col-7">(Obeso)</label>
                                            @endif
                                        </div>
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Fecha creación:</strong></label>
                                            <label class="col-7">{{ date('Y-m-d',strtotime($dieta->created_at)) }}</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row mb-1">
                                    <label class="col-12 col-xl-4 text-left"> <strong>Observaciones:</strong></label>
                                    <label
                                        class="col-12 col-xl-8 text-justify">{{ $dieta->observaciones }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-1 pb-3  text-center">
                    <a onclick="guardarDieta();" class="btn btn-warning "><i class="fa-solid fa-floppy-disk mr-2"></i>
                        Guardar dieta</a>
                </div>
            </div>
        </div>
    @endif


    <style>
        .ddd:hover {
            border: 1px solid #4b6ac3 !important;
        }

        .buscador {
            border-radius: 0px 10px 0 10px !important;
            background-color: #F0F0F0 !important;
        }
    </style>

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">

                <style>
                    li.navi:last-child {
                        margin-right: 0;
                    }


                    @media (min-width: 1208px) and (max-width:1348px){
                        .containere{
                            max-width: 848px;
                        }
                    }
                    @media (min-width: 814px) and (max-width:991px){
                        .containere{
                            max-width: 848px;
                        }
                    }
                </style>
                <div class="modal fade" id="exampleModal{{ $dieta->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="POST" id="crearDieta" action="{{ route('dieta.crearDieta') }}">

                            @csrf
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#4b6ac3">
                                    <h5 class="modal-title text-lg-center text-white"
                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                        id="ModalLabel">Datos de la dieta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body py-2 px-0">
                                    <div class="col-12 row m-0 mt-3 justify-content-center">
                                        <div class="col-sm-10 col-11 text-left">
                                            <div class="form-group row mb-1 ">
                                                <label class="col-sm-4 col-form-label"
                                                    for="recipient-name"><strong>Nombre:</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre de la dieta">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-1 ">
                                                <label class="col-sm-4 col-form-label" for="recipient-name"><strong>Fecha
                                                        de fin:</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="fecha_fin" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-1 ">
                                                <label class="col-sm-4 col-form-label" for="recipient-name"><strong>Tipo
                                                        de diabetes:</strong></label>
                                                <div class="col-sm-8">
                                                    <select name="tipo_diabetes" class="form-control" style="background-color:#F0F0F0">
                                                        <option selected disabled>Seleccione un tipo</option>
                                                        <option value="1">Tipo 1</option>
                                                        <option value="2">Tipo 2</option>
                                                        <option value="3">Gestacional</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-1 ">
                                                <label class="col-sm-4 col-form-label"
                                                    for="recipient-name"><strong>IMC:</strong></label>
                                                <div class="col-sm-8">
                                                    <select name="imc" class="form-control" style="background-color:#F0F0F0">
                                                        <option selected disabled>Seleccione una opción</option>
                                                        <option value="1">Bajo peso</option>
                                                        <option value="2">Normal</option>
                                                        <option value="3">Sobrepeso</option>
                                                        <option value="4">Obeso</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-1 ">
                                                <label class="col-sm-4 col-form-label"
                                                    for="recipient-name"><strong>Observaciones:</strong></label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="observaciones" rows="5" placeholder="Dejar en blanco si no existen observaciones"></textarea>
                                                </div>
                                            </div>

                                            <input type="hidden" name="semanaNueva" id="semana1">

                                        </div>
                                        <div
                                            class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                            <div class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                                                <a onclick="crearDieta();"
                                                    class="btn btn-success mb-2 col-12 col-sm-5">Guardar</a>
                                                <button type="button" class="btn btn-light mb-2 col-12 col-sm-5"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <style>
                    li.navi:last-child {
                        margin-right: 0;
                    }
                </style>
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center">
                            <ul class="nav nav-pills containere nav-pills-success text-center row justify-content-center align-items-center mt-2"
                            id="pills-tab" role="tablist" style="border:none;font-weight: bold">
                            @php
                                $dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                            @endphp

                            @for ($i = 0; $i <= 6; $i++)
                                <li class="nav-item my-2 text-center navi" style="min-width:123.5px;font-weight:bold">
                                    <a class="nav-link {{ $i == 0 ? 'active' : '' }}" style=";border:1px solid #04B76B"
                                        id="pills-dia{{ $i }}-tab" data-toggle="pill"
                                        href="#pills-dia{{ $i }}" role="tab"
                                        aria-controls="pills-dia{{ $i }}"
                                        aria-selected="true">{{ $dias[$i] }}</a>
                                </li>
                            @endfor
                        </ul>

                    </div>
                </div>


                @php
                    $comidas = [' DESAYUNO', 'COLACIÓN DE LA MAÑANA', 'ALMUERZO', 'COLACIÓN DE LA TARDE', 'MERIENDA', 'CENA'];
                @endphp
                <div class="card mt-2" style="border:none">
                    <div class="tab-content py-0 px-lg-5 px-0" id="pills-tabContent" style="border:none;">
                        @php
                            $a = -6;
                            $sum = 0;
                            $id = -2;
                            $id2 = -1;
                        @endphp
                        @for ($j = 0; $j <= 6; $j++)
                            <div class="tab-pane fade {{ $j == 0 ? 'show active' : '' }} "
                                id="pills-dia{{ $j }}" role="tabpanel"
                                aria-labelledby="pills-dia{{ $j }}-tab">
                                <div class="accordion accordion-solid-header" id="accordion-{{ $j }}"
                                    role="tablist">
                                    @php
                                        $a = $a + 6;
                                        $sum = $sum + 6;
                                        $f = $sum;
                                        $cont = -1;
                                    @endphp
                                    @for ($k = $a; $k < $f; $k++)
                                        @php
                                            $cont = $cont + 1;
                                            $id = $id + 2;
                                            $id2 = $id + 1;
                                        @endphp
                                        {{-- CREACION DE ACORDIONES EMPIEZA AQUI --}}
                                        <div class="card "style="background-color:white;color:black">
                                            <div class="card-header" role="tab" id="heading-{{ $k }}"
                                                style="border:1px solid #55558a;border-radius:10px">
                                                <h6 class="mb-0">
                                                    <a onclick="" data-toggle="collapse" class="collapsed"
                                                        style="font-weight: bold" href="#collapse-{{ $k }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse-{{ $k }}"><i
                                                            class="fa-solid fa-sun mr-2"></i>{{ $comidas[$cont] }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapse-{{ $k }}" class="collapse" role="tabpanel"
                                                aria-labelledby="heading-{{ $k }}"
                                                data-parent="#accordion-{{ $j }}">
                                                <div class="card-body pt-2">

                                                    {{-- <p>VALOR DE K: {{ $k }}</p> --}}
                                                    <input type="hidden" id="dieta_id" value="{{ $dieta->id }}">
                                                    <div>
                                                        <div>
                                                            <div class="container">

                                                                <label class="col-12 text-left"><button
                                                                        class="ml-3 py-0 px-2" disabled
                                                                        title="No se puede ingresar dos veces el mismo alimento"
                                                                        style="border-radius:10px; border:1px solid grey"><i
                                                                            class="fas fa-info"></i></button>
                                                                </label>
                                                                <div class="container_buscador_desayuno ">
                                                                    <div class="row justify-content-center col-12">
                                                                                <a class="btn" disabled
                                                                                style="background-color:white;border-radius:5px;margin-right:-14px;border-top:1px solid #e0e0ef;border-bottom:1px solid #e0e0ef;border-left:1px solid #e0e0ef">
                                                                                <i class="fa-solid fa-magnifying-glass" style="color:#6d6d6d"></i>
                                                                    </a>
                                                                        <div class=" col-8">
                                                                            <select
                                                                                id="alimentoSeleccionado{{ $k }}"
                                                                                onchange="agregarAlimento({{ $k }});"
                                                                                class=" js-example-basic-multiple ">
                                                                                <option selected disabled>Ingrese el nombre
                                                                                    de un alimento o seleccione...Ejm:
                                                                                    manzana</option>
                                                                                @foreach ($alimentos as $alimento)
                                                                                    <option value="{{ $alimento->id }}">
                                                                                        {{ $alimento->nombre }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>




                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <style>
                                                        @media (max-width:720px){
                                                            .alimentosss{
                                                                max-width: 350px !important;
                                                                overflow-x: scroll !important;
                                                            }
                                                        }
                                                        @media (max-width:879px){
                                                            .linea{
                                                                min-width: 350px !important;
                                                            }

                                                        }
                                                        @media (min-width:879px){
                                                            .linea{
                                                                min-width: auto !important;
                                                            }

                                                        }
                                                    </style>

                                                    <div style="display:flex; justify-content:space-around; flex-wrap:wrap; margin-top:30px;">
                                                        <div>
                                                            <div class="table-responsive alimentosss">
                                                                <form method="POST" id="tablaAlimentos">
                                                                    @csrf
                                                                    <input type="hidden" id="alimento_id_eliminar"
                                                                        name="alimento_id_eliminar">
                                                                    <input type="hidden" id="dieta_id" name="dieta_id"
                                                                        value="{{ $dieta->id }}">
                                                                    <table id="table" class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="6" scope="col"
                                                                                    style="text-align:center;">
                                                                                    ALIMENTOS
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Porciones
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Imagen
                                                                                </th>
                                                                                <th
                                                                                    class="nombre_alimento titulos_tabla_totales">
                                                                                    Nombre
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Peso
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Acciones</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody id="tbody{{ $k }}">

                                                                        </tbody>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                        </div>


                                                        <div class="  ml-4">
                                                            <div class=" mt-5 linea position-relative" style="border:1px #000 solid; border-radius:10px;">
                                                                <a style="top: 5px; left: 250px;" title="Aquí se encuentra la sumatoria de la información nutricional de los alimentos agregados a la tabla de la comida seleccionada" class=" position-absolute btn btn-primary btn-rounded p-0 m-0 col-1" disabled> <i class="fas fa-info" style="font-size:12px"></i></a>
                                                                <div class="row justify-content-center px-5 py-4 ">
                                                                    <div class="Titulo text-center col-12  mb-3" style="font-weight:700; font-size:14px;">
                                                                          <h5><u>TOTALES</u></h5>
                                                                    </div>
                                                                    <div style="display:flex; flex-direction:row; flex-wrap:wrap;">
                                                                        <div class="Info">
                                                                            <div class="item">
                                                                                <strong>Carbohidrato:</strong>
                                                                            </div>
                                                                            <div class="item">
                                                                                <strong>Grasa:</strong>
                                                                            </div>
                                                                            <div class="item">
                                                                                <strong>Proteina:</strong>
                                                                            </div>
                                                                            <div class="item">
                                                                                <strong>Kcal:</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="valores ml-3">
                                                                            <div class="val">
                                                                                <strong id="totalCarbohidrato{{ $k }}">0</strong>
                                                                            </div>
                                                                            <div class="val">
                                                                                <strong id="totalGrasa{{ $k }}">0</strong>
                                                                            </div>
                                                                            <div class="val">
                                                                                <strong id="totalProteina{{ $k }}">0</strong>
                                                                            </div>
                                                                            <div class="val">
                                                                                <strong id="totalKcal{{ $k }}">0</strong>
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
                                    @endfor



                                    <style>
                                        .resultado {
                                            margin: 50px 0px 0px -100px;
                                            background-color: #dce7e7;
                                            color: whit;
                                            border-radius: 10px;
                                            border: 1px solid #dce7e7;
                                            bottom: 0;

                                            width: 100%;
                                            position: fixed;
                                            z-index: 1;
                                        }
                                    </style>

                                    <div class="resultado"
                                        style="display:flex;  flex-wrap:wrap; justify-content:space-evenly; align-items:center">
                                        <div class="info_total" style="padding-top:10px; width:70%; text-align:center;">

                                            <div class="cuadro_informacion"
                                                style="display:flex; flex-wrap:wrap; justify-content:space-evenly; align-items:center; flex-direction:row; margin-top:5px;; padding:10px 10px; text-align:center; min-height: 30px; min-width: 100px;">
                                                <div>
                                                    <p
                                                        style="border-bottom:1px solid;font-size:14px;font-weight:bold;text-transform:uppercase">
                                                        TOTAL {{ $dias[$j] }}</p>
                                                </div>
                                                <div>
                                                    <p
                                                        style="margin-right:10px;font-size:14px;font-weight:bold;text-transform:uppercase">
                                                        Carbohidratos:<i
                                                            style="font-weight:400;font-size:14px;font-style:normal;"
                                                            class="ml-4"
                                                            id="carbohidratosTotal{{ $j }}">0</i></p>
                                                </div>
                                                <div>
                                                    <p><strong
                                                            style="margin-right:10px;font-size:14px;text-transform:uppercase">Grasas:</strong><i
                                                            style="font-weight:400;font-size:14px;font-style:normal;"
                                                            class="ml-4" id="grasasTotal{{ $j }}">0</i></p>
                                                </div>
                                                <div>
                                                    <p><strong
                                                            style="margin-right:10px;font-size:14px;text-transform:uppercase">Proteinas:</strong><i
                                                            style="font-weight:400;font-size:14px;font-style:normal;"
                                                            class="ml-4" id="proteinasTotal{{ $j }}">0</i>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p><strong
                                                            style="margin-right:10px;font-size:14px;text-transform:uppercase">Kcal:</strong><i
                                                            style="font-weight:400;font-size:14px;font-style:normal;"
                                                            class="ml-4 mr-1"
                                                            id="kcalTotal{{ $j }}">0</i>/1500</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="botones" style="display:flex; justify-content:space-evenly;">
                                            <a onclick="" class="btn btn-outline-success mx-2"
                                                title="Guardar selección"><i class="fas fa-check"></i></a>
                                            <a onclick="" class="btn btn-outline-warning"
                                                title="Cambiar selección"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>

        var alimentosLunes = [],
            alimentosMartes = [],
            alimentosMiercoles = [],
            alimentosJueves = [],
            alimentosViernes = [],
            alimentosSabado = [];
        alimentosDomingo = [];
        var nombreMedidas = [" (gr)", " (lb)", " (kg)", " (ml)", " (lt)"]
        var nombreComidas = ['desayuno', 'colacion1', 'almuerzo', 'colacion2', 'merienda', 'cena']
        var fila = 0;
        var semana = {};

        document.body.onload = function() {


            var dieta_id = document.getElementById('dieta_id').value
            // var semana = JSON.parse(document.getElementById('semana').value);
            console.log(semana)
            // cargarDias(semana)
        }

        function crearDieta() {
            semana = {
                alimentosLunes,
                alimentosMartes,
                alimentosMiercoles,
                alimentosJueves,
                alimentosViernes,
                alimentosSabado,
                alimentosDomingo
            }
            document.getElementById('semana1').value = JSON.stringify(semana);
            let form = document.getElementById('crearDieta')
            form.submit();
        }

        function guardarDieta() {

          // console.log('content lunes:',lunes)
          // console.log('content martes:',martes)
          var semana = {};

          semana = {
              alimentosLunes,
              alimentosMartes,
              alimentosMiercoles,
              alimentosJueves,
              alimentosViernes,
              alimentosSabado,
              alimentosDomingo
          }
          const dieta_id = document.getElementById('dieta_id').value;
          const paciente_id = document.getElementById('paciente_id') ? document.getElementById('paciente_id').value : null;
          const user_id = document.getElementById('user_id').value;
          // alert(paciente_id);
          console.log('semana:', semana)
          $.ajax({
              url: "{{ route('dieta.guardarDieta') }}",
              dataType: "json",
              data: {
                  semana: JSON.stringify(semana),
                  dieta_id: dieta_id,
                  paciente_id: paciente_id,
                  user_id: user_id
              }
          }).done(function(res) {
              if (res == true)
                  window.location.href = "/dashboard/asignar-dieta";
          })
      }

        function guardarCambios() {


            semana = {
                alimentosLunes,
                alimentosMartes,
                alimentosMiercoles,
                alimentosJueves,
                alimentosViernes,
                alimentosSabado,
                alimentosDomingo
            }

            const dieta_id = document.getElementById('dieta_id').value;
            // const paciente_id = document.getElementById('paciente_id').value;
            // const user_id = document.getElementById('user_id').value;

            console.log('semana:', semana)
            $.ajax({
                url: "{{ route('dieta.guardarDietaNueva') }}",
                dataType: "json",
                data: {
                    semana: JSON.stringify(semana),
                    dieta_id: dieta_id
                }
            }).done(function(res) {
                if (res == true)
                    window.location.href = "/dashboard/asignar-dieta";
            })
        }

        function alimentoRepetido(alimento, id, dia, idDia) //alimento y idacordion
        {
            console.log('id recibido:', id)
            let respuesta = true;
            let nombreComidas = ['desayuno', 'colacion1', 'almuerzo', 'colacion2', 'merienda', 'cena']

            let cant = Object.keys(dia);
            let long = cant.length;

            let alimentos = [];

            for (let i = 0; i < long; i++) {
                if (dia[i].horario === nombreComidas[id] && alimento.id === dia[i].id) {
                    swal({
                        title: "Atención",
                        text: "El alimento " + alimento.nombre + " ya se encuentra agregado en " + nombreComidas[
                            id],
                        icon: "info",
                        // buttons: [
                        //     'No, cancelar',
                        //     'Si, aceptar'
                        // ],
                    })
                    respuesta = false;
                }
            }
            return respuesta;
        }

        function iterarCalculoCantidad(dia, id, c1, c2, c3, c4, c5, c6) {
            console.log('contenido del dia:',dia)
            let cant = Object.keys(dia);
            let long = cant.length;
            let arregloCantidades = []

            let tbody = document.querySelectorAll('#tbody' + id + '>tr>td')
            console.log(tbody)
            for (let x = 0; x < tbody.length; x++) {
                if (x == 0 || x % 5 == 0) {
                    let select = tbody[x].childNodes[1].value;
                    console.log(select)
                    arregloCantidades.push(select)
                }
            }
            console.log(arregloCantidades)

            let desayunos = [],
                colacion1 = [],
                almuerzos = [],
                colacion2 = [],
                meriendas = [],
                cenas = []
            let alimentos = [],
                desayuno2 = [];

            for (let j = 0; j < long; j++) //contenido de lunes, tiene los alimentos
            {
                if (dia[j].horario === "desayuno") {
                    desayunos.push(dia[j])
                    // cont++;
                }

                if (dia[j].horario === "colacion1") {
                    colacion1.push(dia[j])
                }
                if (dia[j].horario === "almuerzo") {
                    almuerzos.push(dia[j])
                }
                if (dia[j].horario === "colacion2") {
                    colacion2.push(dia[j])
                }
                if (dia[j].horario === "merienda") {
                    meriendas.push(dia[j])
                }
                if (dia[j].horario === "cena") {
                    cenas.push(dia[j])
                }
            }

            if (desayunos.length === arregloCantidades.length && id == c1) {
                let totalCb = 0,
                    totalGrasa = 0,
                    totalPro = 0,
                    totalKcal = 0;
                for (let a = 0; a < arregloCantidades.length; a++) {
                    totalCb = Number(totalCb) + Number(desayunos[a].carbohidrato) * arregloCantidades[a];
                    totalGrasa = Number(totalGrasa) + Number(desayunos[a].grasa) * arregloCantidades[a];
                    totalPro = Number(totalPro) + Number(desayunos[a].proteina) * arregloCantidades[a];
                    totalKcal = Number(totalKcal) + Number(desayunos[a].valor_calorico) * arregloCantidades[a];

                    desayunos[a].cantidad = arregloCantidades[a];
                }

                document.getElementById('totalCarbohidrato' + id).textContent = totalCb;
                document.getElementById('totalGrasa' + id).textContent = totalGrasa;
                document.getElementById('totalProteina' + id).textContent = totalPro;
                document.getElementById('totalKcal' + id).textContent = totalKcal;
            }




            if (colacion1.length === arregloCantidades.length && id == c2) {

                let totalCb = 0,
                    totalGrasa = 0,
                    totalPro = 0,
                    totalKcal = 0;
                for (let a = 0; a < arregloCantidades.length; a++) {
                    totalCb = Number(totalCb) + Number(colacion1[a].carbohidrato) * arregloCantidades[a];
                    totalGrasa = Number(totalGrasa) + Number(colacion1[a].grasa) * arregloCantidades[a];
                    totalPro = Number(totalPro) + Number(colacion1[a].proteina) * arregloCantidades[a];
                    totalKcal = Number(totalKcal) + Number(colacion1[a].valor_calorico) * arregloCantidades[a];
                    colacion1[a].cantidad = arregloCantidades[a];
                }
                document.getElementById('totalCarbohidrato' + id).textContent = totalCb;
                document.getElementById('totalGrasa' + id).textContent = totalGrasa;
                document.getElementById('totalProteina' + id).textContent = totalPro;
                document.getElementById('totalKcal' + id).textContent = totalKcal;


            }

            if (almuerzos.length === arregloCantidades.length && id == c3) {
                let totalCb = 0,
                    totalGrasa = 0,
                    totalPro = 0,
                    totalKcal = 0;
                for (let a = 0; a < arregloCantidades.length; a++) {

                    totalCb = Number(totalCb) + Number(almuerzos[a].carbohidrato) * arregloCantidades[a];
                    totalGrasa = Number(totalGrasa) + Number(almuerzos[a].grasa) * arregloCantidades[a];
                    totalPro = Number(totalPro) + Number(almuerzos[a].proteina) * arregloCantidades[a];
                    totalKcal = Number(totalKcal) + Number(almuerzos[a].valor_calorico) * arregloCantidades[a];
                    almuerzos[a].cantidad = arregloCantidades[a];
                }
                document.getElementById('totalCarbohidrato' + id).textContent = totalCb;
                document.getElementById('totalGrasa' + id).textContent = totalGrasa;
                document.getElementById('totalProteina' + id).textContent = totalPro;
                document.getElementById('totalKcal' + id).textContent = totalKcal;
            }

            // colacion 2

            console.log('colacion2:' + colacion2.length + '- ' + arregloCantidades.length)
            if (colacion2.length === arregloCantidades.length && id == c4) {
                let totalCb = 0,
                    totalGrasa = 0,
                    totalPro = 0,
                    totalKcal = 0;
                for (let a = 0; a < arregloCantidades.length; a++) {
                    totalCb = Number(totalCb) + Number(colacion2[a].carbohidrato) * arregloCantidades[a];
                    totalGrasa = Number(totalGrasa) + Number(colacion2[a].grasa) * arregloCantidades[a];
                    totalPro = Number(totalPro) + Number(colacion2[a].proteina) * arregloCantidades[a];
                    totalKcal = Number(totalKcal) + Number(colacion2[a].valor_calorico) * arregloCantidades[a];
                    colacion2[a].cantidad = arregloCantidades[a];
                }
                document.getElementById('totalCarbohidrato' + id).textContent = totalCb;
                document.getElementById('totalGrasa' + id).textContent = totalGrasa;
                document.getElementById('totalProteina' + id).textContent = totalPro;
                document.getElementById('totalKcal' + id).textContent = totalKcal;

            }

            if (meriendas.length === arregloCantidades.length && id == c5) {
                let totalCb = 0,
                    totalGrasa = 0,
                    totalPro = 0,
                    totalKcal = 0;
                for (let a = 0; a < arregloCantidades.length; a++) {

                    totalCb = Number(totalCb) + Number(meriendas[a].carbohidrato) * arregloCantidades[a];
                    totalGrasa = Number(totalGrasa) + Number(meriendas[a].grasa) * arregloCantidades[a];
                    totalPro = Number(totalPro) + Number(meriendas[a].proteina) * arregloCantidades[a];
                    totalKcal = Number(totalKcal) + Number(meriendas[a].valor_calorico) * arregloCantidades[a];
                    meriendas[a].cantidad = arregloCantidades[a];
                }
                document.getElementById('totalCarbohidrato' + id).textContent = totalCb;
                document.getElementById('totalGrasa' + id).textContent = totalGrasa;
                document.getElementById('totalProteina' + id).textContent = totalPro;
                document.getElementById('totalKcal' + id).textContent = totalKcal;
            }

            console.log('cenas:' + cenas.length + '- ' + arregloCantidades.length)
            if (cenas.length === arregloCantidades.length && id == c6) {

                let totalCb = 0,
                    totalGrasa = 0,
                    totalPro = 0,
                    totalKcal = 0;
                for (let a = 0; a < arregloCantidades.length; a++) {
                    totalCb = Number(totalCb) + Number(cenas[a].carbohidrato) * arregloCantidades[a];
                    totalGrasa = Number(totalGrasa) + Number(cenas[a].grasa) * arregloCantidades[a];
                    totalPro = Number(totalPro) + Number(cenas[a].proteina) * arregloCantidades[a];
                    totalKcal = Number(totalKcal) + Number(cenas[a].valor_calorico) * arregloCantidades[a];
                    cenas[a].cantidad = arregloCantidades[a];
                }
                document.getElementById('totalCarbohidrato' + id).textContent = totalCb;
                document.getElementById('totalGrasa' + id).textContent = totalGrasa;
                document.getElementById('totalProteina' + id).textContent = totalPro;
                document.getElementById('totalKcal' + id).textContent = totalKcal;

            }

            let arr = []
            // let lunesFalso = Object.assign(desayunos,colacion1,almuerzos,colacion2,meriendas,cenas)
            let diaFalso = arr.concat(desayunos, colacion1, almuerzos, colacion2, meriendas, cenas)
            if (id >= 0 && id < 6) {
                alimentosLunes = diaFalso;
                console.log('content:', alimentosLunes)
            }
            if (id >= 6 && id < 12) {
                alimentosMartes = diaFalso;
                console.log('content:', alimentosMartes)
            }
            if (id >= 12 && id < 18) {
                alimentosMiercoles = diaFalso;
                console.log('content:', alimentosMiercoles)
            }
            if (id >= 18 && id < 24) {
                alimentosJueves = diaFalso;
                console.log('content:', alimentosJueves)
            }
            if (id >= 24 && id < 30) {
                alimentosViernes = diaFalso;
                console.log('content:', alimentosViernes)
            }
            if (id >= 30 && id < 36) {
                alimentosSabado = diaFalso;
                console.log('content:', alimentosSabado)
            }
            if (id >= 36 && id < 42) {
                alimentosDomingo = diaFalso;
                console.log('content:', alimentosDomingo)
            }

            sumarResultados(); //total bottom
        }

        function seleccionarCantidad(id, alimento_id, select_id) {
            console.log(id,alimento_id,select_id)
            var cantidad = document.getElementById('selectCantidad' + select_id).value;

            if (id >= 0 && id < 6) // lunes
            {
                iterarCalculoCantidad(alimentosLunes, id, 0, 1, 2, 3, 4, 5);
            }

            if (id >= 6 && id < 12) {

                iterarCalculoCantidad(alimentosMartes, id, 6, 7, 8, 9, 10, 11);
            }

            if (id >= 12 && id < 18) {
                iterarCalculoCantidad(alimentosMiercoles, id, 12, 13, 14, 15, 16, 17);
            }

            if (id >= 18 && id < 24) {
                iterarCalculoCantidad(alimentosJueves, id, 18, 19, 20, 21, 22, 23);
            }

            if (id >= 24 && id < 30) {
                iterarCalculoCantidad(alimentosViernes, id, 24, 25, 26, 27, 28, 29);
            }

            if (id >= 30 && id < 36) {
                iterarCalculoCantidad(alimentosSabado, id, 30, 31, 32, 33, 34, 35);
            }

            if (id >= 36 && id < 42) {
                iterarCalculoCantidad(alimentosDomingo, id, 36, 37, 38, 39, 40, 41);
            }
        }


        function eliminarAlimento(id, fila, alimento_id) {
            console.log('eliminar alimento')
            $('#fila' + fila).remove();

            // CARGA DE ALIMENTOS DEL DIA LUNES
            if (id >= 0 && id < 6) {
                let cant = Object.keys(alimentosLunes);
                let long = cant.length;
                let contAlimentoRepetido = true;

                console.log('long:', long)
                for (let j = 0; j < long; j++) //contenido de lunes, tiene los alimentos
                {
                    for (let c = 0; c < 6; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosLunes[j]?.id === alimento_id && alimentosLunes[j]?.horario ===
                                nombreComidas[c]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosLunes[j].carbohidrato,
                                    grasa = alimentosLunes[j].grasa,
                                    proteina = alimentosLunes[j].proteina;
                                let kcal = alimentosLunes[j].valor_calorico

                                antCB = antCB - carb * alimentosLunes[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosLunes[j].cantidad;
                                antPro = antPro - proteina * alimentosLunes[j].cantidad;
                                antKcal = antKcal - kcal * alimentosLunes[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosLunes[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosLunes[x] !== undefined)
                                        auxDia.push(alimentosLunes[x]);
                                }
                                alimentosLunes =[
                                    ...auxDia
                                ]

                                sumarResultados();
                                contAlimentoRepetido = false;
                            }
                        } //fin contAlimentoRepetido
                    }
                }
            }

            //  CARGA DE ALIMENTOS DEL DIA MARTES
            if (id >= 6 && id < 12) {
                let cant = Object.keys(alimentosMartes);
                let long = cant.length;


                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 6; c < 12; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosMartes[j]?.id === alimento_id && alimentosMartes[j]?.horario ===
                                nombreComidas[c - 6]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosMartes[j].carbohidrato,
                                    grasa = alimentosMartes[j].grasa,
                                    proteina = alimentosMartes[j].proteina;
                                let kcal = alimentosMartes[j].valor_calorico

                                antCB = antCB - carb* alimentosMartes[j].cantidad;
                                antGrasa = antGrasa - grasa* alimentosMartes[j].cantidad;
                                antPro = antPro - proteina* alimentosMartes[j].cantidad;
                                antKcal = antKcal - kcal* alimentosMartes[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosMartes[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosMartes[x] !== undefined)
                                        auxDia.push(alimentosMartes[x]);
                                }
                                alimentosMartes = [
                                    ...auxDia
                            ]

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }

            // CARGA DE ALIMENTOS DEL DIA MIERCOLES
            if (id >= 12 && id < 18) {
                let cant = Object.keys(alimentosMiercoles);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 12; c < 18; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosMiercoles[j]?.id === alimento_id && alimentosMiercoles[j]?.horario ===
                                nombreComidas[c - 12]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosMiercoles[j].carbohidrato,
                                    grasa = alimentosMiercoles[j].grasa,
                                    proteina = alimentosMiercoles[j].proteina;
                                let kcal = alimentosMiercoles[j].valor_calorico

                                antCB = antCB - carb* alimentosMiercoles[j].cantidad;
                                antGrasa = antGrasa - grasa* alimentosMiercoles[j].cantidad;
                                antPro = antPro - proteina* alimentosMiercoles[j].cantidad;
                                antKcal = antKcal - kcal* alimentosMiercoles[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosMiercoles[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosMiercoles[x] !== undefined)
                                        auxDia.push(alimentosMiercoles[x]);
                                }
                                alimentosMiercoles = [
                                    ...auxDia
                            ]

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }

            // CARGA DE ALIMENTOS DEL DIA JUEVES
            if (id >= 18 && id < 24) {
                let cant = Object.keys(alimentosJueves);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 18; c < 24; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosJueves[j]?.id === alimento_id && alimentosJueves[j]?.horario ===
                                nombreComidas[c - 18]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosJueves[j].carbohidrato,
                                    grasa = alimentosJueves[j].grasa,
                                    proteina = alimentosJueves[j].proteina;
                                let kcal = alimentosJueves[j].valor_calorico

                                antCB = antCB - carb* alimentosJueves[j].cantidad;
                                antGrasa = antGrasa - grasa* alimentosJueves[j].cantidad;
                                antPro = antPro - proteina* alimentosJueves[j].cantidad;
                                antKcal = antKcal - kcal* alimentosJueves[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosJueves[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosJueves[x] !== undefined)
                                        auxDia.push(alimentosJueves[x]);
                                }
                                alimentosJueves = [
                                    ...auxDia
                            ]

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }

            // CARGA DE ALIMENTOS DEL DIA VIERNES
            if (id >= 24 && id < 30) {
                let cant = Object.keys(alimentosViernes);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 24; c < 30; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosViernes[j]?.id === alimento_id && alimentosViernes[j]?.horario ===
                                nombreComidas[c - 24]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosViernes[j].carbohidrato,
                                    grasa = alimentosViernes[j].grasa,
                                    proteina = alimentosViernes[j].proteina;
                                let kcal = alimentosViernes[j].valor_calorico

                                antCB = antCB - carb* alimentosViernes[j].cantidad;
                                antGrasa = antGrasa - grasa* alimentosViernes[j].cantidad;
                                antPro = antPro - proteina* alimentosViernes[j].cantidad;
                                antKcal = antKcal - kcal* alimentosViernes[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosViernes[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosViernes[x] !== undefined)
                                        auxDia.push(alimentosViernes[x]);
                                }
                                alimentosViernes = [
                                    ...auxDia
                            ]

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }

            // CARGA DE ALIMENTOS DEL DIA SABADO
            if (id >= 30 && id < 36) {
                let cant = Object.keys(alimentosSabado);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 30; c < 36; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosSabado[j]?.id === alimento_id && alimentosSabado[j]?.horario ===
                                nombreComidas[c - 30]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosSabado[j].carbohidrato,
                                    grasa = alimentosSabado[j].grasa,
                                    proteina = alimentosSabado[j].proteina;
                                let kcal = alimentosSabado[j].valor_calorico

                                antCB = antCB - carb* alimentosSabado[j].cantidad;
                                antGrasa = antGrasa - grasa* alimentosSabado[j].cantidad;
                                antPro = antPro - proteina* alimentosSabado[j].cantidad;
                                antKcal = antKcal - kcal* alimentosSabado[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosSabado[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosSabado[x] !== undefined)
                                        auxDia.push(alimentosSabado[x]);
                                }
                                alimentosSabado = [
                                    ...auxDia
                            ]

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }

            // CARGA DE ALIMENTOS DEL DIA DOMINGO
            if (id >= 36 && id < 42) {
                let cant = Object.keys(alimentosDomingo);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 36; c < 42; c++) {
                        if (contAlimentoRepetido) {

                            if (id === c && alimentosDomingo[j]?.id === alimento_id && alimentosDomingo[j]?.horario ===
                                nombreComidas[c - 36]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosDomingo[j].carbohidrato,
                                    grasa = alimentosDomingo[j].grasa,
                                    proteina = alimentosDomingo[j].proteina;
                                let kcal = alimentosDomingo[j].valor_calorico

                                antCB = antCB - carb* alimentosDomingo[j].cantidad;
                                antGrasa = antGrasa - grasa* alimentosDomingo[j].cantidad;
                                antPro = antPro - proteina* alimentosDomingo[j].cantidad;
                                antKcal = antKcal - kcal* alimentosDomingo[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosDomingo[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosDomingo[x] !== undefined)
                                        auxDia.push(alimentosDomingo[x]);
                                }
                                alimentosDomingo = [
                                    ...auxDia
                            ]

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }
        }

        function eliminarAlimentoAdded(id, fila, alimento_id) {
            console.log('eliminar Alimento Added')
            console.log('valor de id:' + id + ' valor de fila:' + fila + ' valor de aliid:' + alimento_id);
            $('#filaAdd' + fila).remove();

            // CARGA DE ALIMENTOS DEL DIA LUNES
            if (id >= 0 && id < 6) {
                let cant = Object.keys(alimentosLunes);
                let long = cant.length;
                let contAlimentoRepetido = true;

                console.log('long:', long)
                for (let j = 0; j < long; j++) //contenido de lunes, tiene los alimentos
                {
                    for (let c = 0; c < 6; c++) {
                        if (contAlimentoRepetido) {
                            if (id === c && alimentosLunes[j]?.id === alimento_id && alimentosLunes[j]?.horario ===
                                nombreComidas[c]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosLunes[j].carbohidrato,
                                    grasa = alimentosLunes[j].grasa,
                                    proteina = alimentosLunes[j].proteina;
                                let kcal = alimentosLunes[j].valor_calorico

                                antCB = antCB - carb * alimentosLunes[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosLunes[j].cantidad;
                                antPro = antPro - proteina * alimentosLunes[j].cantidad;
                                antKcal = antKcal - kcal * alimentosLunes[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosLunes[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosLunes[x] !== undefined)
                                        auxDia.push(alimentosLunes[x]);
                                }
                                alimentosLunes = {
                                    ...auxDia
                                }
                                console.log(alimentosLunes)
                                sumarResultados();
                                contAlimentoRepetido = false;
                            }
                        } //fin contAlimentoRepetido
                    }
                }
            }

            // CARGA DE ALIMENTOS DEL DIA MARTES
            if (id >= 6 && id < 12) {
                let cant = Object.keys(alimentosMartes);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de martes, tiene los alimentos
                {
                    for (let c = 6; c < 12; c++) {

                        if (contAlimentoRepetido) // para que no tome en cuenta a otro alimento que esta dentro de la dieta
                        {
                            if (id === c && alimentosMartes[j]?.id === alimento_id && alimentosMartes[j]?.horario ===
                                nombreComidas[c - 6]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosMartes[j].carbohidrato,
                                    grasa = alimentosMartes[j].grasa,
                                    proteina = alimentosMartes[j].proteina;
                                let kcal = alimentosMartes[j].valor_calorico

                                antCB = antCB - carb * alimentosMartes[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosMartes[j].cantidad;
                                antPro = antPro - proteina * alimentosMartes[j].cantidad;
                                antKcal = antKcal - kcal * alimentosMartes[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosMartes[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosMartes[x] !== undefined)
                                        auxDia.push(alimentosMartes[x]);
                                }
                                alimentosMartes = {
                                    ...auxDia
                                }

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        } // fin contAliRepetido
                    }
                }
            }

            //  // CARGA DE ALIMENTOS DEL DIA MIERCOLES
            if (id >= 12 && id < 18) {
                let cant = Object.keys(alimentosMiercoles);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de miercoles, tiene los alimentos
                {
                    for (let c = 12; c < 18; c++) {

                        if (contAlimentoRepetido) // para que no tome en cuenta a otro alimento que esta dentro de la dieta
                        {
                            if (id === c && alimentosMiercoles[j]?.id === alimento_id && alimentosMiercoles[j]?.horario ===
                                nombreComidas[c - 12]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosMiercoles[j].carbohidrato,
                                    grasa = alimentosMiercoles[j].grasa,
                                    proteina = alimentosMiercoles[j].proteina;
                                let kcal = alimentosMiercoles[j].valor_calorico

                                antCB = antCB - carb * alimentosMiercoles[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosMiercoles[j].cantidad;
                                antPro = antPro - proteina * alimentosMiercoles[j].cantidad;
                                antKcal = antKcal - kcal * alimentosMiercoles[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosMiercoles[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosMiercoles[x] !== undefined)
                                        auxDia.push(alimentosMiercoles[x]);
                                }
                                alimentosMiercoles = {
                                    ...auxDia
                                }

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        } //fin contalimrepet
                    }
                }
            }

            //    // CARGA DE ALIMENTOS DEL DIA JUEVES
            if (id >= 18 && id < 24) {
                let cant = Object.keys(alimentosJueves);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de miercoles, tiene los alimentos
                {
                    for (let c = 18; c < 24; c++) {
                        if (contAlimentoRepetido) // para que no tome en cuenta a otro alimento que esta dentro de la dieta
                        {
                            if (id === c && alimentosJueves[j]?.id === alimento_id && alimentosJueves[j]?.horario ===
                                nombreComidas[c - 18]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosJueves[j].carbohidrato,
                                    grasa = alimentosJueves[j].grasa,
                                    proteina = alimentosJueves[j].proteina;
                                let kcal = alimentosJueves[j].valor_calorico

                                antCB = antCB - carb * alimentosJueves[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosJueves[j].cantidad;
                                antPro = antPro - proteina * alimentosJueves[j].cantidad;
                                antKcal = antKcal - kcal * alimentosJueves[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosJueves[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosJueves[x] !== undefined)
                                        auxDia.push(alimentosJueves[x]);
                                }
                                alimentosJueves = {
                                    ...auxDia
                                }

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        } //fin contAlimentoRep
                    }
                }
            }

            //     // CARGA DE ALIMENTOS DEL DIA VIERNES
            if (id >= 24 && id < 30) {
                let cant = Object.keys(alimentosViernes);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de miercoles, tiene los alimentos
                {
                    for (let c = 24; c < 30; c++) {

                        if (contAlimentoRepetido) // para que no tome en cuenta a otro alimento que esta dentro de la dieta
                        {
                            if (id === c && alimentosViernes[j]?.id === alimento_id && alimentosViernes[j]?.horario ===
                                nombreComidas[c - 24]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosViernes[j].carbohidrato,
                                    grasa = alimentosViernes[j].grasa,
                                    proteina = alimentosViernes[j].proteina;
                                let kcal = alimentosViernes[j].valor_calorico

                                antCB = antCB - carb * alimentosViernes[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosViernes[j].cantidad;
                                antPro = antPro - proteina * alimentosViernes[j].cantidad;
                                antKcal = antKcal - kcal * alimentosViernes[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosViernes[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosViernes[x] !== undefined)
                                        auxDia.push(alimentosViernes[x]);
                                }
                                alimentosViernes = {
                                    ...auxDia
                                }

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        }
                    }
                }
            }

            //    // CARGA DE ALIMENTOS DEL DIA SABADO
            if (id >= 30 && id < 36) {
                let cant = Object.keys(alimentosSabado);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de sabado, tiene los alimentos
                {
                    for (let c = 30; c < 36; c++) {

                        if (contAlimentoRepetido) // para que no tome en cuenta a otro alimento que esta dentro de la dieta
                        {
                            if (id === c && alimentosSabado[j]?.id === alimento_id && alimentosSabado[j]?.horario ===
                                nombreComidas[c - 30]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosSabado[j].carbohidrato,
                                    grasa = alimentosSabado[j].grasa,
                                    proteina = alimentosSabado[j].proteina;
                                let kcal = alimentosSabado[j].valor_calorico

                                antCB = antCB - carb * alimentosSabado[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosSabado[j].cantidad;
                                antPro = antPro - proteina * alimentosSabado[j].cantidad;
                                antKcal = antKcal - kcal * alimentosSabado[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosSabado[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosSabado[x] !== undefined)
                                        auxDia.push(alimentosSabado[x]);
                                }
                                alimentosSabado = {
                                    ...auxDia
                                }

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        } //fin contAlimentoRepetido
                    }
                }
            }

            //    // CARGA DE ALIMENTOS DEL DIA DOMINGO
            if (id >= 36 && id < 42) {
                let cant = Object.keys(alimentosDomingo);
                let long = cant.length;
                let contAlimentoRepetido = true;

                for (let j = 0; j < long; j++) //contenido de sabado, tiene los alimentos
                {
                    for (let c = 36; c < 42; c++) {
                        if (contAlimentoRepetido) // para que no tome en cuenta a otro alimento que esta dentro de la dieta
                        {
                            if (id === c && alimentosDomingo[j]?.id === alimento_id && alimentosDomingo[j]?.horario ===
                                nombreComidas[c - 36]) {

                                let antCB = Number(document.getElementById('totalCarbohidrato' + id).textContent)
                                let antGrasa = Number(document.getElementById('totalGrasa' + id).textContent)
                                let antPro = Number(document.getElementById('totalProteina' + id).textContent)
                                let antKcal = Number(document.getElementById('totalKcal' + id).textContent)

                                let carb = alimentosDomingo[j].carbohidrato,
                                    grasa = alimentosDomingo[j].grasa,
                                    proteina = alimentosDomingo[j].proteina;
                                let kcal = alimentosDomingo[j].valor_calorico

                                antCB = antCB - carb * alimentosDomingo[j].cantidad;
                                antGrasa = antGrasa - grasa * alimentosDomingo[j].cantidad;
                                antPro = antPro - proteina * alimentosDomingo[j].cantidad;
                                antKcal = antKcal - kcal * alimentosDomingo[j].cantidad;

                                document.getElementById('totalCarbohidrato' + id).textContent = antCB;
                                document.getElementById('totalGrasa' + id).textContent = antGrasa;
                                document.getElementById('totalProteina' + id).textContent = antPro;
                                document.getElementById('totalKcal' + id).textContent = antKcal;

                                delete alimentosDomingo[j]
                                let auxDia = []
                                for (let x = 0; x < long; x++) {
                                    if (alimentosDomingo[x] !== undefined)
                                        auxDia.push(alimentosDomingo[x]);
                                }
                                alimentosDomingo = {
                                    ...auxDia
                                }

                                sumarResultados();
                                //  console.log(alimentosLunes)
                                contAlimentoRepetido = false;
                            }
                        } //fin contAlimentoRepetido
                    }
                }
            }

        }


        async function getDataAlimento(alimento_id) {
            let result;
            try {
                result = await $.ajax({
                    url: "{{ route('alimento.datosAlimento') }}",
                    dataType: "json",
                    data: {
                        alimento_id: alimento_id
                    }
                })
                return result
            } catch (error) {
                console.error(error)
            }
        }


        async function agregarAlimento(id) {
            // por parametro viene el id del acordion y con el getElementById obtenemos el valor del elemento seleccionado
            let alimento_id = document.getElementById('alimentoSeleccionado' + id).value;

            let alimento = await getDataAlimento(alimento_id);


            if (id >= 0 && id < 6) // lunes
            {
                if (alimentoRepetido(alimento, id, alimentosLunes, 0)) {
                    for (let i = 0; i < 6; i++) {
                        if (id == i) {
                            let cant = Object.keys(alimentosLunes);
                            let long = cant.length

                                    alimento.horario = nombreComidas[i];
                                    alimento.cantidad = 1;
                                    alimentosLunes.push(alimento);

                            //     }
                            // }

                            console.log('ALIMENTOS LUNES',alimentosLunes)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>

                            </tr>`);
                            console.log(tbody)
                            contadorfila++;

                            let totalCb = 0;
                            let totalGrasa = 0
                            let totalPro = 0
                            let totalKcal = 0
                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;

                            fila++;
                            contadorfila++;

                        }
                    }
                    sumarResultados();
                }
            }

            if (id >= 6 && id < 12) // martes
            {
                if (alimentoRepetido(alimento, id - 6, alimentosMartes, 1)) {
                    for (let i = 6; i < 12; i++) {
                        if (id == i) {
                            console.log('si entro')
                            let cant = Object.keys(alimentosMartes);
                            let long = cant.length

                            alimento.horario = nombreComidas[i-6];
                                    alimento.cantidad = 1;
                                    alimentosMartes.push(alimento);

                            console.log(alimentosMartes)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>`);

                            //    console.log(tbody)
                            contadorfila++;
                            let totalCb = 0;
                            let totalGrasa = 0;
                            let totalPro = 0;
                            let totalKcal = 0;

                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;

                            fila++;
                            contadorfila++;

                        }
                    }
                    sumarResultados();
                }
            }

            if (id >= 12 && id < 18) // miercoles
            {
                if (alimentoRepetido(alimento, id - 12, alimentosMiercoles, 2)) {
                    for (let i = 12; i < 18; i++) {
                        if (id == i) {
                            let cant = Object.keys(alimentosMiercoles);
                            let long = cant.length

                            alimento.horario = nombreComidas[i-12];
                                    alimento.cantidad = 1;

                                    alimentosMiercoles.push(alimento);
                            console.log(alimentosMiercoles)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>`);
                            console.log(tbody)
                            contadorfila++;

                            let totalCb = 0;
                            let totalGrasa = 0
                            let totalPro = 0
                            let totalKcal = 0
                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;

                            fila++;
                            contadorfila++;

                        }
                    }
                    sumarResultados();
                }
            }

            if (id >= 18 && id < 24) // jueves
            {
                if (alimentoRepetido(alimento, id - 18, alimentosJueves, 3)) {
                    for (let i = 18; i < 24; i++) {
                        if (id == i) {
                            let cant = Object.keys(alimentosJueves);
                            let long = cant.length

                            alimento.horario = nombreComidas[i-18];
                                    alimento.cantidad = 1;

                                    alimentosJueves.push(alimento);

                            console.log(alimentosJueves)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>`);
                            console.log(tbody)

                            let totalCb = 0;
                            let totalGrasa = 0
                            let totalPro = 0
                            let totalKcal = 0
                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;

                            fila++;
                            contadorfila++;


                        }
                    }
                    sumarResultados();
                }
            }

            if (id >= 24 && id < 30) // viernes
            {
                if (alimentoRepetido(alimento, id - 24, alimentosViernes, 4)) {
                    for (let i = 24; i < 30; i++) {
                        if (id == i) {
                            let cant = Object.keys(alimentosViernes);
                            let long = cant.length

                            alimento.horario = nombreComidas[i-24];
                                    alimento.cantidad = 1;

                                    alimentosViernes.push(alimento);

                            console.log(alimentosViernes)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>`);
                            console.log(tbody)

                            let totalCb = 0;
                            let totalGrasa = 0
                            let totalPro = 0
                            let totalKcal = 0
                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;
                            fila++;
                            contadorfila++;

                        }
                    }
                    sumarResultados();
                }
            }

            if (id >= 30 && id < 36) // sabado
            {
                if (alimentoRepetido(alimento, id - 30, alimentosSabado, 5)) {
                    for (let i = 30; i < 36; i++) {
                        if (id == i) {
                            let cant = Object.keys(alimentosSabado);
                            let long = cant.length
                                    alimento.horario = nombreComidas[i-30];
                                    alimento.cantidad = 1;

                                    alimentosSabado.push(alimento);
                            console.log(alimentosSabado)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>`);
                            console.log(tbody)

                            let totalCb = 0;
                            let totalGrasa = 0
                            let totalPro = 0
                            let totalKcal = 0
                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;
                            fila++;
                            contadorfila++;

                        }
                    }
                    sumarResultados();
                }
            }

            if (id >= 36 && id < 42) // domingo
            {
                if (alimentoRepetido(alimento, id - 36, alimentosDomingo, 6)) {
                    for (let i = 36; i < 42; i++) {
                        if (id == i) {
                            let cant = Object.keys(alimentosDomingo);
                            let long = cant.length

                            alimento.horario = nombreComidas[i-36];
                                    alimento.cantidad = 1;

                                    alimentosDomingo.push(alimento);
                            console.log(alimentosDomingo)
                            let tbody = document.getElementById('tbody' + id)
                            $(tbody).append(`<tr id="fila${contadorfila}">
                        <td>
                            <select onchange="seleccionarCantidad(${i},${alimento.id},${selectsId});" id="selectCantidad${selectsId}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                            </td>
                            <td><img src="${alimento.imagen.url}"></td>
                            <td>${alimento.nombre}</td>
                            <td>${alimento.peso} ${nombreMedidas[alimento.medida_id-1]}</td>
                            <td><a onclick="eliminarAlimento(${id},${contadorfila},${alimento.id});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>`);
                            console.log(tbody)
                            contadorfila++;

                            let totalCb = 0;
                            let totalGrasa = 0
                            let totalPro = 0
                            let totalKcal = 0
                            // ACTUALIZAMOS EL TOTAL DE LA TABLA DERECHA CON LOS VALORES DEL NUEVO ALIMENTO
                            totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent) + Number(
                                alimento.carbohidrato);
                            totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent) + Number(
                                alimento.grasa);
                            totalPro += Number(document.getElementById('totalProteina' + i).textContent) + Number(
                                alimento.proteina);
                            totalKcal += Number(document.getElementById('totalKcal' + i).textContent) + Number(alimento
                                .valor_calorico);
                            // PASAMOS EL VALOR A LA VISTA
                            document.getElementById('totalCarbohidrato' + i).textContent = totalCb;
                            document.getElementById('totalGrasa' + i).textContent = totalGrasa;
                            document.getElementById('totalProteina' + i).textContent = totalPro;
                            document.getElementById('totalKcal' + i).textContent = totalKcal;
                            fila++;

                        }
                    }
                    sumarResultados();
                }
            }
        }

        var contadorfila = 0;
        var selectsId = 0;

        var estadoDias = [false, false, false, false, false, false, false]
        function sumarResultados() {
            let arrayDias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']
            for (let dia = 0; dia < 7; dia++) {
                let totalCb = 0,
                    totalGrasa = 0,
                    totalProteina = 0,
                    totalKcal = 0;
                let idInicio = 0,
                    idFin = 0;
                if (dia == 0) {
                    idInicio = 0;
                    idFin = 6;
                }
                if (dia == 1) {
                    idInicio = 6;
                    idFin = 12;
                }
                if (dia == 2) {
                    idInicio = 12;
                    idFin = 18;
                }
                if (dia == 3) {
                    idInicio = 18;
                    idFin = 24;
                }
                if (dia == 4) {
                    idInicio = 24;
                    idFin = 30;
                }
                if (dia == 5) {
                    idInicio = 30;
                    idFin = 36;
                }
                if (dia == 6) {
                    idInicio = 36;
                    idFin = 42;
                }

                for (let i = idInicio; i < idFin; i++) {
                    totalCb += Number(document.getElementById('totalCarbohidrato' + i).textContent);
                    totalGrasa += Number(document.getElementById('totalGrasa' + i).textContent);
                    totalProteina += Number(document.getElementById('totalProteina' + i).textContent);
                    totalKcal += Number(document.getElementById('totalKcal' + i).textContent);

                    document.getElementById('carbohidratosTotal' + dia).textContent = totalCb
                    document.getElementById('grasasTotal' + dia).textContent = totalGrasa
                    document.getElementById('proteinasTotal' + dia).textContent = totalProteina
                    document.getElementById('kcalTotal' + dia).textContent = totalKcal
                }

                let valorKcal = Number(document.getElementById('kcalTotal' + dia).textContent);
                if (valorKcal > 1500 && estadoDias[dia]==false) {
                    estadoDias[dia]=true;
                    swal({
                        title: "Atención",
                        text: "El total del día " + arrayDias[dia] +
                            " de los alimentos agregados a sobrepasado las 1500 Kcal",
                        icon: "info",
                    })
                }
            }

        }
    </script>
@endsection
