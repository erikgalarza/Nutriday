@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Datos antropométricos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Datos antropométricos</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-2" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Buscar pacientes</h3>
        </div>
        <div class="card-body p-0 m-0">

            <style>
                .sombra {
                    -webkit-box-shadow: 20px 21px 25px -6px rgba(133, 139, 171, 1);
                    -moz-box-shadow: 20px 21px 25px -6px rgba(133, 139, 171, 1);
                    box-shadow: 20px 21px 25px -6px rgba(133, 139, 171, 1);
                }

                .ddd:hover {
                    border: 1px solid #4b6ac3 !important;
                    min-height: 65px !important;
                    background-color: #f1f1f1 !important;
                    transition: min-height 200ms, background-color 1s;
                }

                @media(min-width:1200px) {
                    .busca {
                        max-width: 140px !important;
                    }
                }

                @media (min-width:480px) and (max-width:767px) {
                    .busca {
                        max-width: 140px !important;
                    }
                }
            </style>

            <form method="GET" action="{{ route('da.buscarPacientes') }}">

                <div class="d-flex justify-content-center">
                    <div
                        class="buscador_paciente justify-content-center m-md-4 my-2 mx-2 mb-3  row align-items-center col-lg-8 ">
                        <div class="col-xl-9 col-sm-9   align-items-center">
                            <input type="search" name="paciente"
                                style="min-height:60px;border:1px solid #dce7e700;background-color:#dce7e7"
                                class="form-control ddd" placeholder="Escriba el nombre del paciente...Ejm: Erik Galarza"
                                required>
                        </div>
                        <button title="Ingrese el nombre de un paciente para buscar" type="submit"
                            class="btn btn-success   col-xl-3 col-sm-3 col-6 text-center  mt-4 mt-sm-0 busca"style="min-height:60px;border-radius:30px;font-weight:bold"><i
                                class="fa-solid fa-magnifying-glass mr-xl-2 mr-lg-1 mr-1"></i>Buscar</button>
                    </div>
                </div>
            </form>

            @if (count($pacientes) == 0)
                <div class="container"style="max-width:832px">
                    <div class="container" style="max-width:832px">
                        <div class="row text-center justify-content-center  p-1 mb-3"
                            style="border-radius:10px;background-color:red">
                            <label class="text-white text-center col-form-label"
                                style="text-transform: uppercase;font-weight:bold">No existen pacientes con ese
                                nombre</label>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>


    @if (count($pacientes) > 0)
        <div class="card mt-3">
            <div class="card-body">
                <div class="container w-75">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Paciente</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Nutricionista</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $key => $paciente)
                                    <form method="POST" id="formCrearDietaFlash"
                                        action="{{ route('dieta.crearDietaFlash') }}">
                                        @csrf
                                        <input type="hidden" name="paciente" value="{{ $paciente }}">
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $paciente->nombre }} {{ $paciente->apellido }}</td>
                                            @if ($paciente->tipo_diabetes == 3)
                                                <td>Tipo gestacional</td>
                                            @else
                                                <td>Tipo {{ $paciente->tipo_diabetes }}</td>
                                            @endif

                                            @if (count($paciente->dato_antropometrico) > 0)
                                                @foreach ($paciente->dato_antropometrico as $kp => $data)
                                                    @if ($loop->last)
                                                        <td>{{ $data->imc }}</td>
                                                        <input type="hidden" name="imc"
                                                            id="imcAux{{ $paciente->id }}" value="{{ $data->imc }}">
                                                    @endif
                                                @endforeach
                                            @else
                                                <td>No existe IMC</td>
                                            @endif
                                            <td>Erik Galarza</td>
                                            <td>
                                                <a title="Agregar datos antropométricos al paciente" class="btn btn-warning"
                                                    href="{{ route('da.datosByPaciente', $paciente->id) }}"><i
                                                        class="fa fa-plus" aria-hidden="true"></i></a>


                                            </td>
                                        </tr>
                                    </form>



                                    <div class="modal fade" id="exampleModal-2{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="exampleModalLabel-2">Dieta asignada</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">


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
    @endif



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function crearDietaFlash() {
            // var imc =  document.getElementById('imcAux'+paciente.id).value;
            var form = document.getElementById('formCrearDietaFlash');
            form.submit();
        }
    </script>
@endsection
