@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Estados de ánimo
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estados de ánimo</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-4" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
                Estados de ánimo de {{$paciente->nombre}} {{$paciente->apellido}}</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="table-responsive ">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Estado</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estados as $key => $estado)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $estado->nombre }}</td>
                                        <td>{{$estado->descripcion}}</td>
                                        <td>{{ $estado->created_at }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
