@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Ver actividades
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver actividades</li>
        </ol>
    </nav>
</div>

<div class="card text-center ">
    <div class=" mb-5" style="background-color:#4b6ac3 ">
        <h3 class="card-title text-lg-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">
            Actividades</h3>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-12 row justify-content-center">
                <div class="table-responsive w-75">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>N #</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividades as $key => $actividad)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><img style="max-width:100px;" src="{{ $actividad->imagen->url }}"></td>
                                <td>{{ $actividad->nombre }}</td>

                                <td>
                                    <a title="Ver descripción" data-toggle="modal"
                                        data-target="#exampleModal-3{{ $actividad->id }}"
                                        class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-warning" data-toggle="modal"
                                        data-target="#exampleModal-2{{ $actividad->id }}"><i
                                            class="fas fa-edit"></i></a>

                                    <form method="post" id="deleteactividad{{ $actividad->id }}"
                                        action="{{ route('actividad.destroy', $actividad->id) }}" class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a onclick="eliminarActividad({{ $actividad }});" type="submit"
                                            class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>


                            <div class="modal fade" style="min-width:600px !important;"
                                id="exampleModal-2{{ $actividad->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                <div class="modal-dialog" style="min-width:600px !important;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#4b6ac3">
                                            <div>
                                                <h5 class="modal-title text-lg-center text-white"
                                                    style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                    id="exampleModalLabel-2">Editar actividad</h5>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span style="color:white;font-size:30px"
                                                    aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="padding:1.5rem 4rem">

                                            <form method="POST"
                                                action="{{ route('actividad.update', $actividad->id) }}">
                                                @csrf
                                                {{ method_field('PATCH') }}

                                                <div class="col-12  mt-2">
                                                    <div class="form-group row mb-2"
                                                        style="font-weight:bold;font-size:12px;">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-3 col-form-label text-left">Nombre:</label>
                                                        <div class="col-sm-9">
                                                            <input style="border-radius:10px" name="nombre" type="text"
                                                                value="{{ $actividad->nombre }}" class="form-control"
                                                                id="exampleInputUsername2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2" style="font-weight:bold">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-3 col-form-label text-left">Descripción:</label>
                                                        <div class="col-sm-9">
                                                            <textarea style="border-radius:10px" rows="4"
                                                                name="descripcion" type="text" class="form-control"
                                                                id="exampleInputUsername2">{{ $actividad->descripcion }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-2"
                                                        style="font-weight:bold;font-size:12px;">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-3 col-form-label text-left">Nueva
                                                            Imagen:</label>
                                                        <div class="col-sm-9">
                                                            <input style="border-radius:10px" name="imagen" type="file"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-1">
                                                        <label class="text-left col-sm-3 col-form-label"> <strong>
                                                                Imagen actual:</strong></label>
                                                        <div class=" col-sm-9 text-center mt-1">
                                                            <button class="btn btn-outline-info" id="imagen2"
                                                                type="button" style="width:100%">Ver</button>
                                                        </div>
                                                        <div class="text-center col-12">
                                                            @if (isset($actividad->imagen->url))
                                                            <img class="img-thumbnail" style="width:100%;heigth:80%"
                                                                src="{{ $actividad->imagen->url }}">
                                                            @else
                                                            <img class="img-thumbnail" style="width:100%;heigth:80%"
                                                                src="{{ asset('img/icons/dieta48.png') }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="justify-content: center; align-items:center">
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                                <button type="button" class="btn btn-light"data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                            <div class="modal fade" style="min-width:600px !important;"
                                id="exampleModal-3{{ $actividad->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="min-width:600px !important;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#4b6ac3">
                                            <h5 class="modal-title text-lg-center text-white"
                                                style="text-transform: upperca; font-weight:bold; font-size:16px"
                                                id="ModalLabel">Descripción de la actividad</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span style="color:white;font-size:30px"
                                                    aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex text-center">

                                            <div class="text-center justify-content-center row col-6">
                                                @if (isset($actividad->imagen->url))
                                                <img class="img-thumbnail" style="width:100%;heigth:80%"
                                                    src="{{ $actividad->imagen->url }}">
                                                @else
                                                <img class="img-thumbnail" style="width:100%;heigth:80%"
                                                    src="{{ asset('img/icons/dieta48.png') }}">
                                                @endif
                                            </div>
                                            <div class="col-6 ">
                                                <div class="col-12 mb-3" style="border-bottom:1px solid">
                                                    <label class="col-form-label p-2"> <strong> Información de la
                                                            actividad </strong></label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row mb-0">
                                                        <label
                                                            class="col-5 text-left col-form-label p-2"><strong>Nombre:</strong></label>
                                                        <label class="col-7 text-left col-form-label p-2">{{
                                                            $actividad->nombre }}</label>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label
                                                            class="col-5 text-left col-form-label p-2"><strong>Descripción:</strong></label>
                                                        <label class="col-7 text-left col-form-label p-2">{{
                                                            $actividad->descripcion }}</label>
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
    </div>
</div>
@endsection
