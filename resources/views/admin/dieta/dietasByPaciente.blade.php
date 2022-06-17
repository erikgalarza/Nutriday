@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Dietas por paciente
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dietas por paciente</li>
      </ol>
    </nav>
  </div>

  <div class="modal fade" id="exampleModal-4{{ $paciente->id }}" tabindex="-1"
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
                                        Consulta:</strong></label>

                                @foreach ($paciente->dato_antropometrico as $kp => $data)
                                    @if ($loop->last)
                                        <label class="col-sm-7 col-form-label">
                                            {{ $data->created_at }}</label>
                                    @endif
                                @endforeach


                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-5 col-form-label"><strong>Dietas
                                        disponibles:</strong>
                                </label>
                                <div class="col-sm-7">
                                    <select
                                        style="border-radius: 10px;background-color:#F0F0F0;min-height:45.2px"
                                        class="form-control" name="dieta_id">
                                        <option value="" disabled selected>
                                            Seleccione una
                                            dieta</option>
                                        @foreach ($dietasDisponibles as $dieta)
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
                        <div
                            class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                            <button type="submit"
                                class="btn btn-success mb-2 col-12 col-sm-5">Asignar</button>
                            <button type="button"
                                class="btn btn-light mb-2 col-12 col-sm-5"
                                data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


  <div class="card">

    
      <div class=" mb-5" style="background-color:#4b6ac3 ">
          <h3 class="card-title text-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Dietas del paciente {{$paciente->nombre}} {{$paciente->apellido }}</h3>
      </div>
    <div class="card-body">

        <div class="container py-5  text-center" style="background-color:#dce7e7" >
            <a data-toggle="modal"
            data-target="#exampleModal-4{{ $paciente->id }}" class="btn btn-outline-success"> Asignar dieta <i class="fas fa-share"></i></a>
            <a onclick="event.preventDefault();
            document.getElementById('formCrearDieta').submit();" class="btn btn-outline-warning"> Agregar dieta <i class="fas fa-plus"></i></a>
            <form id="formCrearDieta" method="POST"  action="{{ route('dieta.crearDietaFlash') }}">
                @csrf
                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
            </form>
          </div>


      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table text-center">
              <thead>
                <tr>
                    <th>N°</th>

                    <th>Nombre dieta</th>
                    <th>Tipo diabetes</th>
                    <th>IMC</th>
                    <th>Alimentos</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($dietas as $key => $dieta)
                  {{-- <p>{{$dieta->pacientes}}</p> --}}
                  {{-- @if($dieta->pacientes()->get() != null) --}}

                <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$dieta->nombre}}</td>
                    <td>{{$dieta->tipo_diabetes}}</td>
                    
                    @if($dieta->imc == "1")
                   <td>(Bajo peso)</td>
                    @endif
                    @if($dieta->imc == "2")
                    <td>(Normal)</td>
                    @endif
                    @if($dieta->imc == "3")
                    <td>(Sobrepeso)</td>
                    @endif
                    @if($dieta->imc == "4")
                    <td>(Obeso)</td>
                    @endif



                 <td>
                    <a title="Agregar alimentos a la dieta" href="{{route('alimento.addAlimentoDieta',$dieta->id)}}" class="btn btn-outline-success mb-1"><i class="fa fa-plus"></i></a>
                     <a class="btn btn-outline-primary mb-1" title="Ver alimentos" href="{{route('alimento.alimentosByDieta',$dieta->id)}}"><i class="fa-solid fa-utensils"></i></a>
                </td>
                    <td>

                        <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{$dieta->id}}" class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>
                        <a title="Editar datos de la dieta" class="btn btn-outline-warning mb-1" data-toggle="modal" data-target="#exampleModal-2{{$dieta->id}}"><i class="fas fa-edit"></i></a>

                        <form method="post" id="deletecategoria" action="{{route('dieta.destroy',$dieta->id)}}" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                      <button title="Eliminar dieta" onclick="if(!confirm('Está seguro que desea eliminar la dieta?'))return false;" type="submit" class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>


                <div class="modal fade"  id="exampleModal-2{{$dieta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color:#4b6ac3">
                          <h5 class="modal-title text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px"id="exampleModalLabel-2">Editar dieta</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span  style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body py-2 px-0">
                            <div class="col-12 row m-0 justify-content-center">
                                <div class="col-sm-9 mt-4 col-11 text-left">
                    <form method="POST" action="{{route('dieta.update',$dieta->id)}}">
                    @csrf
                    {{ method_field('PATCH') }}

                            <div class="form-group row mb-3">
                                <label for="exampleInputUsername2"
                                    class="col-sm-4 col-form-label"><strong>Nombre dieta:</strong></label>
                                <div class="col-sm-8">
                                    <input  name="nombre" type="text" value="{{$dieta->nombre}}" class="form-control" id="exampleInputUsername2"
                                        required>
                                </div>
                            </div>

                          <div class="form-group row mb-3">
                        <label for="exampleInputEmail2"
                            class="col-sm-4 col-form-label"> <strong>Tipo diabetes:</strong></label>
                        <div class="col-sm-8">
                          <select class="form-control" name="tipo_diabetes" id="" style="min-height:45.2px;background-color:#F0F0F0" required >

                              <option value="1" {{ old('tipo_diabetes') == '1' ? 'selected' : '' }}>Tipo 1</option>
                              <option value="2" {{ old('tipo_diabetes') == '2' ? 'selected' : '' }}>Tipo 2</option>
                              <option value="3" {{ old('tipo_diabetes') == '3' ? 'selected' : '' }}>Gestacional</option>
                          </select>
                        </div>
                    </div>

                            <div class="form-group row mb-3">
                        <label for="exampleInputUsername2"
                            class="col-sm-4 col-form-label"><strong>IMC:</strong></label>
                        <div class="col-sm-8">
                            <select  class="form-control" name="imc"  class="form-control" id=""style="min-height:45.2px;background-color:#F0F0F0" required
                            >
                            <option value="1" {{ old('imc') == '1' ? 'selected' : '' }}>Bajo peso</option>
                            <option value="2" {{ old('imc') == '2' ? 'selected' : '' }}>Normal</option>
                            <option value="3" {{ old('imc') == '3' ? 'selected' : '' }}>Sobrepeso</option>
                            <option value="4" {{ old('imc') == '4' ? 'selected' : '' }}>Obeso</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="exampleInputUsername2"
                            class="col-sm-4 col-form-label"><strong>Observaciones:</strong></label>
                        <div class="col-sm-8">
                            <textarea  name="observaciones"cols="30" rows="5"  class="form-control" id="exampleInputUsername2"
                                required>{{$dieta->observaciones}}
                            </textarea>
                        </div>
                    </div>
<br>
                        </div>
                        <div class="modal-footer mt-2 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                            <div class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">
                              <button type="submit" class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                              <button type="button" class="btn btn-light mb-2 col-12 col-sm-5" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                      </div>
                    </div>
                </div>

                    </div>
                  </div>




 <div class="modal fade" id="exampleModal-3{{$dieta->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #4b6ac3">
                          <h5 class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;  id="ModalLabel">Datos de la dieta</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body py-3 px-0">

                            <div class="col-12 row m-0 justify-content-center">
                                <div class="col-sm-12 pl-3 col-11 text-left justify-content-center">

                                <div class="form-group row mb-2">
                                  <label class="col-sm-4" ><strong>Nombre:</strong> </label>
                                    <label class="col-sm-8">{{$dieta->nombre}}</label>
                                </div>

                                <div class="form-group row mb-2">
                                  <label class="col-sm-4" ><strong>Tipo de diabetes:</strong> </label>
                                  <label class="col-sm-8">{{$dieta->tipo_diabetes}}</label>
                                </div>

                                <div class="form-group row mb-2">
                                  <label class="col-sm-4" ><strong>IMC:</strong></label>
                                  <label class="col-sm-8">{{$dieta->imc}} (Normal)</label>

                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-4" ><strong>Observaciones:</strong></label>
                                    @if(isset($dieta->observaciones))
                                    <label class="col-sm-8">{{$dieta->observaciones}}</label>
                                    @else
                                    <label class="col-sm-8">Sin observaciones</label>
                                    @endif
                                  </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-4" ><strong>Fecha creación:</strong></label>
                                    <label class="col-sm-8">{{$dieta->created_at}}</label>
                                  </div>

                                </div>
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
