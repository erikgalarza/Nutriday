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
                                    <th>Actividad asignada</th>
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
                                            data-target="#exampleModal-4{{ $paciente->id }}" class="btn btn-info" title="Ver actividades asignadas"><i class="fas fa-eye"></i></a>
                                            @else
                                            No se han asignado actividades
                                            @endif
                                        </td>
                                        <td>
                                            <a title="Asignar actividad" href="{{route('actividad.asignar',$paciente->id)}}" class="btn btn-outline-info"><i
                                                    class="fas fa-reply"></i></a>

                                                    <a onclick="crearDietaFlash();" title="Crear dieta" class="btn btn-outline-success"><li class="fas fa-plus"></li></a>

                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $paciente->id }}"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('paciente.eliminar', $paciente->id) }}"
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </form>
                                    </tr>



                                    <div class="modal fade" id="exampleModal-4{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Actividades Asignadas</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-4">Nombre</div>
                                                    <div class="col-4">Duración</div>
                                                    <div class="col-4">Imagen</div>
                                                </div>
                                                <div class="row">
                                                    
                                                @foreach($paciente->actividades as $key => $actividad)
                                             
                                                <div class="col-4">{{$actividad->nombre}}</div>
                                                <div class="col-4">{{$duraciones[$key]->duracion}}</div>
                                                <div class="col-4"><img style="max-width:70px;" src="{{$actividad->imagen->url}}"></div>
                                          
                                                     @endforeach
                                                    </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="exampleModal-2{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Editar paciente</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="{{ route('paciente.actualizar') }}">
                                                        @csrf
                                                        <input name="idpaciente" type="hidden"
                                                            value="{{ $paciente->id }}">

                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Nombre</label>
                                                            <div class="col-sm-9">
                                                                <input name="name" type="text"
                                                                    value="{{ $paciente->nombre }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Apellido</label>
                                                            <div class="col-sm-9">
                                                                <input name="apellido" type="text"
                                                                    value="{{ $paciente->apellido }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Cédula</label>
                                                            <div class="col-sm-9">
                                                                <input name="cedula" type="text"
                                                                    value="{{ $paciente->cedula }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Teléfono</label>
                                                            <div class="col-sm-9">
                                                                <input name="telefono" type="text"
                                                                    value="{{ $paciente->telefono }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Correo electrónico</label>
                                                            <div class="col-sm-9">
                                                                <input name="email" type="text"
                                                                    value="{{ $paciente->user->email }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Contraseña</label>
                                                            <div class="col-sm-9">
                                                                <input name="password" type="text"
                                                                    placeholder="Nueva contraseña" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- MODAL DE DIETAS PARA ASIGNAR --}}
                                    <div class="modal fade" id="exampleModal-3{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="ModalLabel">Asignar dieta a
                                                        {{ $paciente->nombre }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"
                                                    style="padding:1.5rem 4rem">

                                                    <form method="POST" action="{{ route('dieta.guardarDietaAsignada') }}">
                                                        @csrf
                                                        <input type="hidden" name="paciente_id"
                                                            value="{{ $paciente->id }}">
                                                        <div class="col-sm-12">
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-5 col-form-label"><strong>Dietas disponibles:</strong>
                                                                </label>
                                                                <div class="col-sm-7">
                                                          
                                                            </div>
                                                            </div>
                                                            <div class="form-group row" style="">
                                                                <label class="col-sm-5 col-form-label"><strong>Fecha finaliza:</strong>
                                                                </label>
                                                                <div class="col-sm-7">
                                                                    <input style="border-radius: 10px" type="date" class="form-control" name="fecha_fin">
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                                        <div class=" modal-footer"style="justify-content: center; align-items:center">
                                                        <button type="submit" class="btn btn-success">Asignar</button>
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                    </form>


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
 <script>
     function crearDietaFlash(){
        // var imc =  document.getElementById('imcAux'+paciente.id).value;
        var form = document.getElementById('formCrearDietaFlash');
        form.submit();
     }
 </script>
@endsection
