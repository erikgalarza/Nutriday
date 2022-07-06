@extends('admin.dashboard')
@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('administracion/css/asignarAlimentosDieta.css') }}">
    <link rel="stylesheet" href="dias.css">

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

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alimento</li>
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
                                                        style=";font-size:16px">{{ $data->created_at }}
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
                                            <label class="col-7">{{ $dieta->created_at }}</label>
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
                </style>
                <ul class="nav nav-pills nav-pills-success text-center row justify-content-center align-items-center mt-2"
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

                @php
                    $comidas = [' DESAYUNO', 'COLACIÓN DE LA MAÑANA', 'ALMUERZO', 'COLACIÓN DE LA TARDE', 'MERIENDA', 'CENA'];
                @endphp
                <div class="card mt-2" style="border:none">
                    <div class="tab-content py-0 px-5" id="pills-tabContent" style="border:none;">
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

                                                    <input type="hidden" id="dieta_id" value="{{ $dieta->id }}">
                                                    <div>
                                                        <div>
                                                            <div class="container_buscador">

                                                                <label class="col-12 text-left"><button
                                                                        class="ml-3 py-0 px-2" disabled
                                                                        title="No se puede ingresar dos veces el mismo alimento"
                                                                        style="border-radius:10px; border:1px solid grey"><i
                                                                            class="fas fa-info"></i></button>
                                                                </label>
                                                                <div class="container_buscador_desayuno container">
                                                                    <div class="row justify-content-center">
                                                                        <a class="btn" disabled
                                                                        style="background-color:white;border-radius:5px;margin-right:-14px;border-top:1px solid #e0e0ef;border-bottom:1px solid #e0e0ef;border-left:1px solid #e0e0ef">
                                                                        <i class="fa-solid fa-magnifying-glass" style="color:#6d6d6d"></i>
                                                                        </a>
                                                                        <div class=" col-8  ">
                                                                            <select
                                                                                id="alimentoSeleccionado{{ $k }}"
                                                                                onchange="seleccionarAlimento({{ $k }});"
                                                                                class=" js-example-basic-multiple  ">
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
                                                    <div
                                                        style="display:flex; justify-content:space-around; flex-wrap:wrap; margin-top:30px;">
                                                        <div>
                                                            <div class="table-responsive">
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
                                                                        <tbody id="tbody{{ $id }}">
                                                                        </tbody>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <div class="table-responsive">

                                                                <div class="container mt-5 px-5 py-4"
                                                                    style="border:1px #000 solid; border-radius:10px;">
                                                                    <div class="Titulo text-center mb-3"
                                                                        style="font-weight:700; font-size:14px;">
                                                                        <h5>TOTALES</h5>
                                                                    </div>
                                                                    <div
                                                                        style="display:flex; flex-direction:row; flex-wrap:wrap;">
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
                                                                                <strong
                                                                                    id="totalCarbohidrato{{ $k }}">0</strong>
                                                                            </div>
                                                                            <div class="val">
                                                                                <strong
                                                                                    id="totalGrasa{{ $k }}">0</strong>
                                                                            </div>
                                                                            <div class="val">
                                                                                <strong
                                                                                    id="totalProteina{{ $k }}">0</strong>
                                                                            </div>
                                                                            <div class="val">
                                                                                <strong
                                                                                    id="totalKcal{{ $k }}">0</strong>
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
                                                            class="ml-4 mr-1" id="kcalTotal{{ $j }}">0</i>
                                                        /1500</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="botones" style="display:flex; justify-content:space-evenly;">
                                            <a onclick="confirmarDia({{ $j }});"
                                                class="btn btn-outline-success mx-2" title="Guardar selección"><i
                                                    class="fas fa-check"></i></a>
                                            <a onclick="quitarConfirmacion({{ $j }});"
                                                class="btn btn-outline-warning" title="Cambiar selección"><i
                                                    class="fas fa-edit"></i></a>
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
        // function esconder() {

        // }

        var lunes = [],
            martes = [],
            miercoles = [],
            jueves = [],
            viernes = [],
            sabado = [],
            domingo = []; // dentro de este estaron los alimentos del dia lunes
        function guardarDieta() {
            console.log('dkfaldf')
            // console.log('content lunes:',lunes)
            // console.log('content martes:',martes)
            var semana = {};

            semana = {
                lunes,
                martes,
                miercoles,
                jueves,
                viernes,
                sabado,
                domingo
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

        async function getDataAlimento(idalimento) {
            let result;
            try {
                result = await $.ajax({
                    url: "{{ route('alimento.datosAlimento') }}",
                    dataType: "json",
                    data: {
                        alimento_id: idalimento
                    }
                })
                return result
            } catch (error) {
                console.error(error)
            }
        }

        async function seleccionarAlimento(id) {
            var alimentoid = document.getElementById('alimentoSeleccionado' + id).value;
            var data = await getDataAlimento(alimentoid);
            almacenador(id, data);
            actualizarTablaTotales(id);
        }

        function almacenador(id, data) {
            Object.assign(data, {
                cantidad: 1
            }) // la cantidad de alimento para la dieta, min 1
            if (id >= 0 && id <= 5) { //lunes
                if (id == 0) {
                    Object.assign(data, {
                        horario: 0
                    })
                };
                if (id == 1) {
                    Object.assign(data, {
                        horario: 1
                    })
                };
                if (id == 2) {
                    Object.assign(data, {
                        horario: 2
                    })
                };
                if (id == 3) {
                    Object.assign(data, {
                        horario: 3
                    })
                };
                if (id == 4) {
                    Object.assign(data, {
                        horario: 4
                    })
                };
                if (id == 5) {
                    Object.assign(data, {
                        horario: 5
                    })
                };
                lunes.push(data);
            }
            if (id >= 6 && id <= 11) { //martes
                if (id == 6) {
                    Object.assign(data, {
                        horario: 6
                    })
                };
                if (id == 7) {
                    Object.assign(data, {
                        horario: 7
                    })
                };
                if (id == 8) {
                    Object.assign(data, {
                        horario: 8
                    })
                };
                if (id == 9) {
                    Object.assign(data, {
                        horario: 9
                    })
                };
                if (id == 10) {
                    Object.assign(data, {
                        horario: 10
                    })
                };
                if (id == 11) {
                    Object.assign(data, {
                        horario: 11
                    })
                };
                martes.push(data);
            }
            if (id >= 12 && id <= 17) { //miercoles
                if (id == 12) {
                    Object.assign(data, {
                        horario: 12
                    })
                };
                if (id == 13) {
                    Object.assign(data, {
                        horario: 13
                    })
                };
                if (id == 14) {
                    Object.assign(data, {
                        horario: 14
                    })
                };
                if (id == 15) {
                    Object.assign(data, {
                        horario: 15
                    })
                };
                if (id == 16) {
                    Object.assign(data, {
                        horario: 16
                    })
                };
                if (id == 17) {
                    Object.assign(data, {
                        horario: 17
                    })
                };
                miercoles.push(data);
            }
            if (id >= 18 && id <= 23) { //jueves
                if (id == 18) {
                    Object.assign(data, {
                        horario: 18
                    })
                };
                if (id == 19) {
                    Object.assign(data, {
                        horario: 19
                    })
                };
                if (id == 20) {
                    Object.assign(data, {
                        horario: 20
                    })
                };
                if (id == 21) {
                    Object.assign(data, {
                        horario: 21
                    })
                };
                if (id == 22) {
                    Object.assign(data, {
                        horario: 22
                    })
                };
                if (id == 23) {
                    Object.assign(data, {
                        horario: 23
                    })
                };
                jueves.push(data);
            }
            if (id >= 24 && id <= 29) { //viernes
                if (id == 24) {
                    Object.assign(data, {
                        horario: 24
                    })
                };
                if (id == 25) {
                    Object.assign(data, {
                        horario: 25
                    })
                };
                if (id == 26) {
                    Object.assign(data, {
                        horario: 26
                    })
                };
                if (id == 27) {
                    Object.assign(data, {
                        horario: 27
                    })
                };
                if (id == 28) {
                    Object.assign(data, {
                        horario: 28
                    })
                };
                if (id == 29) {
                    Object.assign(data, {
                        horario: 29
                    })
                };
                viernes.push(data);
            }
            if (id >= 30 && id <= 35) { //sabado
                if (id == 30) {
                    Object.assign(data, {
                        horario: 30
                    })
                };
                if (id == 31) {
                    Object.assign(data, {
                        horario: 31
                    })
                };
                if (id == 32) {
                    Object.assign(data, {
                        horario: 32
                    })
                };
                if (id == 33) {
                    Object.assign(data, {
                        horario: 33
                    })
                };
                if (id == 34) {
                    Object.assign(data, {
                        horario: 34
                    })
                };
                if (id == 35) {
                    Object.assign(data, {
                        horario: 35
                    })
                };
                sabado.push(data);
            }
            if (id >= 36 && id <= 41) { //domingo
                if (id == 36) {
                    Object.assign(data, {
                        horario: 36
                    })
                };
                if (id == 37) {
                    Object.assign(data, {
                        horario: 37
                    })
                };
                if (id == 38) {
                    Object.assign(data, {
                        horario: 38
                    })
                };
                if (id == 39) {
                    Object.assign(data, {
                        horario: 39
                    })
                };
                if (id == 40) {
                    Object.assign(data, {
                        horario: 40
                    })
                };
                if (id == 41) {
                    Object.assign(data, {
                        horario: 41
                    })
                };
                domingo.push(data);
            }
            draw(lunes, martes, miercoles, jueves, viernes, sabado, domingo);
        }

        function iterar(vi, vf, dia) {
            for (let i = vi; i <= vf; i++) { //representa el id del acordion  de 0 a 5 lunes
                let m = 2;
                let id = m * i;
                var tbody1 = document.getElementById('tbody' + id);
                tbody1.innerHTML = ''
                var totalesCarbohidrato = 0;
                var totalesGrasa = 0;
                var totalesProteina = 0;
                var totalesValorCalorico = 0;
                for (let j = 0; j < dia.length; j++) { // los alimentos por comida
                    if (i == dia[j].horario) {
                        var todo = `<tr>
  <input type="hidden" name="alimento_id[]" value="${dia[j].id}">
  <input type="hidden" name="alimento" id="alimento_id${j}" value="${dia[j].id}">
  <td><select name="selectCantidad[]" onchange="selectAlimento(${i},${dia[j].id});"  id="selectCantidad"  class="form-control selectCantidad${i}">
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
</select></td>`;
                        todo += `<td><img src="${dia[j][0]}"></td>`;
                        todo += '<td>' + dia[j].nombre + '</td>';
                        todo += '<td>' + dia[j].peso + '</td>';
                        todo +=
                            `<td><a onclick="eliminarAlimento(${i},${j});" class="btn btn-danger"><i class="fas fa-trash"></i></a></td></tr>`;
                        $(tbody1).append(todo);
                        // SUMA DE LOS DATOS DISPONIBLES EN EL ARREGLO
                        totalesCarbohidrato += Number(dia[j].carbohidrato);
                        totalesGrasa += Number(dia[j].grasa);
                        totalesProteina += Number(dia[j].proteina);
                        totalesValorCalorico += Number(dia[j].valor_calorico);
                    }
                }
                document.getElementById('totalCarbohidrato' + i).textContent = totalesCarbohidrato;
                document.getElementById('totalGrasa' + i).textContent = totalesGrasa;
                document.getElementById('totalProteina' + i).textContent = totalesProteina;
                document.getElementById('totalKcal' + i).textContent = totalesValorCalorico;
            }
        }

        function draw(lunes, martes, miercoles, jueves, viernes, sabado, domingo) {
            iterar(0, 5, lunes); //lunes
            iterar(6, 11, martes); //martes
            iterar(12, 17, miercoles); //miercoles
            iterar(18, 23, jueves); //jueves
            iterar(24, 29, viernes); //viernes
            iterar(30, 35, sabado); //sabado
            iterar(36, 41, domingo); //domingo
        }

        function validarDia(vi, vf) {
            let cont = 0;
            console.log('vi:', vi);
            console.log('vf:', vf)
            for (let i = vi; i <= vf; i++) {
                document.querySelectorAll('.selectCantidad' + i).forEach(function() {
                    cont++;
                });
            }
            console.log('valor del cont:', cont)
            if (cont < 6) {
                return false
            } else
                return true;

        }

        function actualizarTablaEstadisticas(acordionid, dia) {
            var cantidades = []
            console.log('acordion recibido: ' + acordionid);

            let totalCarbohidrato = 0,
                totalGrasa = 0,
                totalProteina = 0,
                totalKcal = 0;
            document.querySelectorAll('.selectCantidad' + acordionid).forEach(function(select) {
                cantidades.push(select.value);
            });
            console.log('cantidades:', cantidades)
            console.log('comida:', dia)
            var array = []
            for (let i = 0; i < dia.length; i++) {
                if (dia[i].horario == acordionid) {
                    array.push(dia[i])

                }
            }

            for (let i = 0; i < array.length; i++) {
                if (array[i].horario == acordionid) {
                    console.log('SII')
                    array[i].cantidad = cantidades[i];
                    totalCarbohidrato += array[i].carbohidrato * cantidades[i];
                    totalGrasa += array[i].grasa * cantidades[i];
                    totalProteina += array[i].proteina * cantidades[i];
                    totalKcal += array[i].valor_calorico * cantidades[i];
                }
            }
            document.getElementById('totalCarbohidrato' + acordionid).textContent = totalCarbohidrato;
            document.getElementById('totalGrasa' + acordionid).textContent = totalGrasa;
            document.getElementById('totalProteina' + acordionid).textContent = totalProteina;
            document.getElementById('totalKcal' + acordionid).textContent = totalKcal;
        }

        function selectAlimento(acordionid,
            alimentoid) // aqui se determina a que tabla de estadisticas se va actualizar los valores
        {
            if (acordionid >= 0 && acordionid <= 5) {
                actualizarTablaEstadisticas(acordionid, lunes);
            }
            if (acordionid >= 6 && acordionid <= 11) {
                actualizarTablaEstadisticas(acordionid, martes);
            }
            if (acordionid >= 12 && acordionid <= 17) {
                actualizarTablaEstadisticas(acordionid, miercoles);
            }
            if (acordionid >= 18 && acordionid <= 23) {
                actualizarTablaEstadisticas(acordionid, jueves);
            }
            if (acordionid >= 24 && acordionid <= 29) {
                actualizarTablaEstadisticas(acordionid, viernes);
            }
            if (acordionid >= 30 && acordionid <= 35) {
                actualizarTablaEstadisticas(acordionid, sabado);
            }
            if (acordionid >= 36 && acordionid <= 41) {
                actualizarTablaEstadisticas(acordionid, domingo);
            }
        }

        function eliminarAlimento(idAcordion, idAlimento) {
            let alimento_id = document.getElementById('alimento_id' + idAlimento).value;
            swal({
                title: "¿Desea retirar el alimento de la lista?",
                text: "Al aceptar, el alimento será elimado de la lista alimentos para la dieta",
                icon: "warning",
                buttons: [
                    'No, cancelar',
                    'Si, aceptar'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    buscarAlimentoyEliminar(idAcordion, alimento_id);
                } else {
                    swal("Cancelado", "El alimento no ha sido retirado de la lista", "info");
                }
            });
        }

        function buscarAlimentoyEliminar(acordion_id, alimento_id) {
            if (acordion_id >= 0 && acordion_id <= 5) { //lunes
                for (let i = 0; i < lunes.length; i++) {
                    if (lunes[i].id == alimento_id && lunes[i].horario == acordion_id) {
                        lunes.splice(i, 1);
                    }
                }
            }
            if (acordion_id >= 6 && acordion_id <= 11) { //lunes
                for (let i = 0; i < martes.length; i++) {
                    if (martes[i].id == alimento_id) {
                        martes.splice(i, 1);
                    }
                }
            }
            if (acordion_id >= 12 && acordion_id <= 17) { //lunes
                for (let i = 0; i < miercoles.length; i++) {
                    if (miercoles[i].id == alimento_id) {
                        miercoles.splice(i, 1);
                    }
                }
            }
            if (acordion_id >= 18 && acordion_id <= 23) { //lunes
                for (let i = 0; i < jueves.length; i++) {
                    if (jueves[i].id == alimento_id) {
                        jueves.splice(i, 1);
                    }
                }
            }
            if (acordion_id >= 24 && acordion_id <= 29) { //lunes
                for (let i = 0; i < viernes.length; i++) {
                    if (viernes[i].id == alimento_id) {
                        viernes.splice(i, 1);
                    }
                }
            }
            if (acordion_id >= 30 && acordion_id <= 35) { //lunes
                for (let i = 0; i < sabado.length; i++) {
                    if (sabado[i].id == alimento_id) {
                        sabado.splice(i, 1);
                    }
                }
            }
            if (acordion_id >= 36 && acordion_id <= 41) { //lunes
                for (let i = 0; i < domingo.length; i++) {
                    if (domingo[i].id == alimento_id) {
                        domingo.splice(i, 1);
                    }
                }
            }
            draw(lunes, martes, miercoles, jueves, viernes, sabado, domingo);
        }

        function notificacion(resultado, dia) {
            if (resultado == true) {
                let dia = document.getElementById('pills-dia' + id + '-tab');
                dia.style = "background-color:#04B76B;color:white;";
            } else {
                dia.style = "background-color:#5DADE2;color:white;";
                swal({
                    title: "Aún faltan horarios de comida por completar del " + dia,
                    text: "Cada horario de comida debe tener al menos 1 alimento",
                    icon: "info",
                })
            }
        }

        function confirmarDia(id) {
            let resultado;
            let dia = document.getElementById('pills-dia' + id + '-tab');
            console.log('id recibido', id)
            switch (id) {
                case 0: //lunes
                    resultado = validarDia(0, 5);
                    if (resultado == false) {
                        notificacion(resultado, 'Lunes');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;
                case 1:
                    resultado = validarDia(6, 11);
                    if (resultado == false) {
                        notificacion(resultado, 'Martes');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;
                case 2:
                    resultado = validarDia(12, 17);
                    if (resultado == false) {
                        notificacion(resultado, 'Miercoles');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;
                case 3:
                    resultado = validarDia(18, 23);
                    if (resultado == false) {
                        notificacion(resultado, 'Jueves');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;

                case 4:
                    resultado = validarDia(24, 29);
                    if (resultado == false) {
                        notificacion(resultado, 'Viernes');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;

                case 5:
                    resultado = validarDia(30, 35);
                    if (resultado == false) {
                        notificacion(resultado, 'Sabado');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;

                case 6: //domingo
                    resultado = validarDia(36, 41);
                    if (resultado == false) {
                        notificacion(resultado, 'Domingo');
                    } else {
                        dia.style = "background-color:#04B76B;color:white;";
                    };
                    break;

            }
        }

        function quitarConfirmacion(id) {
            let dia = document.getElementById('pills-dia' + id + '-tab');
            dia.style = "background-color:#5DADE2;color:white;";
        }

        function eliminarByIdComida(dia_id, acordion_id, alimento_id) {
            var dias = Object.values(semana);
            console.log('Dias en eliminarByIdCmida:', dias);
            for (let i = 0; i < dias.length; i++) {
                if (i == dia_id) {
                    var comidas = Object.values(dias[i]);

                    for (let j = 0; j < comidas.length; j++) { // desayuno, colacion , almuerzo , colacion, merienda, cena
                        if (j == acordion_id) { // comida_id -> desayuno
                            console.log('ALIMENTOS DEL DESAYUNO DEL DIA LUNES');
                            var alimentos = Object.values(comidas[j]);
                            console.log('alimentos 479: ', alimentos)
                            for (let k = 0; k < alimentos.length; k++) {
                                if (alimentos[k].id == alimento_id) {
                                    alimentos.splice(k, 1); // de la posicion i elimina 1

                                    var alimentosRestantes = alimentos;
                                    console.log('alimentos restantes: ', alimentosRestantes)
                                    comidas[acordion_id] = Object.values(alimentosRestantes);
                                    console.log('comidas nuevas:', comidas);
                                    dias[dia_id] = Object.values(comidas);
                                    console.log('array dia nuevo:', dias);
                                    semana = Object.values(dias);
                                    semanaOficial = Object.values(dias);
                                    // desayunoLunes = [];
                                    // lunes = [];
                                    // var sem = [dias];
                                    // console.log('semana1 : ', semana1)

                                    console.log('semana Actual: ', semana);
                                    console.log('semana Oficial:', semanaOficial)
                                    // semana = semana1;
                                    // console.log('SEMANA DESPUES DE ELIMINAR: ', semana);
                                    dibujar();
                                }
                            }
                        }
                    }
                }
            }
            console.log('NUEVO CONTENIDO DE LA SEMANA')
            console.log(dias);
            console.log(semana);
        }

        function actualizarTablaTotales(acordionid) {
            var carbohidratoTotal = 0,
                grasaTotal = 0,
                proteinaTotal = 0,
                kcalTotal = 0;
            if (acordionid >= 0 && acordionid <= 5) {

                for (let i = 0; i <= 5; i++) {
                    let valorCarbohidratoTotal = document.getElementById('totalCarbohidrato' + i).textContent;
                    let valorGrasaTotal = document.getElementById('totalGrasa' + i).textContent;
                    let valorProteinaTotal = document.getElementById('totalProteina' + i).textContent;
                    let valorKcalTotal = document.getElementById('totalKcal' + i).textContent;
                    carbohidratoTotal = carbohidratoTotal + Number(valorCarbohidratoTotal);
                    grasaTotal = grasaTotal + Number(valorGrasaTotal);
                    proteinaTotal = proteinaTotal + Number(valorProteinaTotal);
                    kcalTotal = kcalTotal + Number(valorKcalTotal);
                }
                document.getElementById('carbohidratosTotal0').textContent = carbohidratoTotal;
                document.getElementById('grasasTotal0').textContent = grasaTotal;
                document.getElementById('proteinasTotal0').textContent = proteinaTotal;
                document.getElementById('kcalTotal0').textContent = kcalTotal + '/1500';

            }
        }
    </script>
@endsection
