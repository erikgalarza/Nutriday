@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Pacientes
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
            <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos Pacientes</h3>
        </div>
        <div class="card-body text-center">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cédula</th>
                                    <th>Tipo diabetes</th>
                                    <th>Estado</th>

                                    <th>Datos antropometrico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pacientes as $key => $paciente)
                                    <tr>

                                        <td>{{ $paciente->nombre}}</td>
                                        <td>{{ $paciente->apellido }}</td>
                                        <td>{{ $paciente->cedula }}</td>
                                        @if ($paciente->tipo_diabetes == 3)
                                            <td>Tipo gestacional</td>
                                        @else
                                            <td>Tipo {{ $paciente->tipo_diabetes }}</td>
                                        @endif
                                        <td>
                                            @if($paciente->estado=="activo")
                                            <label class="badge badge-success">{{$paciente->estado}}</label>
                                            @else
                                            <label class="badge badge-danger">{{$paciente->estado}}</label>
                                            @endif
                                        </td>
                                        <td >
                                            <a href="{{route('paciente.historial',$paciente->id)}}"  title="Progreso" class="btn btn-outline-dark"><i class="fas fa-chart-line"></i></a>
                                        <a title="Agregar datos antropométricos" href="{{route('admin.agregarDatosAntropometricos',$paciente->id)}}" class="btn btn-outline-info"><i class="fas fa-plus"></i></a>
                                        </td>
                                        <td>
                                            <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{ $paciente->id }}"
                                                class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $paciente->id }}"><i
                                                    class="fas fa-edit"></i></a>
                                            @if($paciente->estado=="activo")
                                                    <a href="{{ route('paciente.eliminar', $paciente->id) }}"
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                                        @else
                                                        <a href="" title="Activar"
                                                            class="btn btn-outline-danger"><i class="fas fa-reply"></i></a>
                                                        @endif
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal-2{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title  text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="exampleModalLabel-2">Editar paciente</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="padding:1.5rem 6rem">

                                                    <form method="POST" action="{{ route('paciente.actualizar') }}">
                                                        @csrf
                                                        <input style="border-radius:10px"  name="idpaciente" type="hidden" value="{{ $paciente->id }}">

                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Nombre:</label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px"  name="name" type="text"
                                                                    value="{{ $paciente->nombre }}" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Apellido:</label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px"  name="apellido" type="text"
                                                                    value="{{ $paciente->apellido }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Cédula:</label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px"  name="cedula" type="text"
                                                                    value="{{ $paciente->cedula }}" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Sexo:</label>
                                                            <div class="col-sm-8">
                                                                <select style="border-radius:10px; background-color:#F0F0F0" class="form-control" name="sexo" id="">
                                                                    <option selected disabled>Seleccione una opción</option>
                                                                    <option value="1" {{old('sexo') == '1'?'selected':''}}>Femenino</option>
                                                                    <option value="2" {{old('sexo') == '2'?'selected':''}}>Masculino</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Teléfono:</label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px"  name="telefono" type="text"
                                                                    value="{{ $paciente->telefono }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Email:</label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px"  name="email" type="text"
                                                                    value="{{ $paciente->user->email }}" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-2">
                                                            <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                                                class="col-sm-4 text-left col-form-label">Contraseña:</label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px;background-color:#F0F0F0"  name="password" type="text"
                                                                    placeholder="Nueva contraseña" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>



                                                </div>
                                                <div class="modal-footer" style="justify-content: center; align-items:center">
                                                    <button type="submit" class="btn btn-success">Guardar</button>
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- MODAL DE DATOS ANTROPOMETRICOS --}}

                                    <div class="modal fade" style="min-width:700px !important;" id="exampleModal-3{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="min-width:700px !important;" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="exampleModalLabel-2">Datos paciente </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span  style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"
                                                    style=" flex-wrap:wrap; padding:1.5rem 1rem">

                                                    {{-- <div>
                                                        @if (isset($paciente->imagen->url) && $sexos[$key]->sexo == 1)
                                                            <img class="img-thumbnail"
                                                                style="max-width:200px; margin-top:80px;"
                                                                src="{{ $paciente->imagen->url }}">
                                                        @else
                                                            <img class="img-thumbnail"
                                                                style="max-width:200px; margin-top:80px;"
                                                                src="{{ asset('img/mujer.png') }}">
                                                        @endif
                                                    </div> --}}

                                                    <div class="d-flex col-12" style="text-transform: uppercase;font-weight:bold">
                                                        <label class="col-6">Datos personales</label>
                                                        <label class="col-6">Datos antropométricos</label>
                                                    </div>

                                                    <div class="d-flex col-12 text-left mt-2 mb-3">

                                                        <div class="datos-personales col-5 py-4 ml-4" style="border:1px dashed">

                                                        <div class="form-group row mb-1">
                                                            <label class="col-4 text-left"> <strong> Nombre:</strong></label>
                                                            <label class="col-8">{{ $paciente->nombre }}</label>

                                                        </div>
                                                        <div class="form-group row mb-1">
                                                            <label class="col-4 text-left"><strong>Apellido:</strong>
                                                            </label>
                                                            <label class="col-8" >{{ $paciente->apellido }}</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-4 text-left"><strong>Cedula:</strong></label>
                                                            <label class="col-8"> {{ $paciente->cedula }}</label>

                                                        </div>
                                                        <div class="form-group row mb-1">
                                                            <label class="col-4 text-left"><strong>Teléfono:</strong>
                                                            </label>
                                                            <label class="col-8">{{ $paciente->telefono }}</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-4 text-left"><strong>Email:</strong></label>
                                                            <label class="col-8">{{ $paciente->user->email }}</label>
                                                        </div>

                                                    </div> <!-- div de fin de datos personales -->
                                                    <div class="col-1"></div>
 <!-- =================================================================================================-->
                                                    <div class="col-5 text-left py-3" style="border:1px dashed"> <!-- div de datos de antropometricos -->
                                                        @foreach($paciente->dato_antropometrico as $kp => $data)
                                                        @if($loop->last)
                                                        <div class="form-group row mb-1">
                                                            <label class="col-6"><strong>Sexo:</strong></label>
                                                            <label class="col-6" >{{ $data->sexo == 1 ? 'Femenino' : 'Masculino' }}</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-6"><strong>Altura:</strong>
                                                                </label>
                                                                <label class="col-6">{{ $data->altura }}mts</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-6"><strong>Peso:</strong></label>
                                                            <label class="col-6">{{ $data->peso }}kg</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-6"><strong>Grasa corporal:</strong></label>
                                                            <label class="col-6">{{ number_format($data->grasa_corporal,0)}}%</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-6"><strong>Masa muscular:</strong></label>
                                                            <label class="col-6">{{ number_format($data->masa_muscular,0) }} %</label>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            @if($data->imc <= 18.4)
                                                            <label class="col-6"><strong>IMC:</strong>
                                                            </label>
                                                            <label class="col-6">{{ $data->imc }} (Bajo peso)</label>
                                                            @endif
                                                            @if($data->imc >=18.5 &&  $data->imc <= 24.9)
                                                            <label class="col-6"><strong>IMC:</strong>
                                                            </label>
                                                            <label class="col-6">{{ $data->imc }} (Normal)</label>
                                                            @endif
                                                            @if($data->imc >=25 &&  $data->imc <= 29.9)
                                                            <label class="col-6"><strong>IMC:</strong>
                                                            </label>
                                                            <label class="col-6">{{ $data->imc }} (Sobrepeso)</label>
                                                            @endif
                                                            @if($data->imc >=30)
                                                            <label class="col-6"><strong>IMC:</strong>
                                                            </label>
                                                            <label class="col-6">{{ $data->imc }} (Obeso)</label>
                                                            @endif
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div> <!-- div de datos antropometricos -->
                                                    </div>
                                                    <style type="text/css">
                                                        .color1{
                                                            color:#4b6ac3;
                                                        }
                                                    </style>

                                                    <div class="datos_extras col-12">
                                                        <a style="min-width: 50%"href="{{route('actividad.actividadesByPaciente',$paciente->id)}}"  class="btn btn-outline-dark mb-2"><i class="fas fa-tasks mr-2"></i>Historial de actividades</a>
                                                        <a style="min-width: 50%" href="{{route('paciente.estadosPaciente',$paciente->id)}}" class="btn btn-outline-dark "><i class="fas fa-smile mr-2"></i>Estados de ánimo</a>

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


    <div class="col-md-6 grid-margin stretch-card">


        <!-- Dummy Modal Ends -->
        <!-- Modal starts -->


        <!-- Modal Ends -->

    </div>
@endsection
