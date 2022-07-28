@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Progreso del paciente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Progreso del paciente</li>
            </ol>
        </nav>
    </div>

    <div class="card ">
        <div class="mb-3" style="background-color:#4b6ac3">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Información personal</h3>
        </div>
        <div class="row px-3" style="margin-top:10px;">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title text-center"
                            style="text-transform: uppercase; font-weight:bold;font-size: 14px">{{ $paciente->nombre }}
                            {{ $paciente->apellido }}</h4>
                        <div>
                            @if(isset($paciente->imagen))
                                <img style="max-width:300px;max-height:200px;border-radius:8px" src="{{$paciente->imagen->url }}" alt="Foto del paciente">
                            @else
                            <img style="max-width:300px;max-height:200px" src="{{asset('img/hombre.png')}}" alt="Foto del paciente">
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center pb-3">
                        <h4 class="card-title mb-4" style="text-transform: uppercase; font-weight:bold;font-size: 14px">
                            Datos paciente</h4>
                        <div class="container" style="max-width: 300px">
                            <div class="col-md-12 col-10 text-left ml-4 p-0">
                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"> <strong>
                                            Nombre:</strong></label>
                                    <label class="col-7">{{ $paciente->nombre }}
                                        {{ $paciente->apellido }}</label>

                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"><strong>Cédula:</strong></label>
                                    <label class="col-7">
                                        {{ $paciente->cedula }}</label>

                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"><strong>Sexo:</strong></label>
                                    <label class="col-7">{{ $paciente->sexo == 1 ? 'Femenino' : 'Masculino' }}</label>
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
                                    <label class="col-5 text-left"><strong>Teléfono:</strong>
                                    </label>
                                    <label class="col-7">{{ $paciente->telefono }}</label>
                                </div>

                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"><strong>Email:</strong></label>
                                    <label class="col-7">{{ $paciente->user->email }}</label>
                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"><strong>Activo desde:</strong></label>
                                    <label
                                        class="col-7">{{ date('Y-m-d', strtotime($paciente->user->created_at)) }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="mb-3" style="background-color:#4eba74">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Seguimiento de Progreso</h3>
        </div>
        <div class="row px-3" style="margin-top:10px;">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <img src="{{ asset('img/icons/scale.png') }}">
                            Peso (Kg)
                        </h4>
                        {{-- <h2 class="mb-5">56000 <span class="text-muted h4 font-weight-normal">Peso promedio</span></h2> --}}
                        <canvas id="sales-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <img src="{{ asset('img/icons/body.png') }}">
                            IMC (Kg/A²)
                        </h4>
                        <canvas id="orders-chart"></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="mb-3" style="background-color:#7c7ce4">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Historial antropométrico</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="table-responsive">
                        <table id="order-listing" class="table mb-4">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Altura</th>
                                    <th>Peso</th>
                                    <th>IMC</th>
                                    <th>Grasa corporal</th>
                                    <th>Masa muscular</th>
                                    <th>Fecha consulta</th>
                                    <th>Nutricionista</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $key => $dato)
                                    <tr>
                                        <td class="pl-0 text-left">{{ $key + 1 }}</td>
                                        <td>{{ $dato->altura }}</td>
                                        <td>{{ $dato->peso }}</td>
                                        <td>{{ $dato->imc }}</td>
                                        <td>{{ $dato->grasa_corporal }}</td>
                                        <td>{{ $dato->masa_muscular }}</td>
                                        <td>{{ date('Y-m-d', strtotime($dato->created_at)) }}</td>
                                        <td>{{ $responsablesAntro[$key] }}</td>
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <input type="hidden" value="{{ $datos }}" id="datosAntropometricos">
            <input type="hidden" value="{{ $dietas }}" id="dietas">
        </div>
    </div>

    <div class="card mt-4 text-center">
        <div class="mb-5" style="background-color:#4869c4">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Dietas asignadas</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center justify-content-center row">
                    <div class="table-responsive text-center">
                        <table id="order-listing2" class="table mb-5 ">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Nombre dieta</th>
                                    <th>IMC</th>
                                    <th>Tipo diabetes</th>
                                    <th>Fecha asignación</th>
                                    <th>Fecha fin</th>
                                    <th>Nutricionista</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dietas as $key => $dieta)
                                    <tr>
                                        <td class="pl-0 text-left">{{ $key + 1 }}</td>
                                        <td>{{ $dieta->nombre }}</td>
                                        <td>{{ $dieta->imc }}</td>
                                        <td>{{ $dieta->tipo_diabetes }}</td>
                                        <td>{{ date('Y-m-d', strtotime($fechasFinAsignacion[$key])) }}</td>
                                        <td>{{ date('Y-m-d', strtotime($fechasFinDieta[$key])) }}</td>
                                        <td>{{ $responsablesDieta[$key] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card  mt-4 text-center">
        <div class="mb-3" style="background-color:#4eba74">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Actividades asignadas </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center justify-content-center row">
                    <div class="table-responsive ">
                        <table id="order-listing3" class="table mb-4">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Nombre</th>
                                    <th>Duración</th>
                                    <th>Imagen</th>
                                    <th>Fecha asignación</th>
                                    <th>Nutricionista</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actividades as $key => $actividad)
                                    <tr>

                                        <td class="pl-0 text-left">{{ $key + 1 }}</td>
                                        <td>{{ $actividad->nombre }}</td>
                                        <td>{{ $duraciones[$key]->duracion }}</td>
                                        <td><img style="max-width:100px;" src="{{ $actividad->imagen->url }}"></td>
                                        <td>{{ date('Y-m-d', strtotime($dato->created_at)) }}</td>
                                        <td>{{ $responsablesActi[$key] }}</td>             {{--  aqui el error asdjkfasdlñfkjasdlñfkjasdlfkjasdlfkjasdjlfkñasf--}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card  mt-4 text-center">
        <div class="mb-3" style="background-color:#7c7ce4">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Estados de ánimo</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center justify-content-center row">
                    <div class="table-responsive w-75">
                        <table id="order-listing4" class="table mb-4">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Estado</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estados as $key => $estado)
                                    <tr>
                                        <td class="pl-0 text-left">{{ $key + 1 }}</td>
                                        <td>{{ $estado->nombre }}</td>
                                        <td>{{ $estado->descripcion }}</td>
                                        <td>{{ date('Y-m-d', strtotime($estado->created_at)) }}</td>
                                    </tr>
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
    <script src="{{ asset('administracion/js/historialPaciente.js') }}"></script>
    <script src="{{ asset('administracion/js/dietasPaciente.js') }}"></script>
    {{-- <script src="{{asset('administracion/js/data-table.js')}}"></script> --}}
@endsection
