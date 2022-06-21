@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Ver pacientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-4" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Datos Pacientes</h3>
        </div>

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="card-body text-center">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Tipo diabetes</th>
                                    <th>Seguimiento</th>
                                    {{-- <th>Dato antropométrico</th> --}}
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pacientes as $key => $paciente)
                                    <tr>

                                        <td>{{ $paciente->nombre }} {{ $paciente->apellido }}</td>

                                        <td>{{ $paciente->cedula }}</td>
                                        @if ($paciente->tipo_diabetes == 3)
                                            <td>Tipo gestacional</td>
                                        @else
                                            <td>Tipo {{ $paciente->tipo_diabetes }}</td>
                                        @endif
                                        <style>
                                            a.color1 {
                                                border-color: #7c7ce4 !important;
                                                color: #7c7ce4 !important;
                                            }

                                            a.color1:hover {
                                                background-color: #7c7ce4;
                                                color: white !important;
                                            }

                                            a.color2 {
                                                color: #392C70 !important;
                                            }

                                            a.color2:hover {
                                                color: white !important;
                                            }
                                        </style>
                                        <td>
                                            <a title="Progreso de paciente"
                                                href="{{ route('paciente.historial', $paciente->id) }}"
                                                class="btn btn-outline-dark mb-1  color1"><i
                                                    class="fas fa-chart-line"></i></a>


                                        </td>
                                        {{-- <td>
                                            <a title="Agregar datos antropométricos"
                                                href="{{ route('admin.agregarDatosAntropometricos', $paciente->id) }}"
                                                class="btn btn-outline-success mb-1"><i class="fas fa-plus"></i></a>

                                            <a title="Historial antropométrico" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $paciente->id }}"
                                                class="btn btn-outline-primary mb-1 color2"><i
                                                    class="fa-solid fa-hospital-user"></i></a>
                                        </td> --}}
                                        <td>
                                            @if ($paciente->estado == 'activo')
                                                <a title="Estado del paciente" class="btn btn-rounded btn-success"
                                                    href="{{ route('paciente.eliminar', $paciente->id) }}">{{ $paciente->estado }}</a>
                                            @else
                                                <a class="btn btn-rounded btn-danger"
                                                    href="{{ route('paciente.eliminar', $paciente->id) }}">{{ $paciente->estado }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a title="Ver más" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $paciente->id }}"
                                                class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>

                                            <a title="Editar paciente" class="btn btn-outline-warning mb-1"
                                                data-toggle="modal" data-target="#exampleModal-2{{ $paciente->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                            {{-- @if ($paciente->estado == 'activo')
                                                <a title="Eliminar paciente"
                                                    href="{{ route('paciente.eliminar', $paciente->id) }}"
                                                    class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i></a>
                                            @else
                                                <a href="{{ route('paciente.eliminar', $paciente->id) }}" title="Activar"
                                                    class="btn btn-outline-danger"><i class="fas fa-reply"></i></a>
                                            @endif --}}
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal-2{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title  text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="exampleModalLabel-2">Editar paciente</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row mt-3 mb-0 mr-0 ml-0  p-0 justify-content-center">
                                                        <div class="col-sm-9  col-11 text-left">
                                                            <form method="POST"
                                                                action="{{ route('paciente.actualizar') }}">
                                                                @csrf
                                                                <input style="border-radius:10px" name="idpaciente"
                                                                    type="hidden" value="{{ $paciente->id }}">

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Nombre:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="name"
                                                                            type="text"
                                                                            value="{{ $paciente->nombre }}"
                                                                            class="form-control" id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Apellido:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="apellido"
                                                                            type="text"
                                                                            value="{{ $paciente->apellido }}"
                                                                            class="form-control" id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Cédula:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="cedula"
                                                                            type="text"
                                                                            value="{{ $paciente->cedula }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Sexo:</label>
                                                                    <div class="col-sm-9">
                                                                        <select
                                                                            style="border-radius:10px; background-color:#F0F0F0;min-height:45.2px"
                                                                            class="form-control" name="sexo"
                                                                            id="">
                                                                            <option disabled>Seleccione una opción
                                                                            </option>
                                                                            <option value="1"
                                                                                {{ $paciente->sexo == "1" ? 'selected' : '' }}>
                                                                                Femenino</option>
                                                                            <option value="2"
                                                                                {{ $paciente->sexo == "2" ? 'selected' : '' }}>
                                                                                Masculino</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Teléfono:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="telefono"
                                                                            type="tel"
                                                                            value="{{ $paciente->telefono}}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Email:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="email"
                                                                            type="text"
                                                                            value="{{ $paciente->user->email }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:11px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-3 text-left col-form-label">Contraseña:</label>
                                                                    <div class="col-sm-9">
                                                                        <input
                                                                            style="border-radius:10px;background-color:#F0F0F0"
                                                                            name="password" type="text"
                                                                            placeholder="Nueva contraseña"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div
                                                            class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                            <div
                                                                class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                                <button type="submit"
                                                                    class="btn btn-success mb-2 col-12 col-sm-5 p-2">Guardar</button>
                                                                <button type="button"
                                                                    class="btn btn-light mb-2 col-12 col-sm-5 p-2"
                                                                    data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    {{-- MODAL DE DATOS ANTROPOMETRICOS --}}

                                    <style>
                                        @media (min-width:768px) {
                                            .dialogoss {
                                                min-width: 700px !important;
                                            }

                                        }
                                    </style>

                                    <div class="modal fade" id="exampleModal-3{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  dialogoss" !important;" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="exampleModalLabel-2">Datos paciente </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0">

                                                    <div class="col-12 row m-0 mb-sm-4 mb-3 justify-content-center">
                                                        <div class="col-md-12 row col-11 text-left justify-content-center">
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
                                                            <div class="col-12 col-md-6 row mt-md-2 mt-2 justify-content-center">
                                                                <div class="col-md-12 col-10">

                                                                    <label class="col-12 text-center"> <strong>Datos
                                                                            personales</strong> </label>
                                                                    <div class="pt-4 pb-3 pr-3 pl-3 pt-md-4 pb-md-1 pr-md-0 pl-md-3"
                                                                        style="border:1px dashed;min-height: 205px">
                                                                        <div class="form-group row mb-1">
                                                                            <label class="col-5 text-left"> <strong>
                                                                                    Nombre:</strong></label>
                                                                            <label
                                                                                class="col-7">{{ $paciente->nombre }}
                                                                                {{ $paciente->apellido }}</label>

                                                                        </div>
                                                                        <div class="form-group row mb-1">
                                                                            <label
                                                                                class="col-5 text-left"><strong>Cédula:</strong></label>
                                                                            <label class="col-7">
                                                                                {{ $paciente->cedula }}</label>

                                                                        </div>
                                                                        <div class="form-group row mb-1">
                                                                            <label
                                                                                class="col-5 text-left"><strong>Teléfono:</strong>
                                                                            </label>
                                                                            <label
                                                                                class="col-7">{{ $paciente->telefono }}</label>
                                                                        </div>

                                                                        <div class="form-group row mb-1">
                                                                            <label
                                                                                class="col-5 text-left"><strong>Email:</strong></label>
                                                                            <label
                                                                                class="col-7">{{ $paciente->user->email }}</label>
                                                                        </div>

                                                                        <div class="form-group row mb-1">
                                                                            <label
                                                                                class="col-5"><strong>Sexo:</strong></label>
                                                                            <label
                                                                                class="col-7">{{ $paciente->sexo == 1 ? 'Femenino' : 'Masculino' }}</label>
                                                                        </div>
                                                                        <div class="form-group row mb-1">
                                                                            <label class="col-5 text-left"><strong>Tipo
                                                                                    diabetes:</strong></label>
                                                                            @if ($paciente->tipo_diabetes == 3)
                                                                                <label class="col-7">Tipo
                                                                                    gestacional</label>
                                                                            @else
                                                                                <label class="col-7">Tipo
                                                                                    {{ $paciente->tipo_diabetes }}</label>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group row mb-1">
                                                                            <label class="col-5 text-left"><strong>Activo
                                                                                    desde:</strong></label>
                                                                            <label
                                                                                class="col-7">{{ $paciente->user->created_at }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div
                                                                class="col-12 col-md-6 row mt-md-2 mt-4 justify-content-center">
                                                                <div class="col-md-12 col-10">
                                                                    <label class="col-12 text-center"> <strong> Último dato
                                                                            antropométrico</strong></label>
                                                                    <div class="pb-3 pt-4 pr-3 pl-3 pt-md-3 pl-md-3 pr-md-0 pb-md-0"
                                                                        style="border:1px dashed;min-height: 205px">
                                                                        @foreach ($paciente->dato_antropometrico as $kp => $data)
                                                                            @if ($loop->last)
                                                                                <div class="form-group row mb-1">
                                                                                    <label
                                                                                        class="col-6 col-md-5"><strong>Altura:</strong>
                                                                                    </label>
                                                                                    <label
                                                                                        class="col-6 col-md-7">{{ $data->altura }} (m)</label>
                                                                                </div>

                                                                                <div class="form-group row mb-1">
                                                                                    <label
                                                                                        class="col-6 col-md-5"><strong>Peso:</strong></label>
                                                                                    <label
                                                                                        class="col-6 col-md-7">{{ $data->peso }} (kg)</label>
                                                                                </div>

                                                                                <div class="form-group row mb-1">
                                                                                    <label class="col-6 col-md-5"><strong>Grasa
                                                                                            corporal:</strong></label>
                                                                                    <label
                                                                                        class="col-6 col-md-7">{{ number_format($data->grasa_corporal, 0) }} %</label>
                                                                                </div>

                                                                                <div class="form-group row mb-1">
                                                                                    <label class="col-6 col-md-5"><strong>Masa
                                                                                            muscular:</strong></label>
                                                                                    <label
                                                                                        class="col-6 col-md-7">{{ number_format($data->masa_muscular, 0) }} %</label>
                                                                                </div>

                                                                                <div class="form-group row mb-1">
                                                                                    <label
                                                                                        class="col-6 col-md-5"><strong>IMC:</strong></label>
                                                                                    @if ($data->imc <= 18.4)
                                                                                        <label
                                                                                            class="col-6 col-md-7">{{ $data->imc }}
                                                                                            (Bajo peso)
                                                                                        </label>
                                                                                    @endif
                                                                                    @if ($data->imc >= 18.5 && $data->imc <= 24.9)
                                                                                        <label
                                                                                            class="col-6 col-md-7">{{ $data->imc }}
                                                                                            (Normal)</label>
                                                                                    @endif
                                                                                    @if ($data->imc >= 25 && $data->imc <= 29.9)
                                                                                        <label
                                                                                            class="col-6 col-md-7">{{ $data->imc }}
                                                                                            (Sobrepeso)</label>
                                                                                    @endif
                                                                                    @if ($data->imc >= 30)
                                                                                        <label
                                                                                            class="col-6 col-md-7">{{ $data->imc }}
                                                                                            (Obeso)</label>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="form-group row mb-1">
                                                                                    <label class="col-6 col-md-5 "><strong>Fecha
                                                                                            consulta:</strong></label>
                                                                                    <label
                                                                                        class="col-6 col-md-7">{{ $data->created_at }}</label>
                                                                                </div>
                                                                                <div class="form-group row mb-1">
                                                                                    <label
                                                                                        class="col-6 col-md-5"><strong>Observaciones:</strong></label>

                                                                                    @if (isset($data->observaciones))
                                                                                        <label
                                                                                            class="col-6 col-md-7">{{ $data->observaciones }}</label>
                                                                                    @else
                                                                                        <label class="col-6 col-md-7">Sin
                                                                                            observaciones</label>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 m-0 row justify-content-center">
                                                        <div class="col-md-6 p-0 col-8 text-center">
                                                            <a href="{{ route('paciente.estadosPaciente', $paciente->id) }}"
                                                                class="btn btn-outline-dark mb-2 col-12"><i
                                                                    class="fas fa-smile mr-2"></i>Estados de ánimo </a>
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
            </div>
        </div>
    </div>
@endsection
