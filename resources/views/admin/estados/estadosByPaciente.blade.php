@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Estados de ánimo
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estados de ánimo</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Últimos estados de ánimo</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
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
