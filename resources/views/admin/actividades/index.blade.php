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
<style>
    .ocultar
    {
        display:none;
    }
</style>

<div class="card text-center ">
    <div class=" mb-3" style="background-color:#4b6ac3 ">
        <h3 class="card-title text-lg-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">
            Actividades</h3>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-12 row justify-content-center">
                <div class="table-responsive w-75">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>N°</th>
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

                            <style>
                                @media (min-width:768px) {
                                    .dialogoss {
                                        min-width: 610px !important;
                                    }

                                }
                            </style>

                            <div class="modal fade"
                                id="exampleModal-2{{ $actividad->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                <div class="modal-dialog dialogoss" role="document">
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
                                        <div class="modal-body py-2 px-0">
                                            <div class="col-12 row mt-3 mb-0 mr-0 ml-0  p-0 justify-content-center">
                                                <div class="col-md-9  col-11 text-left">

                                            <form method="POST"
                                                action="{{ route('actividad.update', $actividad->id) }}">
                                                @csrf
                                                {{ method_field('PATCH') }}

                                                <div class="col-12  mt-2">
                                                    <div class="form-group row mb-2"
                                                        style="font-weight:bold;text-transform:">
                                                        <label for="exampleInputUsername2"
                                                            class="col-md-4 col-form-label text-left">Nombre:</label>
                                                        <div class="col-md-8">
                                                            <input style="border-radius:10px" name="nombre" type="text"
                                                                value="{{ $actividad->nombre }}" class="form-control"
                                                                id="exampleInputUsername2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2" style="font-weight:bold;text-transform:">
                                                        <label for="exampleInputUsername2"
                                                            class="col-md-4 col-form-label text-left">Descripción:</label>
                                                        <div class="col-md-8">
                                                            <textarea style="border-radius:10px" rows="4"
                                                                name="descripcion" type="text" class="form-control"
                                                                id="exampleInputUsername2">{{ $actividad->descripcion }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-2"
                                                        style="font-weight:bold;text-transform:">
                                                        <label for="exampleInputUsername2"
                                                            class="col-md-4 col-form-label text-left">Nueva
                                                            Imagen:</label>
                                                        <div class="col-md-8">
                                                            <input style="border-radius:10px" name="imagen" type="file"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-1">
                                                        <label class="col-md-4 col-form-label"> <strong> Imagen actual:</strong></label>
                                                        <div class=" col-md-8 text-center mt-1">
                                                            <a onclick="showImage();" class="btn btn-warning w-100" id="imagen2" type="button">Ver Imagen</a>
                                                        </div>
                                                        <div class="text-center">
                                                            @if (isset($actividad->imagen->url))
                                                                <img id="imagen" class="ocultar img-thumbnail"
                                                                style="width:95%;heigth:80%"
                                                                    src="{{ $actividad->imagen->url }}">
                                                            @else
                                                                <img id="imagen" class="ocultar img-thumbnail"
                                                                    style="width:95%;heigth:80%"
                                                                    src="{{ asset('img/icons/dieta48.png') }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                            class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                            <div
                                                class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                <button type="submit"
                                                    class="btn btn-success mb-2 col-12 col-sm-5 p-2">Guardar</button>
                                                <button type="button"
                                                    class="btn btn-light mb-2 col-12 col-sm-5 p-2"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                            </div>
                        </div>


                            <div class="modal fade"
                                id="exampleModal-3{{ $actividad->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog dialogoss"  role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#4b6ac3">
                                            <h5 class="modal-title text-lg-center text-white"
                                                style="text-transform: uppercase; font-weight:bold; font-size:16px"
                                                id="ModalLabel">Descripción de la actividad</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span style="color:white;font-size:30px"
                                                    aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body py-3 px-0">

                                            <div class="col-12 row m-0 mb-sm-4 mb-3 justify-content-center p-0">
                                                <div class="col-md-12 row col-11 text-left justify-content-center">

                                            <div  class="col-12 col-md-5 row mt-md-2 mt-4 justify-content-center">
                                                    <div class="col-md-12 col-10 p-0 mt-3">
                                                @if (isset($actividad->imagen->url))
                                                <img class="img-thumbnail " style="width:100%;min-height:85%"
                                                    src="{{ $actividad->imagen->url }}">
                                                @else
                                                <img class="img-thumbnail" style="width:100%;min-height:85%"
                                                    src="{{ asset('img/icons/dieta48.png') }}">
                                                @endif
                                            </div>
                                        </div>

                                            <div class="col-12 col-md-7 row mt-md-2 mt-4 justify-content-center">
                                                <div class="col-md-12 col-10 row justify-content-center">
                                                    <div class="col-10 mb-2 text-center" style="border-bottom:1px solid;max-height:30px">
                                                    <label class="col-form-label py-1" style="text-transform: uppercase"><strong> Datos de la actividad </strong></label>
                                                </div>
                                                <div class="col-12 row justify-content-center p-0 m-0 mb-1">
                                                    <div class="col-9  p-0 m-0">
                                                        <div class="form-group row mb-0">
                                                            <label
                                                                class="col-6 col-md-5 text-left col-form-label px-0 mb-0" style="text-transform: uppercase"><strong>Nombre:</strong></label>
                                                            <label class="col-6 col-md-7 text-left col-form-label mb-0">{{
                                                                $actividad->nombre }}</label>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label
                                                                class="col-6 col-md-5 text-left col-form-label px-0 " style="text-transform: uppercase"><strong>Descripción:</strong></label>
                                                            <label class="col-6 col-md-7 text-left col-form-label ">{{
                                                                $actividad->descripcion }}</label>
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
    function showImage()
    {
        if(estado)
        {
            imagen.className+=" ocultar";
            estado = false;
        }
        else
        {
            imagen.classList.remove('ocultar');
            estado = true;
        }

    }

</script>
@endsection
