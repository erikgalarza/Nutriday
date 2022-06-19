@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Agregar datos antropometricos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Datos antropometricos del paciente
                    {{ $paciente->nombre }}</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Datos antropometricos</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>

                                    <th>Altura</th>
                                    <th>Peso</th>
                                    <th>Sexo</th>
                                    <th>IMC</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datosantropometricos as $key => $datos)
                                    <tr>

                                        <td>{{ $datos->altura }}</td>

                                        <td>{{ $datos->peso }}</td>
                                        <td>{{ $datos->sexo }}</td>
                                        <td>{{ $datos->imc }}</td>


                                        <td>
                                            <a data-toggle="modal" data-target="#exampleModal-3{{ $datos->id }}"
                                                class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $datos->id }}"><i
                                                    class="fas fa-outline-edit"></i></a>
                                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>




                                    {{-- MODAL DE DATOS ANTROPOMETRICOS --}}

                                    <div class="modal fade" style="min-width:600px !important;"
                                        id="exampleModal-3{{ $datos->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                                        <div class="modal-dialog" style="min-width:600px !important;" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Agregar datos
                                                        antropometricos</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="{{ route('datosantropometrico.store') }}">
                                                        @csrf

                                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">

                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Altura</label>
                                                            <div class="col-sm-9">
                                                                <input name="altura" type="text" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Peso</label>
                                                            <div class="col-sm-9">
                                                                <input name="peso" type="text" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Sexo</label>
                                                            <div class="col-sm-9">
                                                                <input name="sexo" type="text" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">IMC</label>
                                                            <div class="col-sm-9">
                                                                <input name="imc" type="text" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Agregar</button>
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">Cancelar</button>
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
                @endsection
