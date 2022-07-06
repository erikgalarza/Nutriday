@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Actividades
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
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
        }
        @media(min-width:1200px){
    .busca{
        max-width:140px !important;
    }
}
@media (min-width:480px) and (max-width:767px){
    .busca{
        max-width: 140px !important;
    }

}
.ddd:hover{
    border:1px solid #4b6ac3 !important;
    min-height:65px !important;
    background-color: #f1f1f1 !important;
    transition: min-height 200ms,background-color 1s ;
}
    </style>
    <div class="card sombra">
        <div class=" mb-2" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Buscar pacientes</h3>
        </div>
        <div class="card-body p-0 m-0">
            <form method="GET" action="{{ route('actividad.buscarPacientes') }}">
                <div class="d-flex justify-content-center">
                    <div
                        class="buscador_paciente justify-content-center m-md-4 my-2 mx-2 mb-3  row align-items-center col-lg-8 ">
                        <div class="col-xl-9 col-sm-9   align-items-center">
                            <input type="search" name="paciente"
                                style="min-height:60px;border:1px solid #dce7e700;background-color:#dce7e7"
                                class="form-control ddd" placeholder="Escriba el nombre del paciente...Ejm: Andres Morales"
                                required>
                        </div>
                        <button title="Ingrese el nombre de un paciente para buscar" type="submit"
                            class="btn btn-success   col-xl-3 col-sm-3 col-6 text-center  mt-4 mt-sm-0 busca"style="min-height:60px;border-radius:30px;font-weight:bold"><i
                                class="fa-solid fa-magnifying-glass mr-xl-2 mr-lg-1 mr-1"></i>Buscar</button>
                    </div>
                </div>
            </form>

            @if (count($pacientes) == 0)
                <div class="container"style="max-width:740px">
                    <div class="container" >
                        <div class="row text-center justify-content-center  p-1 mb-3 bg-danger"
                            style="border-radius:10px">
                            <label class="text-white text-center col-form-label"
                                style="text-transform: uppercase;font-weight:bold">No existen pacientes con ese
                                nombre</label>
                        </div>
                    </div>
                </div>
            @endif
        </div>

@if (count($pacientes) > 0)
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="container">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Nutricionista</th>
                                    <th>Actividades asignadas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pacientes as $key => $paciente)
                                <form method="POST" id="formCrearDietaFlash" action="{{route('dieta.crearDietaFlash')}}">
                                    @csrf
                                   <input type="hidden" name="paciente" value="{{$paciente}}">
                                    <tr>

                                        <td>{{$key+1}}</td>
                                        <td>{{ $paciente->nombre }} {{ $paciente->apellido }}</td>

                                        @if ($paciente->tipo_diabetes == 3)
                                            <td>Tipo gestacional</td>
                                        @else
                                            <td>Tipo {{ $paciente->tipo_diabetes }}</td>
                                        @endif

                                        @if(count($paciente->dato_antropometrico)>0)
                                        @foreach($paciente->dato_antropometrico as $kp => $data)
                                        @if($loop->last)
                                        <td>{{$data->imc}}</td>

                                       <input type="hidden" name="imc" id="imcAux{{$paciente->id}}" value="{{$data->imc}}">
                                        @endif
                                            @endforeach
                                            @else
                                            <td>0</td>
                                            @endif
                                            <td>{{$responsable}}</td>

                                        <td style="text-align:center;">
                                            @if(count($paciente->actividades)>0)
                                            <a data-toggle="modal"
                                            data-target="#exampleModal-4{{ $paciente->id }}" class="btn btn-outline-info" title="Ver actividades asignadas"><i class="fas fa-eye"></i></a>
                                            @else
                                            No se han asignado actividades
                                            @endif
                                        </td>
                                        <td>
                                            <a title="Asignar actividad" href="{{route('actividad.asignar',$paciente->id)}}" class="btn btn-warning"><i
                                                    class="fas fa-plus"></i></a>
                                        </td>
                                    </form>
                                    </tr>



                                    <div class="modal fade" id="exampleModal-4{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel-2">Actividades Asignadas </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                              <div class="modal-body text-center" style=" padding:1.5rem 3rem">
                                                <div class="row mb-5 " style="border-bottom:1px solid">
                                                    <div class="text-left col-3 font-weight-bold mb-2" >Nombre</div>
                                                    <div class="text-left col-3 font-weight-bold mb-2" >Prioridad</div>
                                                    <div class="col-2  font-weight-bold mb-2"><i class="far fa-clock" title="Duración"></i></div>
                                                    <div class="col-4  font-weight-bold text-center mb-2">Imagen</div>
                                                </div>

                                                <div class="row">
                                                @foreach($paciente->actividades as $key => $actividad)

                                                <div class="col-3 mb-2 text-left">{{$actividad->nombre}}</div>
                                                <div class="col-3 mb-2 text-center">{{$actividad->prioridad}}</div>
                                                <div class="col-2 mb-2 text-center">{{$duraciones[$key]->duracion}}</div>

                                                <div class="col-4 mb-2"><img style="max-width:70px;border-radius:10px" src="{{$actividad->imagen->url}}"></div>

                                                     @endforeach
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
@endif


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
