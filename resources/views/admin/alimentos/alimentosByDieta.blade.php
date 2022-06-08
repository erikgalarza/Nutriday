@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Alimentos de la dieta {{$dieta->id}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alimentos por dieta</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Alimentos de la dieta {{$dieta->id}}</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                   
                                    <th>Nombre</th>
                                    <th>Alimento</th>
                                    <th>Valor calórico</th>
                                    <th>Carbohidrato</th>
                                    <th>Proteina</th>
                                    <th>Grasa</th>   
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($alimentos as $key => $alimento)
                                    <tr>
                                      
                                        <td>{{ $alimento->nombre }}</td>
                                        <td>
                                            @if($alimento->imagen)
                                            <img src="{{$alimento->imagen->url}}">
                                            @else
                                            <img src="{{asset('img/logos/canasta.png')}}">
                                            @endif
                                        </td>
                                        <td>{{ $alimento->valor_calorico }}</td>
                                        <td>{{ $alimento->carbohidrato }}</td>
                                        <td>{{ $alimento->proteina }}</td>
                                        <td>{{ $alimento->grasa }}</td>
                                       
                                        <td>
                                            <a  data-toggle="modal" data-target="#exampleModal-3{{$alimento->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $alimento->id }}"><i class="fas fa-edit"></i></a>
                                            <a href=""
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>




{{-- MODAL DE DATOS ANTROPOMETRICOS --}}

<div class="modal fade" id="exampleModal-3{{$alimento->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Datos alimento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="display:flex; flex-wrap:wrap; align-content:flex-start">
        
            <div>
                {{-- @if(isset($nutricionista->imagen->url) && $sexos[$key]->sexo==1 )
                <img class="img-thumbnail" style="max-width:200px; margin-top:80px;" src="{{$nutricionista->imagen->url}}">
                @else
                <img class="img-thumbnail" style="max-width:200px; margin-top:80px;" src="{{asset('img/mujer.png')}}">
            @endif --}}
              </div>
           
            <div style="margin-left:20px;" >
              
                <div class="form-group">
                  <label for="recipient-name" ><strong>Nombre:</strong> {{$alimento->nombre}}</label>
                 
                </div>
                <div class="form-group">
                  <label for="recipient-name"><strong>Valor calórico:</strong> {{$alimento->valor_calorico}}</label>
               
                </div>
                <div class="form-group">
                  <label for="recipient-name"><strong>Carbohidrato:</strong> {{$alimento->carbohidrato}}</label>
                  
                </div>
                <div class="form-group">
                  <label for="recipient-name"><strong>Proteina:</strong> {{$alimento->proteina}}</label>
                </div>
                
                <div class="form-group">
                  <label for="recipient-name"><strong>Grasa:</strong> {{$alimento->grasa}}</label>
                </div>

                <div class="form-group">
                    <label for="recipient-name"><strong>Cantidad:</strong> {{$alimento->cantidad}}</label>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name"><strong>Porción:</strong> {{$alimento->porcion}}</label>
                  </div>

   
          </div>
          
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-success">Send message</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        </div> --}}
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


    <div class="col-md-6 grid-margin stretch-card">


        <!-- Dummy Modal Ends -->
        <!-- Modal starts -->


        <!-- Modal Ends -->

    </div>
@endsection
