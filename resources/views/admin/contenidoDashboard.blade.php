@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Inicio
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Inicio</a></li>
            </ol>
        </nav>
    </div>

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

<div class="card sombra">
    <div class=" mb-2" style="background-color: #4b6ac3 ;border-radius:5px 5px 0 0">
        <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
            Buscar pacientes</h3>
    </div>
    <div class="card-body p-0 m-0">

        <form method="GET" action="{{ route('admin.buscarPacientes') }}">

            <div class="d-flex justify-content-center">
                <div
                    class="buscador_paciente justify-content-center m-md-4 my-2 mx-2 mb-3  row align-items-center col-lg-8 ">
                    <div class="col-xl-9 col-sm-9   align-items-center">
                        <input type="search" name="paciente"
                            style="min-height:60px;border:1px solid #dce7e700;background-color:#dce7e7"
                            class="form-control ddd" placeholder="Escriba el nombre del paciente...Ejm: Andres Flores"
                            required>
                    </div>
                    <button title="Ingrese el nombre de un paciente para buscar" type="submit"
                        class="btn btn-success   col-xl-3 col-sm-3 col-6 text-center  mt-4 mt-sm-0 busca"style="min-height:60px;border-radius:30px;font-weight:bold"><i
                            class="fa-solid fa-magnifying-glass mr-xl-2 mr-lg-1 mr-1"></i>Buscar</button>
                </div>
            </div>
        </form>


    @if(isset($pacientes))
       @if (count($pacientes) == 0)
       <div class="container"style="max-width:722px">
               <div class="row text-center justify-content-center bg-danger  p-1 mb-3"
                   style="border-radius:10px">
                   <label class="text-white text-center col-form-label"
                       style="text-transform: uppercase;font-weight:bold">No existen pacientes con ese
                       nombre</label>
               </div>
           </div>
        @endif
    @endif
        </div>
</div>

@if(isset($pacientes))
    @if (count($pacientes) > 0)
        <div class="card mt-4">
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
                                    <th>Estado</th>
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
                                            <td><a href="{{ route('paciente.historial', $paciente->id) }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</a> </td>
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

                                                <td>
                                                    @if ($paciente->estado == 'activo')
                                                    <label  class="badge badge-pill badge-outline-success">{{ $paciente->estado }}</label>
                                                @else
                                                    <label class="badge badge-pill badge-outline-danger" >{{ $paciente->estado }}</a>
                                                @endif
                                                    </td>

                                            <td>
                                                <a title="Agregar datos antropométricos al paciente" class="btn btn-warning"
                                                    href="{{ route('da.datosByPaciente', $paciente->id) }}"><i
                                                        class="fa-solid fa-hospital-user" aria-hidden="true"></i></a>
                                                        <a title="Agregar dieta al paciente" class="btn btn-primary"
                                                        href="{{ route('dieta.dietasByPaciente', $paciente->id) }}"><i
                                                            class="fa-solid fa-clipboard-list" aria-hidden="true"></i></a>
                                                        <a title="Agregar actividades al paciente" class="btn btn-info"
                                                        href="{{ route('actividad.asignar', $paciente->id) }}"><i
                                                            class="fa-solid fa-dumbbell" aria-hidden="true"></i></a>

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
@endif

@if(auth()->user()->hasRole('Administrador'))
    <div class="card sombra mt-4">
        <div class=" mb-2" style="background-color:#7c7ce4;border-radius:5px 5px 0 0">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Buscar nutricionistas</h3>
        </div>
        <div class="card-body p-0 m-0">

            <form method="GET" action="{{ route('admin.buscarNutricionistas') }}">
                <div class="d-flex justify-content-center">
                    <div
                        class="buscador_paciente justify-content-center m-md-4 my-2 mx-2 mb-3  row align-items-center col-lg-8 ">
                        <div class="col-xl-9 col-sm-9   align-items-center">
                            <input type="search" name="nutricionista"
                                style="min-height:60px;border:1px solid #dce7e700;background-color:#dce7e7"
                                class="form-control ddd" placeholder="Escriba el nombre del nutricionista...Ejm: Alvaro Salazar"
                                required>
                        </div>
                        <button title="Ingrese el nombre de un nutricionista para buscar" type="submit"
                            class="btn btn-success   col-xl-3 col-sm-3 col-6 text-center  mt-4 mt-sm-0 busca"style="min-height:60px;border-radius:30px;font-weight:bold"><i
                                class="fa-solid fa-magnifying-glass mr-xl-2 mr-lg-1 mr-1"></i>Buscar</button>
                    </div>
                </div>
            </form>

           @if(isset($nutricionistas))
           @if (count($nutricionistas) == 0)
           <div class="container"style="max-width:722px">
                   <div class="row text-center justify-content-center bg-danger p-1 mb-3"
                       style="border-radius:10px">
                       <label class="text-white text-center col-form-label"
                           style="text-transform: uppercase;font-weight:bold">No existen nutricionistas con ese
                           nombre</label>
                   </div>
               </div>
       @endif
           @endif
            </div>
    </div>
@endif
    @if(isset($nutricionistas))
        @if (count($nutricionistas) > 0)
            <div class="card mt-4">
                <div class="card-body">
                    <div class="container w-75">
                        <div class="table-responsive">
                            <table id="order-listing" class="table text-center">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Especialidad</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nutricionistas as $key => $nutricionista)
                                        <form method="POST" id="formCrearDietaFlash"
                                           >
                                            @csrf
                                            <input type="hidden" name="paciente" value="{{ $nutricionista }}">
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $nutricionista->nombre }} {{ $nutricionista->apellido }}</td>

                                                    <td>{{$nutricionista->especialidad}}</td>
                                                    <td>{{$nutricionista->user->email}}</td>
                                                    <td>
                                                        @if ($nutricionista->estado == 'activo')
                                                        <label  class="badge badge-pill badge-outline-success">{{ $nutricionista->estado }}</label>
                                                    @else
                                                        <label class="badge badge-pill badge-outline-danger" >{{ $nutricionista->estado }}</a>
                                                    @endif
                                                        </td>
                                                <td>
                                                    <a title="" class="btn btn-success"
                                                        href=""><i
                                                            class="fa fa-plus" aria-hidden="true"></i></a>
                                                            <a title="" class="btn btn-info"
                                                            href=""><i
                                                                class="fa fa-plus" aria-hidden="true"></i></a>
                                                                <a title="" class="btn btn-danger"
                                                                href=""><i
                                                                    class="fa fa-plus" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </form>



                                        {{-- <div class="modal fade" id="exampleModal-2{{ $nutricionista->id }}" tabindex="-1"
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
                                        </div> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endif





@endsection
