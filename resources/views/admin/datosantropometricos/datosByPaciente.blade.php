@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Ver datos antropométricos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Datos antropométricos</li>
            </ol>
        </nav>
    </div>

    <style>
            @media(max-width:1199px) {
                .container2 {
                    max-width: 420px;
                }
            }
            @media(min-width:1199px) {
                .container3 {
                    max-width: 420px;
                }

            }
            @media(min-width:1200px) {
                .container4 {
                    min-width: 810px;
                    max-width: 1140px;

                }
            }
        .btn-outline-primary:hover{
            color: white !important;
        }
        .btn-outline-info:hover{
            color: white !important;
        }
    </style>

    <div class="card">

        <div class=" mb-2" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos
                antropométricos de {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
        </div>
        <div class="card-body">
            <div class="container container2 container3 container4" >
                <div class="row justify-content-center mb-3 ml-0" style="border:1px dashed; border-radius:10px ">
                    <div class="col-12 form-group text-center mb-1 row justify-content-center"
                        style="border-bottom:1px dashed;background-color:#dce7e7;border-radius:10px 10px 0 0">
                        <div class="col-xl-8 row justify-content-center">
                            <div class="col-xl-3 col-5  no-gutters p-0 text-center ">
                                <label class=" col-form-label " style="font-size:16px;font-weight:bold">Última
                                    consulta:</label>
                            </div>
                            @foreach ($paciente->dato_antropometrico as $kp => $data)
                                @if ($loop->last)
                                    <div class=" col-xl-4 col-6 no-gutters p-0 text-center ">
                                        <label class="col-form-label" style=";font-size:16px">{{ $data->created_at }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 ">
                    <div class="row justify-content-center align-items-center px-2 mt-xl-2">
                        <div class="col-9 col-xl-12 row pr-0 pl-4 pl-xl-2 justify-content-center">
                        <div class="form-group  col-xl-2 row text-xl-center text-left mb-1 ">
                            <label class="col-xl-12 col-6 col-form-label p-1"><strong>Edad:</strong></label>
                            <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $paciente->edad }}</label>
                        </div>
                        <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                            <label class="col-xl-12 col-6 col-form-label p-1"><strong>Tipo diabetes:</strong></label>
                            <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $paciente->tipo_diabetes }}</label>
                        </div>
                        @foreach ($paciente->dato_antropometrico as $kp => $data)
                            @if ($loop->last)
                                <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                    <label class="col-xl-12 col-6 col-form-label p-1"><strong>Peso: </strong></label>
                                    <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->peso }}</label>
                                </div>
                                <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                    <label class="col-xl-12 col-6 col-form-label p-1"><strong>Grasa corporal: </strong></label>
                                    <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->grasa_corporal }} (%)</label>
                                </div>
                                <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                    <label class="col-xl-12 col-6 col-form-label p-1"><strong>Masa muscular: </strong></label>
                                    <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->masa_muscular }} (%)</label>
                                </div>
                                @if ($data->imc <= 18.4)
                                    <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                        <label class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                        <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }} (Bajo peso)</label>
                                    </div>
                                @endif

                                @if ($data->imc >= 18.5 && $data->imc <= 24.9)
                                    <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                        <label class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                        <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }} (Normal)</label>
                                    </div>
                                @endif

                                @if ($data->imc >= 25 && $data->imc <= 29.9)
                                    <div class="form-group col-xl-2 row text-xl-center text-left mb-1 ">
                                        <label class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                        <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }} (Sobrepeso)</label>
                                    </div>
                                @endif

                                @if ($data->imc >= 30)
                                    <div class="form-group col-xl-2 row text-xl-center text-left mb-1 ">
                                        <label class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                        <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }} (Obeso)</label>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    </div>
                </div>
                </div> <!-- del contenedor -->

                <div class="container text-center py-3">

                    <a href="{{ route('admin.agregarDatosAntropometricos', $paciente->id) }}" class="btn btn-warning"><i
                            class="fas fa-plus mr-2"></i> Agregar datos antropométricos </a>
                </div>
            </div>
        </div>
    </div>


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
                                    <td>{{ $dato->created_at }}</td>
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
    {{-- {{ $dietas->links() }} --}}
@endsection
