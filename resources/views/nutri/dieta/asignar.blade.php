@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Dietas
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
            <h3 class="card-title text-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">
                Asignar Dieta</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>

                                    <th>Paciente</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Dieta asignada</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pacientes as $key => $paciente)
                                    <form method="POST" id="formCrearDietaFlash"
                                        action="{{ route('dieta.crearDietaFlash') }}">
                                        @csrf
                                        <input type="hidden" name="paciente" value="{{ $paciente }}">
                                        <tr>

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
                                                        <input type="hidden" name="imc" id="imcAux{{ $paciente->id }}"
                                                            value="{{ $data->imc }}">
                                                    @endif
                                                @endforeach
                                            @else
                                                <td>0</td>
                                            @endif

                                            <td style="text-align:center;">
                                                @foreach ($paciente->dietas as $kp => $dieta)
                                                    @if ($loop->last)
                                                        {{ $dieta->nombre }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a title="Asignar dieta a paciente" data-toggle="modal"
                                                    data-target="#exampleModal-3{{ $paciente->id }}"
                                                    class="btn btn-outline-success mb-1"><i class="fas fa-plus"></i></a>

                                                <a title="Crear dieta a {{ $paciente->nombre }}"
                                                    onclick="crearDietaFlash();" class="btn btn-outline-warning mb-1"><i
                                                        class="fa-solid fa-file-circle-plus"></i></a>

                                                <a title="Ver dieta asiganda" class="btn btn-outline-info mb-1"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal-2{{ $paciente->id }}"><i
                                                        class="fas fa-eye"></i></a>
                                                <a title="Eliminar dieta asignada"
                                                    href="{{ route('paciente.eliminar', $paciente->id) }}"
                                                    class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i></a>

                                            </td>
                                    </form>
                                    </tr>


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

                                    {{-- MODAL DE DIETAS PARA ASIGNAR --}}
                                    <div class="modal fade" id="exampleModal-3{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
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
                                                                        Consulta:</strong>
                                                                </label>
                                                                    <label class="col-sm-7 col-form-label">{{$paciente->user->created_at}}
                                                                </label>

                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-5 col-form-label"><strong>Dietas
                                                                        disponibles:</strong>
                                                                </label>
                                                                <div class="col-sm-7">
                                                                    <select
                                                                        style="border-radius: 10px;background-color:#F0F0F0;min-height:45.2px"
                                                                        class="form-control" name="dieta_id">
                                                                        <option value="" disabled selected>Seleccione una
                                                                            dieta</option>
                                                                        @foreach ($dietas as $dieta)
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
                                                                        class="form-control" name="fecha_fin">
                                                                </div>
                                                            </div>


                                                </div>
                                                <div
                                                    class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                    <div class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                        <button type="submit"
                                                            class="btn btn-success mb-2 col-12 col-sm-5">Asignar</button>
                                                        <button type="button" class="btn btn-light mb-2 col-12 col-sm-5"
                                                            data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                                </form>
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
