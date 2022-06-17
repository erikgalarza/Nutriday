@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Datos antropométricos por paciente
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Datos antropométricos por paciente</li>
      </ol>
    </nav>
  </div>


  <div class="card">

      <div class=" mb-5" style="background-color:#4b6ac3 ">
          <h3 class="card-title text-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos antropométricos del paciente {{$paciente->nombre}} {{$paciente->apellido }}</h3>
      </div>
    <div class="card-body">

        <div class="container py-5 text-center" style="background-color:#dce7e7" >

            <a href="{{route('admin.agregarDatosAntropometricos',$paciente->id)}}" class="btn btn-outline-warning"> Registrar datos antropométricos <i class="fas fa-plus"></i></a>
          </div>


      <div class="row">
        <div class="col-12">
        
            <div class="table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Altura</th>
                            <th>Peso</th>
                            <th>IMC</th>
                            <th>Fecha de visita</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $key => $dato)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $dato->altura }}</td>
                                <td>{{ $dato->peso }}</td>
                                <td>{{ $dato->imc }}</td>
                                <td>{{ $dato->created_at }}</td>
                                <td>
                                    <a  data-toggle="modal"
                                    data-target="#exampleModal-4{{ $dato->id }}" class="btn btn-outline-info" title="Ver dato bioquímico"><i class="fas fa-image"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModal-4{{ $dato->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#4b6ac3">
                                            <h5 class="modal-title text-lg-center text-white"
                                                style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                id="ModalLabel">Registro de datos antropométricos de
                                                {{ $paciente->nombre }} {{ $paciente->apellido }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span style="color:white;font-size:30px"
                                                    aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body py-3 px-0">
                            
                                            <div class="container text-center">
                                                <div class="dato_bioquimico">
                                                    @if(isset($dato->imagen))
                                                    <img style="width:100%;" src="{{$dato->imagen->url}}">
                                                    @else 
                                                    <img alt="Imagen por defecto de que no hay imagen">
                                                    @endif
                                                </div>

                                            </div>
                                               

                                                <div
                                                    class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                    <div
                                                        class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                            
                                                       {{-- <button type="button"
                                                            class="btn btn-light mb-2 col-12 col-sm-5"
                                                            data-dismiss="modal">Cerrar</button> --}}
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

      {{-- {{ $dietas->links() }} --}}
    </div>
  </div>
  {{-- {{ $dietas->links() }} --}}




  @endsection
