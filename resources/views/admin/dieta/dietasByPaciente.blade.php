@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Dietas por paciente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dietas por paciente</li>
            </ol>
        </nav>
    </div>


    <style>
        @media (max-width:992px){
    .consulta{
        order:2;
    }
}
</style>
<div class="card ">
    <div class="mb-3" style="background-color:#4b6ac3;border-radius:5px 5px 0 0">
        <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
            Paciente {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
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
                                                <label class="col-form-label" style=";font-size:16px">{{ date('Y-m-d',strtotime($data->created_at))}}
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
                    <input type="hidden" id="datosAntropometricos" value="{{$datos}}"> 
                    <canvas id="sales-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-2 pb-3  text-center">
        <a title="Asignar una dieta predefinida a {{ $paciente->nombre }}" data-toggle="modal"
            data-target="#exampleModal-4" class="btn btn-success"><i
                class="fas fa-share mr-2"></i> Asignar dieta </a>
        <a title="Crear una dieta personalizada a {{ $paciente->nombre }}"
            onclick="event.preventDefault();document.getElementById('formCrearDieta').submit();"
            class="btn btn-warning"><i class="fas fa-plus mr-2"></i> Crear dieta </a>
        <form id="formCrearDieta" method="POST" action="{{ route('dieta.crearDietaFlash') }}">
            @csrf
            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
        </form>
    </div>
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

    <div class="card mt-3">
        <div class="card-body">
            <div class="container ">
                <div class="table-responsive">
                    <table id="order-listing" class="table text-center">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre dieta</th>
                                <th>Tipo diabetes</th>
                                <th>IMC</th>
                                <th>Alimentos</th>
                                <th>Fecha Inicio / Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dietas as $key => $dieta)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $dieta->nombre }}</td>
                                    <td>{{ $dieta->tipo_diabetes }}</td>
                                    <td>{{$dieta->imc}}</td>
                                    <td>
                                        <a title="Agregar alimentos a la dieta"
                                            href="{{ route('alimento.addAlimentoDieta', $dieta->id) }}"
                                            class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>
                                        <a title="Ver alimentos" class="btn btn-outline-primary mb-1"
                                            href="{{ route('alimento.alimentosByDieta', $dieta->id) }}"><i
                                                class="fa-solid fa-utensils"></i></a>
                                    </td>
                                           <td>
                                            {{date('Y-m-d',strtotime($fechasFinAsignacion[$key]))}} /
                                            {{date('Y-m-d',strtotime($fechasFinDieta[$key]))}}
                                        </td>
                                    <td>
                                        @if($dieta->estado=='activa')
                                        <label for="" class="badge badge-pill badge-success">{{$dieta->estado}}</label>
                                        @endif
                                        @if($dieta->estado=='inactiva')
                                        <label for="" class="badge badge-pill badge-danger">{{$dieta->estado}}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a title="Ver más" data-toggle="modal" style="max-width: 50px"
                                            data-target="#exampleModal-3{{$key}}"
                                            class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>
                                        <a title="Editar datos de la dieta" class="btn btn-outline-warning mb-1"
                                            data-toggle="modal" data-target="#exampleModal-2{{$key}}"><i
                                                class="fas fa-edit"></i></a>

                                              
                                                @if($dieta->estado=='inactiva')
                                                <form method="post" id="deletedieta{{$key}}" style="min-width: 50px"
                                                action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a title="Activar" style="min-width: 50px"
                                                onclick="document.getElementById('deletedieta'+{{$key}}).submit();"  
                                                    type="submit" class="btn btn-outline-danger mb-1"><i
                                                        class="fas fa-share"></i></a>
                                                    </form>
                                        @else
                                        <form method="post" id="deletedieta{{$key}}" style="min-width: 50px"
                                        action="{{ route('dieta.destroy', $dieta->id) }}" class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a title="Eliminar dieta" style="min-width: 50px"
                                        onclick="obtenerKey({{$key}});eliminarDieta({{$dieta}})"  
                                            type="submit" class="btn btn-outline-danger mb-1"><i
                                                class="fas fa-trash"></i></a>
                                    </form>
                                        @endif

                                    </td>
                                </tr>
                                <input type="hidden" id="key{{$key}}" value="{{$key}}">

                                <div class="modal fade" id="exampleModal-2{{ $key }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#4b6ac3">
                                                <h5 class="modal-title text-white"
                                                    style="text-transform: uppercase; font-weight:bold; font-size:16px"id="exampleModalLabel-2">
                                                    Editar dieta</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span style="color:white;font-size:30px"
                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-2 px-0">
                                                <div class="col-12 row m-0 justify-content-center">
                                                    <div class="col-sm-9 mt-4 col-11 text-left">
                                                        <form method="POST"
                                                            action="{{ route('dieta.update', $dieta->id) }}">
                                                            @csrf
                                                            {{ method_field('PATCH') }}

                                                            <div class="form-group row mb-3">
                                                                <label for="exampleInputUsername2"
                                                                    class="col-sm-4 col-form-label"><strong>Nombre
                                                                        dieta:</strong></label>
                                                                <div class="col-sm-8">
                                                                    <input name="nombre" type="text"
                                                                        value="{{ $dieta->nombre }}"
                                                                        class="form-control" id="exampleInputUsername2"
                                                                        >
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-3">
                                                                <label for="exampleInputEmail2"
                                                                    class="col-sm-4 col-form-label">
                                                                    <strong>Tipo diabetes:</strong></label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="tipo_diabetes"
                                                                        id=""
                                                                        style="min-height:45.2px;background-color:#F0F0F0"
                                                                        >

                                                                        <option value="1"
                                                                            {{ $dieta->tipo_diabetes == '1' ? 'selected' : '' }}>
                                                                            Tipo 1</option>
                                                                        <option value="2"
                                                                            {{ $dieta->tipo_diabetes == '2' ? 'selected' : '' }}>
                                                                            Tipo 2</option>
                                                                        <option value="3"
                                                                            {{ $dieta->tipo_diabetes == '3' ? 'selected' : '' }}>
                                                                            Gestacional</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-3">
                                                                <label for="exampleInputUsername2"
                                                                    class="col-sm-4 col-form-label"><strong>IMC:</strong></label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="imc"
                                                                        class="form-control"
                                                                        id=""style="min-height:45.2px;background-color:#F0F0F0"
                                                                        >
                                                                        <option value="1"
                                                                            {{ $dieta->imc == '1' ? 'selected' : '' }}>
                                                                            Bajo peso</option>
                                                                        <option value="2"
                                                                            {{ $dieta->imc == '2' ? 'selected' : '' }}>
                                                                            Normal</option>
                                                                        <option value="3"
                                                                            {{ $dieta->imc == '3' ? 'selected' : '' }}>
                                                                            Sobrepeso</option>
                                                                        <option value="4"
                                                                            {{ $dieta->imc == '4' ? 'selected' : '' }}>
                                                                            Obeso</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label for="exampleInputUsername2"
                                                                    class="col-sm-4 col-form-label"><strong>Observaciones:</strong></label>
                                                                <div class="col-sm-8">
                                                                    <textarea name="observaciones"cols="30" rows="5" class="form-control" id="exampleInputUsername2"
                                                                        >{{ $dieta->observaciones }}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <br>
                                                    </div>
                                                    <div
                                                        class="modal-footer mt-2 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                        <div
                                                            class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                                                            <button type="submit"
                                                                class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                                                            <button type="button"
                                                                class="btn btn-light mb-2 col-12 col-sm-5"
                                                                data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal-3{{ $key }}" tabindex="-1"
                                    role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #4b6ac3">
                                                <h5
                                                    class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;  id="ModalLabel">
                                                    Datos de la dieta</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span style="color:white;font-size:30px"
                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-3 px-0">

                                                <div class="col-12 row m-0 justify-content-center">
                                                    <div class="col-sm-12 pl-3 col-11 text-left justify-content-center">

                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4"><strong>Nombre:</strong>
                                                            </label>
                                                            <label class="col-sm-8">{{ $dieta->nombre }}</label>
                                                        </div>

                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4"><strong>Tipo de
                                                                    diabetes:</strong> </label>
                                                            <label class="col-sm-8">{{ $dieta->tipo_diabetes }}</label>
                                                        </div>

                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4"><strong>IMC:</strong></label>
                                                            <label class="col-sm-8">{{ $dieta->imc }}
                                                                (Normal)
                                                            </label>

                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4"><strong>Observaciones:</strong></label>
                                                            @if (isset($dieta->observaciones))
                                                                <label
                                                                    class="col-sm-8">{{ $dieta->observaciones }}</label>
                                                            @else
                                                                <label class="col-sm-8">Sin
                                                                    observaciones</label>
                                                            @endif
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4"><strong>Fecha
                                                                    creación:</strong></label>
                                                            <label class="col-sm-8">{{ date('Y-m-d',strtotime($dieta->created_at)) }}</label>
                                                        </div>
                                                        @foreach ($paciente->dato_antropometrico as $kp => $data)
                                                            @if ($loop->last)
                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-4"><strong>Fecha
                                                                            asignación:</strong></label>
                                                                    <label
                                                                        class="col-sm-8">{{ date('Y-m-d',strtotime($data->created_at))}}</label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
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

    

    <div class="modal fade" id="exampleModal-4" tabindex="-1"
        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#4b6ac3">
                    <h5 class="modal-title text-center text-white"
                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                        id="ModalLabel">Asignar dieta a
                        {{ $paciente->nombre }} {{ $paciente->apellido }}</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span style="color:white;font-size:30px"
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3 px-0">

                    <div class="col-12 row m-0 justify-content-center">
                        <div class="col-sm-10 col-11 text-left justify-content-center">

                            <form method="POST"
                                action="{{ route('dieta.guardarDietaAsignada') }}">
                                @csrf
                                <input type="hidden" name="paciente_id"
                                    value="{{ $paciente->id }}">

                                <div class="form-group row mb-1" style="">
                                    <label class="col-sm-5 col-form-label"><strong>Fecha
                                            Consulta:</strong></label>

                                    @foreach ($paciente->dato_antropometrico as $kp => $data)
                                        @if ($loop->last)
                                            <label class="col-sm-7 col-form-label">
                                                {{ date('Y-m-d',strtotime($data->created_at)) }}</label>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-5 col-form-label"><strong>Dietas
                                            disponibles:</strong>
                                    </label>
                                    <div class="col-sm-7">
                                        <select
                                            style="border-radius: 10px;background-color:#F0F0F0;min-height:45.2px"
                                            class="form-control" name="dieta_id">
                                            <option value="" disabled selected>
                                                Seleccione una
                                                dieta</option>
                                            @foreach ($dietasDisponibles as $dieta)
                                                <option value="{{ $dieta->id }}">
                                                    {{ $dieta->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2" style="">
                                    <label class="col-sm-5 col-form-label"><strong>Fecha
                                            fin:</strong>
                                    </label>
                                   
                                    <div class="col-sm-7">
                                        <input style="border-radius: 10px" type="date"
                                            class="form-control" min="{{date('Y-m-d')}}" name="fecha_fin">
                                    </div>
                                </div>
                        </div>
                        <div
                            class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                            <div
                                class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                <button type="submit"
                                    class="btn btn-success mb-2 col-12 col-sm-5">Asignar</button>
                                <button type="button"
                                    class="btn btn-light mb-2 col-12 col-sm-5"
                                    data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                        </form>
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
<script src="{{ asset('administracion/js/historialPaciente.js') }}"></script>

    <script>
        var k = null;
        function obtenerKey(key)
        {
            k = key;
            
        }

  function eliminarDieta(dieta) {
        var form = document.getElementById('deletedieta' +k);
        swal({
            title: "Estas seguro que quieres la dieta " + dieta.nombre + " ?",
            text: "Al confirmar, la dieta será eliminada permanentemente!",
            icon: "warning",
            buttons: [
                'No, cancelar!',
                'Si, estoy seguro!'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                form.submit(); // <--- submit form programmatically
            }
        })

    }
    </script>
@endsection
