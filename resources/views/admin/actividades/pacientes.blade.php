@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Actividades
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-5" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Asignar Actividad</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
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

                                        <td>{{ $paciente->nombre }}</td>
                                        <td>{{ $paciente->apellido }}</td>

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

                                        <td style="text-align:center;">
                                            @if(count($paciente->actividades)>0)
                                            <a data-toggle="modal"
                                            data-target="#exampleModal-4{{ $paciente->id }}" class="btn btn-outline-info" title="Ver actividades asignadas"><i class="fas fa-eye"></i></a>
                                            @else
                                            No se han asignado actividades
                                            @endif
                                        </td>
                                        <td>
                                            <a title="Asignar actividad" href="{{route('actividad.asignar',$paciente->id)}}" class="btn btn-outline-success"><i
                                                    class="fas fa-plus"></i></a>


                                            <a title="Eliminar asignación" href="{{ route('paciente.eliminar', $paciente->id) }}"
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </form>
                                    </tr>



                                    <div class="modal fade" id="exampleModal-4{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel-2">Actividades Asignadas</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                              <div class="modal-body text-center" style=" padding:1.5rem 3rem">
                                                <div class="row mb-5 " style="border-bottom:1px solid">
                                                    <div class="text-left col-5 font-weight-bold mb-2" >Nombre</div>
                                                    <div class="col-3  font-weight-bold mb-2">Duración</div>
                                                    <div class="col-4  font-weight-bold text-center mb-2">Imagen</div>
                                                </div>

                                                <div class="row">
                                                @foreach($paciente->actividades as $key => $actividad)

                                                <div class="col-5 mb-2 text-left">{{$actividad->nombre}}</div>
                                                <div class="col-3 mb-2 text-center">{{$duraciones[$key]->duracion}}</div>
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
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
