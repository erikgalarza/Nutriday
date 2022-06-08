@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Nutricionistas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nutricionistas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class=" mb-5" style="background-color:#4b6ac3 ">
        <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos Nutricionistas</h3>
    </div>
    <div class="card-body text-center">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive ">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>N #</th>

                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Correo</th>
                    <th>Estado</th>

                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($nutricionistas as $key => $nutricionista)
                <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$nutricionista->nombre}}</td>
                    <td>{{$nutricionista->apellido}}</td>
                    <td>{{$nutricionista->especialidad}}</td>
                    <td>{{$nutricionista->user->email}}</td>
                    <td>
                        <label class="badge badge-success">Activo</label>
                    </td>
                    <td>
                      <a title="Ver más" data-toggle="modal" data-target="#exampleModal-3{{$nutricionista->id}}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                        <a  class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-2{{$nutricionista->id}}"><i class="fas fa-edit"></i></a>

                        <form method="post" id="deletenutri{{$nutricionista->id}}" action="{{route('nutricionista.destroy',$nutricionista->id)}}" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                      <a onclick="eliminarNutri({{$nutricionista}});" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </form>
                    </td>
                </tr>


                <div class="modal fade" style="min-width:600px !important;" id="exampleModal-2{{$nutricionista->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" style="min-width:600px !important;" role="document">
                      <div class="modal-content">
                        <div class="modal-header"style="background-color:#4b6ac3">
                          <div >
                            <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="exampleModalLabel-2">Editar nutricionista</h5>
                        </div>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span  style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="padding:1.5rem 6rem">

                        <form method="POST" action="{{route('nutricionista.update',$nutricionista->id)}}" >
                        @csrf
                        {{ method_field('PATCH') }}
                        <br>
                            <div class="form-group row mb-2" style="font-weight:bold;font-size:12px;">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label text-left">Nombre:</label>
                                <div class="col-sm-9">
                                    <input style="border-radius:10px"  name="nombre" type="text" value="{{$nutricionista->nombre}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row mb-2" style="font-weight:bold">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label text-left">Apellido:</label>
                                <div class="col-sm-9">
                                    <input style="border-radius:10px"  name="apellido" type="text" value="{{$nutricionista->apellido}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row mb-2" style="font-weight:bold">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label text-left">Cédula:</label>
                                <div class="col-sm-9">
                                    <input style="border-radius:10px"  name="cedula" type="text" value="{{$nutricionista->cedula}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row mb-2" style="font-weight:bold">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label text-left">Teléfono:</label>
                                <div class="col-sm-9">
                                    <input style="border-radius:10px"  name="telefono" type="text" value="{{$nutricionista->telefono}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                            <div class="form-group row mb-2" style="font-weight:bold">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label text-left">Email:</label>
                                <div class="col-sm-9">
                                    <input style="border-radius:10px"  name="correo" type="text" value="{{$nutricionista->user->email}}" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>

                            <div class="form-group row mb-2" style="font-weight:bold">
                                <label  for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label text-left">Contraseña:</label>
                                <div class="col-sm-9">
                                    <input style="border-radius:10px; background-color:#F0F0F0"  name="password" type="text" placeholder="Nueva contraseña" class="form-control" id="exampleInputUsername2"
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="justify-content: center; align-items:center">
                                <button type="submit"class="btn btn-success">Guardar</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>




                    <div class="modal fade"style="min-width:600px !important;" id="exampleModal-3{{$nutricionista->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog"style="min-width:600px !important;" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color:#4b6ac3">
                            <h5 class="modal-title text-lg-center text-white" style="text-transform: upperca; font-weight:bold; font-size:16px" id="ModalLabel">Datos nutricionista</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body d-flex text-center" >

                            <div class="col-5 mr-3 d-flex" style="align-items:center;justify-content:center">
                                @if(isset($nutricionista->imagen->url)  )
                                <img class="img-thumbnail " style="max-width:200px;" src="{{$nutricionista->imagen->url}}">
                                @else
                                <img class="img-thumbnail" style="width:100%; height:90%" src="{{asset('img/mujer.png')}}">
                                @endif
                            </div>

                            <div class="col-7 mt-3" >

                                <div class="form-group row mb-1">
                                    <label class="col-4 text-left"><strong>Nombre:</strong></label>
                                    <label class="col-8 text-left" >{{$nutricionista->nombre}}</label>

                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-4 text-left" ><strong>Apellido:</strong></label>
                                    <label class="col-8 text-left" >{{$nutricionista->apellido}}</label>

                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-4 text-left" ><strong>Cedula:</strong></label>
                                    <label class="col-8 text-left" > {{$nutricionista->cedula}}</label>

                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-4 text-left" ><strong>Teléfono:</strong></label>
                                    <label class="col-8 text-left" >{{$nutricionista->telefono}}</label>

                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-4 text-left" ><strong>Correo:</strong></label>
                                    <label class="col-8 text-left" >{{$nutricionista->user->email}}</label>

                                </div>

                                <div class="form-group row mb-1">
                                    <label class="col-4 text-left" ><strong>Especialidad:</strong></label>
                                    <label class="col-8 text-left" >{{$nutricionista->especialidad}}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-success">Send message</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div> --}}

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
  <script>
    function eliminarNutri(nutricionista) {
        var form = document.getElementById('deletenutri' + nutricionista.id);
        swal({
            title: "Estas seguro que quieres al nutricionista " + nutricionista.nombre + " ?",
            text: "Al confirmar, el nutricionista será eliminado permanentemente!",
            icon: "warning",
            buttons: [
                'No, cancelar!',
                'Si, estoy seguro!'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {

                form.submit(); // <--- submit form programmatically

            }
        })

    }
</script>

  @endsection
