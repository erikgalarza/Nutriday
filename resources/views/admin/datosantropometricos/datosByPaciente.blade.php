@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Agregar
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Datos antropométricos</li>
            </ol>
        </nav>
    </div>

    <style>

        .btn-outline-primary:hover {
            color: white !important;
        }

        .btn-outline-info:hover {
            color: white !important;
        }

    @media (max-width:992px){
        .consulta{
            order:2;
        }
    }
    </style>


    <!-- ===================================================================================================================== -->

    <input type="hidden" value="{{ $datos }}" id="datosAntropometricos">
    {{-- <p>{{$datos}}</p> --}}
    <div class="card ">
        <div class="mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Datos antropométricos de {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
        </div>
        <div class="row px-4" style="margin-top:10px;">

            <div class="col-lg-6 grid-margin stretch-card consulta ">
                <div class="card m">
                    <div class="card-body text-center py-2 row justify-content-lg-center">

                        <div class="col-12 row justify-content-center">
                            <div class=" col-12 row justify-content-center" style="border-bottom:1px solid;max-width:345px">
                                <div class="col-6 col-lg-12 col-xl-6  p-0 ">
                                    <label class="col-form-label" style="font-size:16px;font-weight:bold">
                                        Última consulta:</label>
                                </div>
                                        @foreach ($paciente->dato_antropometrico as $kp => $data)
                                            @if ($loop->last)
                                                <div class="col-6 col-lg-12 col-xl-6 no-gutters p-0 text-center ">
                                                    <label class="col-form-label" style=";font-size:16px">{{ date('Y-m-d',strtotime($data->created_at)) }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                            </div>
                        </div>
                        <style>
                            @media (max-width:992px){
                                .contenedor{
                                    max-width: 360px !important;
                                    padding-left: 2rem !important;
                                }
                            }
                            @media (min-width:992px){
                                .contenedor2{
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
        <div class="container text-center py-2 mb-3">
            <a href="{{ route('admin.agregarDatosAntropometricos', $paciente->id) }}" class="btn btn-warning"><i
                    class="fas fa-plus mr-2"></i> Agregar datos antropométricos </a>
        </div>
    </div>




    <!-- =============================================================================================================== -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="container ">
                <div class="table-responsive">
                    <table id="order-listing" class="table text-center">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Altura</th>
                                <th>Peso</th>
                                <th>IMC</th>
                                <th>Grasa corporal</th>
                                <th>Masa muscular</th>
                                <th>Datos bioquímicos</th>
                                <th>Observaciones</th>
                                <th>Fecha consulta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $key => $dato)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $dato->altura }}</td>
                                    <td>{{ $dato->peso }}</td>
                                    <td>{{ $dato->imc }}</td>
                                    <td>{{ $dato->grasa_corporal }}</td>
                                    <td>{{ $dato->masa_muscular }}</td>
                                    <td>
                                        <a title="Ver datos bioquimicos del paciente" data-toggle="modal"
                                            data-target="#exampleModal-4{{ $dato->id }}"
                                            class="btn btn-outline-info"><i class="fa-solid fa-flask"></i></a>
                                    </td>
                                    <td>
                                        <a title="Ver observaciones del paciente" data-toggle="modal"
                                            data-target="#exampleModal-5{{ $dato->id }}"
                                            class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                    <td>{{ date('Y-m-d',strtotime($dato->created_at)) }}</td>
                                </tr>

                                <div class="modal fade" id="exampleModal-4{{ $dato->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#4b6ac3">
                                                <h5 class="modal-title text-lg-center text-white"
                                                    style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                    id="ModalLabel">Datos bioquímicos de
                                                    {{ $paciente->nombre }} {{ $paciente->apellido }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span style="color:white;font-size:30px"
                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-3 px-0">

                                                <div class="container text-center">
                                                    <div class="dato_bioquimico">
                                                        @if (isset($dato->imagen))
                                                            <img style="width:100%;" src="{{ $dato->imagen->url }}">
                                                        @else
                                                            <img alt="Imagen por defecto de que no hay imagen">
                                                        @endif
                                                    </div>

                                                </div>


                                                <div
                                                    class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                    <div
                                                        class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                        {{-- <button type="button"
                                                            class="btn btn-light mb-2 col-12 col-sm-5"
                                                            data-dismiss="modal">Cerrar</button> --}}
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="exampleModal-5{{ $dato->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#4b6ac3">
                                                <h5 class="modal-title text-lg-center text-white"
                                                    style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                    id="ModalLabel">Observaciones de
                                                    {{ $paciente->nombre }} {{ $paciente->apellido }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span style="color:white;font-size:30px"
                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-3 px-0">

                                                <div class="container text-center">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            @if (isset($dato->observaciones))
                                                                <label for="">{{ $dato->observaciones }}</label>
                                                            @else
                                                                <label for="">Sin observaciones</label>
                                                            @endif
                                                        </div>

                                                    </div>

                                                </div>


                                                <div
                                                    class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                    <div
                                                        class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                        {{-- <button type="button"
                                                            class="btn btn-light mb-2 col-12 col-sm-5"
                                                            data-dismiss="modal">Cerrar</button> --}}
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

            {{-- {{ $dietas->links() }} --}}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('administracion/js/historialPaciente.js') }}"></script>
    {{-- {{ $dietas->links() }} --}}
@endsection
