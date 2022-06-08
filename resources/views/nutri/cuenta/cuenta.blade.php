@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Perfil de nutricionista
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
        <div class="card" style="display:flex; flex-wrap:wrap; flex-direction:row; justify-content:center; align-items:center">
            
                <!-- <h4 class="card-title">Mi perfil</h4> -->

               <div class="imagencard" >
            @if(isset($nutricionista->imagen->url))
                            <img style="max-width:300px;" src="{{$nutricionista->imagen->url}}"> 
            @else
            <img style="max-width:300px;" src="{{asset('img/icons/Nutricionista.png')}}"> 
            @endif
               </div>
               <div class="infopaciente mt-3"  >
                   <h5 style="padding-bottom:10px;">Nombre:{{$nutricionista->nombre}}</h5>
                   <h5 style="padding-bottom:10px;">Apellido:{{$nutricionista->apellido}}</h5>
                   <h5 style="padding-bottom:10px;">Especialidad:{{$nutricionista->especialidad}}</h5>
                   <h5 style="padding-bottom:10px;">Cedula: tipo {{$nutricionista->cedula}}</h5>
                   <h5 style="padding-bottom:10px;">Teléfono:{{$nutricionista->telefono}}</h5>
                   <h5 style="padding-bottom:10px;">Email:{{$nutricionista->user->email}}</h5>
<div class="text-center">
 <a href="{{route('nutricionista.editarCuenta')}}" class="btn btn-warning mt-3 mb-3">Editar datos</a>

</div>
                  
               </div>
                
               
            
        </div>
    </div>
</div>

@endsection
