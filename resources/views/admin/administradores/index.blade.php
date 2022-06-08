@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Administradores
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administradores</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class=" mb-5" style="background-color:#4b6ac3 ">
        <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Datos administradores</h3>
    </div>
    <div class="card-body text-center">

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>N #</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->administradores->nombre}}</td>
                    <td>{{$admin->administradores->cedula}}</td>
                    <td>{{$admin->administradores->telefono}}</td>
                    <td>{{$admin->email}}</td>
                    <td><a data-toggle="modal" data-target="#exampleModal-3{{ $admin->id }}"
                      class="btn btn-outline-info"><i class="fas fa-user"></i></a></td>
                    <td>
                        <label class="badge badge-success">{{$admin->estado}}</label>
                    </td>
                    <td>
                        <a  class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-2{{$admin->id}}"><i class="fas fa-edit"></i></a>

                        <form method="post" id="deleteadmin{{$admin->id}}" action="{{route('administrador.destroy',$admin->id)}}" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                      <a onclick="eliminarAdmin({{$admin}});" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </form>
                    </td>
                </tr>


                <div class="modal fade" id="exampleModal-3{{ $admin->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header" style="background-color:#4b6ac3">
                              <h5 class="modal-title" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="exampleModalLabel-3">Foto de {{$admin->administradores->nombre}}
                              </h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span  style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body" style="padding:1.5rem 6rem">
                                  <div class="form-group row">
                             
                                      <div class="col-sm-9">
                                        @if(isset($admin->administradores->imagen))
                                         <img src="{{$admin->administradores->imagen->url}}">
                                         @else
                                         <img src="" alt="Foto del administrador">
                                         @endif
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>

                <div class="modal fade" id="exampleModal-2{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color:#4b6ac3">
                          <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="exampleModalLabel-2">Editar administrador</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="padding:1.5rem 6rem">

                        <form method="POST" action="{{route('administrador.update',$admin->administradores->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <br>
                            <div class="form-group row mb-2">
                              <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                  class="col-sm-4 col-form-label text-left">Nombre:</label>
                              <div class="col-sm-8">
                                  <input style="border-radius:10px"  name="nombre" type="text" value="{{$admin->administradores->nombre}}" class="form-control" id="exampleInputUsername2">
                              </div>
                            </div>

                              <div class="form-group row mb-2">
                                <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                    class="col-sm-4 col-form-label text-left">Cédula:</label>
                                <div class="col-sm-8">
                                    <input style="border-radius:10px"  name="cedula" type="number" value="{{$admin->administradores->cedula}}" class="form-control" id="exampleInputUsername2" >
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                    class="col-sm-4 col-form-label text-left">Teléfono:</label>
                                <div class="col-sm-8">
                                    <input style="border-radius:10px"  name="telefono" type="tel" value="{{$admin->administradores->telefono}}" class="form-control" id="exampleInputUsername2" >
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                    class="col-sm-4 col-form-label text-left">Email:</label>
                                <div class="col-sm-8">
                                    <input style="border-radius:10px"  name="email" type="email" value="{{$admin->email}}" class="form-control" id="exampleInputUsername2">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                    class="col-sm-4 col-form-label text-left ">Contraseña:</label>
                                <div class="col-sm-8">
                                    <input style="border-radius:10px;background-color:#F0F0F0"  name="password" type="text" placeholder="Nueva contraseña" class="form-control" id="exampleInputUsername2">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                              <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                  class="col-sm-4 col-form-label text-left">Foto actual</label>
                              <div class="col-sm-8">
                                @if(isset($admin->administradores->imagen))
                                <img src="{{$admin->administradores->imagen->url}}">
                                @else
                                <img src="" alt="Foto del administrador">
                                @endif
                              </div>
                            </div>
                              <div class="form-group row mb-2">
                                <label style="font-weight:bold;font-size:12px;" for="exampleInputUsername2"
                                    class="col-sm-4 col-form-label text-left">Agregar nueva foto</label>
                                <div class="col-sm-8">
                                    <input style="border-radius:10px;background-color:#F0F0F0" name="imagen" type="file"
                                        class="form-control"
                                        >
                                </div>
                            </div>
                       



                        </div>
                        <div class="modal-footer" style="justify-content: center; align-items:center">
                          <button type="submit" class="btn btn-success">Guardar</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
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

  <script>
    function eliminarAdmin(admin) {
        var form = document.getElementById('deleteadmin' + admin.id);
        swal({
            title: "Estas seguro que quieres el administrador " + admin.administradores.nombre + " ?",
            text: "Al confirmar, el administrador será eliminado permanentemente!",
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
