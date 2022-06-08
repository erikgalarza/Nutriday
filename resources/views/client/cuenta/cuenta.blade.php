@extends('client.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Mi perfil cliente
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
        </ol>
    </nav>
</div>

<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="display:flex; flex-wrap:wrap; flex-direction:row;">
            
                <!-- <h4 class="card-title">Mi perfil</h4> -->

               <div class="imagencard" style="margin:10px 10px;">
            @if(isset($paciente->imagen->url))
                            <img style="max-width:300px;" src="{{$paciente->imagen->url}}"> 
            @else
            <img style="max-width:300px;" src="{{asset('img/icons/Pacient.png')}}"> 
            @endif
               </div>
               <div class="infopaciente" style=" margin-top:50px; margin-left:100px;">
                   <h5 style="padding-bottom:10px;">Nombre:{{$paciente->nombre}}</h5>
                   <h5 style="padding-bottom:10px;">Apellido:{{$paciente->apellido}}</h5>
                   <h5 style="padding-bottom:10px;">Edad:{{$paciente->edad}}</h5>
                   <h5 style="padding-bottom:10px;">Diabetes: tipo {{$paciente->tipo_diabetes}}</h5>
                   <h5 style="padding-bottom:10px;">Teléfono:{{$paciente->telefono}}</h5>
                   <h5 style="padding-bottom:10px;">Email:{{$paciente->user->email}}</h5>

                   <a href="{{route('cliente.editarCuenta')}}" class="btn btn-warning mt-3 mb-3">Editar datos</a>

               </div>
                
               
            
        </div>
    </div>
</div>
@endsection
