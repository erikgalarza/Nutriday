@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Nutricionistas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nutricionistas</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-4" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos
                Nutricionistas</h3>
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
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Especialidad</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nutricionistas as $key => $nutricionista)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $nutricionista->nutricionistas->nombre }}
                                            {{ $nutricionista->nutricionistas->apellido }}</td>
                                        <td>{{ $nutricionista->nutricionistas->especialidad }}</td>
                                        <td>{{ $nutricionista->email }}</td>
                                        <td>
                                            @if($nutricionista->nutricionistas->estado=="activo")
                                            <a onclick="eliminarNutri({{ $nutricionista }});"
                                                class="btn btn-rounded {{ $nutricionista->nutricionistas->estado == 'activo' ? 'btn-success' : 'btn-danger' }}">{{ $nutricionista->nutricionistas->estado }}</a>
                                                @else
                                                <a onclick="document.getElementById('deletenutri'+{{$nutricionista->nutricionistas->id}}).submit();"
                                                class="btn btn-rounded {{ $nutricionista->nutricionistas->estado == 'activo' ? 'btn-success' : 'btn-danger' }}">{{ $nutricionista->nutricionistas->estado }}</a>
                                                @endif
                                            <!-- Arreglar estado de nutricionistas con un botón -->
                                        </td>
                                        <td>
                                            <a title="Ver más" style="max-width: 50px" data-toggle="modal"
                                                data-target="#exampleModal-3{{ $nutricionista->id }}"
                                                class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>

                                            <a title="Editar nutricionista" class="btn btn-outline-warning mb-1"
                                                data-toggle="modal"
                                                data-target="#exampleModal-2{{ $nutricionista->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                            
                                            @if ($nutricionista->nutricionistas->estado == 'activo')
                                            <form method="post" id="deletenutri{{ $nutricionista->id }}"
                                                action="{{ route('nutricionista.destroy', $nutricionista->id) }}"
                                                class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a title="Eliminar nutricionista" style="min-width: 50px"
                                                    onclick="eliminarNutri({{ $nutricionista }});" type="submit"
                                                    class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i></a>
                                            </form>
                                            @else
                                            <form method="post" id="deletenutri{{ $nutricionista->nutricionistas->id }}"
                                                action="{{ route('nutricionista.destroy', $nutricionista->id) }}"
                                                class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a onclick="document.getElementById('deletenutri'+{{$nutricionista->nutricionistas->id}}).submit();"  title="Activar" style="min-width: 50px"
                                                     type="submit"
                                                    class="btn btn-outline-danger mb-1"><i class="fas fa-share"></i></a>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal-2{{ $nutricionista->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header"style="background-color:#4b6ac3">
                                                    <div>
                                                        <h5 class="modal-title text-lg-center text-white"
                                                            style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                            id="exampleModalLabel-2">Editar nutricionista</h5>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-9  col-11 text-left p-0">
                                                            <form method="POST"
                                                                action="{{ route('nutricionista.update', $nutricionista->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}
                                                                <br>
                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold;font-size:12px;">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;">Nombre:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="nombre"
                                                                            type="text"
                                                                            value="{{ $nutricionista->nutricionistas->nombre }}"
                                                                            class="form-control" id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold;font-size:12px;">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;">Apellido:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="apellido"
                                                                            type="text"
                                                                            value="{{ $nutricionista->nutricionistas->apellido }}"
                                                                            class="form-control" id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold;font-size:12px;">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;">Cédula:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="cedula"
                                                                            type="text"
                                                                            value="{{ $nutricionista->nutricionistas->cedula }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold;font-size:12px;">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;">Especialidad:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px"
                                                                            name="especialidad" type="text"
                                                                            value="{{ $nutricionista->nutricionistas->especialidad }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;"> Sexo:</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="sexo" id="sexo"
                                                                            class="form-control"
                                                                            style="border-radius:10px; background-color:#F0F0F0;min-height:45.2px">
                                                                            <option selected disabled>Seleccione una opción
                                                                            </option>
                                                                            <option
                                                                                value="1"{{ $nutricionista->nutricionistas->sexo == '1' ? 'selected' : '' }}>
                                                                                Masculino</option>
                                                                            <option
                                                                                value="2"{{ $nutricionista->nutricionistas->sexo == '2' ? 'selected' : '' }}>
                                                                                Femenino</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;">Teléfono:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="telefono"
                                                                            type="text"
                                                                            value="{{ $nutricionista->nutricionistas->telefono }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2 no-gutters"
                                                                    style="font-weight:bold">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-3 col-form-label text-left"
                                                                        style="font-size:12px;">Email:</label>
                                                                    <div class="col-sm-9">
                                                                        <input style="border-radius:10px" name="correo"
                                                                            type="text"
                                                                            value="{{ $nutricionista->email }}"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2 no-gutters">
                                                                    <label style="font-weight:bold;font-size:12px"
                                                                        class="col-sm-3 col-form-label text-left">Contraseña:</label>
                                                                    <div class="col-sm-9">
                                                                        <input
                                                                            style="border-radius:10px; background-color:#F0F0F0"
                                                                            name="password" type="text"
                                                                            placeholder="Nueva contraseña"
                                                                            class="form-control"
                                                                            id="exampleInputUsername2">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer mt-3 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
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

                                    <style>

                                        @media (min-width:768px) {
                                            .dialogoss {
                                                min-width: 600px !important;
                                            }

                                        }
                                    </style>


                                    <div class="modal fade" id="exampleModal-3{{ $nutricionista->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog dialogoss" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-2" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"
                                                        style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                        id="ModalLabel">Datos nutricionista</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0">

                                                    <div class="col-12 row m-0 mb-sm-4 mb-3 justify-content-center">

                                                        <div class=" row col-12 col-md-11 p-md-0 text-left justify-content-center">

                                                            <div class="col-11 col-md-5 text-center">
                                                                @if (isset($nutricionista->imagen->url))
                                                                    <img class="img-thumbnail p-0"  style="height: 100%"
                                                                        src="{{ $nutricionista->imagen->url }}">
                                                                @else
                                                                    <img class="img-thumbnail p-0"  style="height: 100%"
                                                                        src="{{ asset('img/mujer.png') }}">
                                                                @endif
                                                            </div>

                                                        <div class="col-12 col-md-7 text-center mt-4 mt-md-0">
                                                            <div class="container ">
                                                                <div class="row justify-content-center pl-2 pl-sm-4 pl-md-0 ">
                                                            <div class="col-8 col-md-12 ">
                                                                    <div class="form-group row mb-1 ">
                                                                        <label
                                                                            class="col-5  text-left "><strong>Nombre:</strong></label>
                                                                        <label
                                                                            class="col-7  text-left ">{{ $nutricionista->nutricionistas->nombre }}
                                                                            {{ $nutricionista->nutricionistas->apellido }}</label>

                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <label
                                                                            class="col-5  text-left "><strong>Cedula:</strong></label>
                                                                        <label class="col-7  text-left ">
                                                                            {{ $nutricionista->nutricionistas->cedula }}</label>

                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <label
                                                                            class="col-5  text-left "><strong>Sexo:</strong></label>
                                                                        <label class="col-7  text-left ">
                                                                            {{ $nutricionista->nutricionistas->sexo == 1 ? 'Masculino' : 'Femenino' }}</label>

                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <label
                                                                            class="col-5  text-left  "><strong>Teléfono:</strong></label>
                                                                        <label
                                                                            class="col-7  text-left  ">{{ $nutricionista->nutricionistas->telefono }}</label>

                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <label
                                                                            class="col-5  text-left  "><strong>Correo:</strong></label>
                                                                        <label
                                                                            class="col-7  text-left  ">{{ $nutricionista->email }}</label>

                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <label
                                                                            class="col-5  text-left "><strong>Especialidad:</strong></label>
                                                                        <label
                                                                            class="col-7   text-left ">{{ $nutricionista->nutricionistas->especialidad }}</label>
                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <label class="col-5   text-left "><strong>Activo
                                                                                desde:</strong></label>
                                                                        <label
                                                                            class="col-7  text-left ">{{ $nutricionista->created_at }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>
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
                title: "Estas seguro que quieres eliminar al nutricionista " + nutricionista.nutricionistas.nombre + " " +
                    nutricionista.nutricionistas.apellido + " ?",
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
