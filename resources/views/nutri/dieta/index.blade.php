@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Dietas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dietas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
      <div class=" mb-5" style="background-color:#4b6ac3 ">
          <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos dietas</h3>
      </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table text-center">
              <thead>
                <tr>
                    <th>N #</th>

                    <th>Nombre</th>
                    <th>Tipo diabetes</th>
                    <th>Fecha de fin</th>
                    <th>Alimentos</th>


                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($dietas as $key => $dieta)
                <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$dieta->nombre}}</td>
                    <td>{{$dieta->tipo_diabetes}}</td>
                    <td>{{$dieta->fecha_fin}}</td>

                 <td><a class="btn btn-outline-primary" title="Ver alimentos" href="{{route('alimento.alimentosByDieta',$dieta->id)}}"><i class="fas fa-eye"></i></a></td>
                    <td>
                          <a title="Agregar alimentos" href="{{route('alimento.addAlimentoDieta',$dieta->id)}}" class="btn btn-outline-success"><i class="fa fa-plus"></i></a>
                      {{-- <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{$dieta->id}}" class="btn btn-outline-info"><i class="fa fa-plus"></i></a> --}}
                        <a  class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-2{{$dieta->id}}"><i class="fa fa-edit"></i></a>

                        <form method="post" id="deletecategoria" action="{{route('dieta.destroy',$dieta->id)}}" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                      <button onclick="if(!confirm('Está seguro que desea eliminar la dieta?'))return false;" type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>


                <div class="modal fade" style="min-width:600px !important;" id="exampleModal-2{{$dieta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" style="min-width:600px !important;" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Editar dieta</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

<form method="POST" action="{{route('dieta.update',$dieta->id)}}">
@csrf
{{ method_field('PATCH') }}
                            <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input  name="nombre" type="text" value="{{$dieta->nombre}}" class="form-control" id="exampleInputUsername2"
                                        required>
                                </div>
                            </div>
                          <br>

                          <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Tipo diabetes</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="tipo_diabetes" id="" required>

                              <option value="1" {{ old('tipo_diabetes') == '1' ? 'selected' : '' }}>Tipo 1</option>
                              <option value="2" {{ old('tipo_diabetes') == '2' ? 'selected' : '' }}>Tipo 2</option>
                              <option value="3" {{ old('tipo_diabetes') == '3' ? 'selected' : '' }}>Gestacional</option>
                          </select>
                        </div>
                    </div>

                            <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Fecha de finalización de la dieta</label>
                        <div class="col-sm-9">
                            <input  name="fecha_fin" type="date" value="{{ old('fecha_fin', date('Y-m-d')) }}" class="form-control" id="exampleInputUsername2" required
                            >
                        </div>
                    </div>






                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Guardar cambios</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>




 <div class="modal fade" id="exampleModal-3{{$dieta->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalLabel">Datos dieta</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="display:flex; flex-wrap:wrap; align-content:flex-start">



                            <div style="margin-left:20px;" >

                                <div class="form-group">
                                  <label for="recipient-name" ><strong>Nombre:</strong> {{$dieta->nombre}}</label>

                                </div>

                                <div class="form-group">
                                  <label for="recipient-name" ><strong>Tipo de diabetes:</strong> {{$dieta->tipo_diabetes}}</label>

                                </div>

                                <div class="form-group">
                                  <label for="recipient-name" ><strong>Fecha de finalizacion:</strong> {{$dieta->fecha_fin}}</label>

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


  <div class="col-md-6 grid-margin stretch-card">


        <!-- Dummy Modal Ends -->
        <!-- Modal starts -->


        <!-- Modal Ends -->

  </div>

  @endsection
