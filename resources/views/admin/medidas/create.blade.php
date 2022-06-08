@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar unidad de medida
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar unidad de medida</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Unidades de medida </h4>
               
                <form method="POST"  class="forms-sample" action="{{route('medidaAlimento.store')}}" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Medida</label>
                        <div class="col-sm-9">
                            <input  name="medida" type="text" class="form-control"
                                >
                        </div>
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
