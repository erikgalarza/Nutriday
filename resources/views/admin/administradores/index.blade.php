@extends('admin.dashboard')
@section('contenido')
    <style>
        .ocultar {
            display: none;
        }
        .noclick{
            cursor:not-allowed;
        }
    </style>
    <div class="page-header mb-2">
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
        <div class=" mb-0" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos
                administradores</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body text-center">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive ">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td class="pl-0 text-left">{{ $admin->id }}</td>
                                        <td>{{ $admin->administradores->nombre }}</td>
                                        <td>{{ $admin->email }}</td>
                                        @if ($admin->id == 1 )
                                        <td>

                                            <a style="cursor:not-allowed" class="btn btn-rounded py-2 px-3 btn-secondary text-white ">activo</a>
                                        </td>
                                        @else
                                            <td>
                                                @if ($admin->administradores->estado == 'activo')
                                                    <a onclick="eliminarAdmin({{ $admin }});"
                                                        class=" btn py-2 px-3 btn-rounded {{ $admin->administradores->estado == 'activo' ? 'btn-success' : 'btn-danger' }}">{{ $admin->administradores->estado }}</a>
                                                @else
                                                    <a onclick="document.getElementById('deleteadmin'+{{ $admin->id }}).submit();"
                                                        class=" btn p-2 px-3  btn-rounded {{ $admin->administradores->estado == 'activo' ? 'btn-success' : 'btn-danger' }}">{{ $admin->administradores->estado }}</a>
                                                @endif
                                            </td>

                                            @endif

                                            <!-- Arreglar el estado de los administradores como un boton -->
                                        <td>
                                            @if ($admin->id == 1)
                                            <a title="Ver más" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $admin->id }}"class="btn btn-outline-info mb-1 p-2"><i class="fas fa-eye"></i></a>
                                            <a style="cursor:not-allowed" class="btn btn-outline-secondary mb-1 p-2 " disabled><i
                                                class="fas fa-edit"></i></a>

                                            <a style="cursor:not-allowed" class="btn btn-outline-secondary mb-1 p-2 " disabled><i
                                                class="fas fa-trash"></i></a>
                                            @else
                                            <a title="Ver más" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $admin->id }}"class="btn btn-outline-info mb-1 p-2"><i class="fas fa-eye"></i></a>

                                            <a title="Editar administrador" class="btn btn-outline-warning mb-1  p-2"
                                                data-toggle="modal" data-target="#exampleModal-2{{ $admin->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                                @if ($admin->administradores->estado == 'activo')
                                                    <form method="post" id="deleteadmin{{ $admin->id }}"
                                                        action="{{ route('administrador.destroy', $admin->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <a title="Eliminar administrador"
                                                            onclick="eliminarAdmin({{ $admin }});" type="submit"
                                                            class="btn btn-outline-danger mb-1  p-2"><i
                                                                class="fas fa-trash"></i></a>
                                                    </form>
                                                @else
                                                    <form method="post" id="deleteadmin{{ $admin->id }}"
                                                        action="{{ route('administrador.destroy', $admin->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <a title="Activar administrador"
                                                            onclick="document.getElementById('deleteadmin'+{{ $admin->id }}).submit();"
                                                            type="submit" class="btn btn-outline-success mb-1  p-2"><i
                                                                class="fas fa-share"></i></a>
                                                    </form>
                                                @endif
                                            @endif


                                        </td>
                                    </tr>






                                    <div class="modal fade" id="exampleModal-3{{ $admin->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="exampleModalLabel-3">Datos administrador
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-2 px-0">

                                                    <div class="col-12 row m-0 my-4 justify-content-center">
                                                        <div class="col-sm-12 row col-11 text-left justify-content-center">

                                                            <div class="col-7 col-sm-5 mr-2 row justify-content-center">

                                                                <div
                                                                    class="col-sm-9 d-flex text-center align-items-center justify-content-center">
                                                                    @if (isset($admin->administradores->imagen))
                                                                        <img
                                                                            src="{{ $admin->administradores->imagen->url }}">
                                                                    @else
                                                                        <img src="" alt="Foto del administrador">
                                                                    @endif
                                                                </div>

                                                            </div>

                                                            <div class="col-sm-7 col-5 text-left p-2">

                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-5"><strong>Nombre:</strong></label>
                                                                    <label
                                                                        class="col-sm-7">{{ $admin->administradores->nombre }}</label>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-5"><strong>Cedula:</strong></label>
                                                                    <label
                                                                        class="col-sm-7">{{ $admin->administradores->cedula }}</label>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label
                                                                        class="col-sm-5"><strong>Teléfono:</strong></label>
                                                                    <label
                                                                        class="col-sm-7">{{ $admin->administradores->telefono }}</label>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-5"><strong>Email:</strong></label>
                                                                    <label class="col-sm-7">{{ $admin->email }}</label>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label class="col-sm-5"><strong>Activo
                                                                            desde:</strong></label>
                                                                    <label
                                                                        class="col-sm-7">{{ date('Y-m-d', strtotime($admin->administradores->created_at)) }}</label>
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <div class="modal fade" id="exampleModal-2{{ $admin->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="exampleModalLabel-2">Editar administrador</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body  py-2 px-0">
                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-9  col-11 text-left">
                                                            <form method="POST"
                                                                action="{{ route('administrador.update', $admin->administradores->id) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                {{ method_field('PATCH') }}
                                                                <br>
                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left">Nombre:</label>
                                                                    <div class="col-sm-8">
                                                                        <input style="border-radius:10px" name="nombre"
                                                                            type="text"
                                                                            value="{{ $admin->administradores->nombre }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left">Cédula:</label>
                                                                    <div class="col-sm-8">
                                                                        <input style="border-radius:10px" name="cedula"
                                                                            type="number"
                                                                            value="{{ $admin->administradores->cedula }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left">Teléfono:</label>
                                                                    <div class="col-sm-8">
                                                                        <input style="border-radius:10px" name="telefono"
                                                                            type="tel"
                                                                            value="{{ $admin->administradores->telefono }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left">Email:</label>
                                                                    <div class="col-sm-8">
                                                                        <input style="border-radius:10px" name="email"
                                                                            type="email" value="{{ $admin->email }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left ">Contraseña:</label>
                                                                    <div class="col-sm-8">
                                                                        <input
                                                                            style="border-radius:10px;background-color:#F0F0F0"
                                                                            name="password" type="text"
                                                                            placeholder="Nueva contraseña"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left">Nueva
                                                                        imagen:</label>
                                                                    <div class="col-sm-8">
                                                                        <input
                                                                            style="border-radius:10px;background-color:#F0F0F0;max-height:45.2px"
                                                                            name="imagen" type="file"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label style="font-weight:bold;font-size:12px;"
                                                                        for="exampleInputUsername2"
                                                                        class="col-sm-4 col-form-label text-left">Imagen
                                                                        actual:</label>
                                                                    <div class="col-sm-8">
                                                                        <a onclick="showImage();"
                                                                            class="btn btn-warning w-100 " id="imagen2"
                                                                            style="border-radius:10px;min-height:44px"
                                                                            type="button">Ver Imagen</a>
                                                                    </div>
                                                                    <div class="text-center col-12 p-0 m-0 mt-2">
                                                                        @if (isset($admin->administradores->imagen))
                                                                            <img id="imagen"
                                                                                class=" ocultar img-thumbnail text-center"
                                                                                style="min-width:95%;min-heigth:80%"
                                                                                src="{{ $admin->administradores->imagen->url }}">
                                                                        @else
                                                                            <img id="imagen"
                                                                                src="{{ asset('img/icons/dieta48.png') }}"
                                                                                class=" ocultar img-thumbnail text-center"
                                                                                style="min-width:95%;min-heigth:80%"
                                                                                alt=" Foto del administrador">
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <div
                                                            class="modal-footer mt-5 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                            <div
                                                                class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                                <button type="submit"
                                                                    class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var imagen = document.getElementById('imagen');
        var estado = false;

        function showImage() {
            if (estado) {
                imagen.className += " ocultar";
                estado = false;
            } else {
                imagen.classList.remove('ocultar');
                estado = true;
            }

        }
    </script>

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
