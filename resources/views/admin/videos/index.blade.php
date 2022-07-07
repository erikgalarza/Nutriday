@extends('admin.dashboard')
@section('contenido')
    <!DOCTYPE html>
    <html lang="es">
    <link rel="stylesheet" href="{{ asset('administracion/css/galeriaVideos.css') }}">

    <body>
        <div class="page-header mb-2">
            <h3 class="page-title">
                Galeria
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galeria</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12 ">

                <div class="card">
                    <div class=" mb-3" style="background-color:#4b6ac3 ">
                        <h3 class="card-title text-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Recetas</h3>
                    </div>

                    @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card-body text-center">
                        <div class="text-center"
                            style="display:flex; justify-content:space-center; flex-wrap:wrap;text-align:center;justify-content:center;align-items:center">
                            @foreach ($videos_receta as $video_receta)
                                <div class="card opciones text-center mx-3 my-3" style="width: 22rem;">
                                    {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                                    <iframe style="height:15rem" class="card-img-top p-2"
                                        src="https://youtube.com/embed/{{ $video_receta->url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $video_receta->titulo }}</strong></h5>
                                        <p class="card-text">{{ $video_receta->descripcion }}.</p>
                                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                        <a class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModal{{ $video_receta->id }}"
                                            style="border-radius:5px; width:5rem"><i class="fas fa-edit"></i></a>
                                        <a onclick="eliminarVideo({{ $video_receta }});" class="btn btn-danger"
                                            style="border-radius:5px; width:5rem"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>

                                <form id="deletevideo{{ $video_receta->id }}"
                                    action="{{ route('video.destroy', $video_receta->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <div class="modal fade" id="exampleModal{{ $video_receta->id }}" tabindex="-1"
                                    {{-- MODAL DE EDITAR RECETAS --}} role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#4b6ac3">
                                                <h5 class="modal-title text-lg-center text-white"
                                                    style="text-transform: uppercase" id="ModalLabel">Editar datos de video
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span style="color:white;font-size:30px"
                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('video.update', $video_receta->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row  m-0 mt-3  justify-content-center">
                                                        <div class="col-sm-10 col-11 text-left">
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Fecha creación:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <label class="col-form-label"> {{  date('Y-m-d',strtotime($video_receta->created_at))}} </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Titulo:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input style="border-radius:10px" type="text"
                                                                        class="form-control" name="titulo"
                                                                        value="{{ $video_receta->titulo }}"
                                                                        id="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Categoría:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <select
                                                                        style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px"
                                                                        class="form-control" name="categoria">
                                                                        <option value="Recetas"
                                                                            {{ $video_receta->categoria == 'Recetas' ? 'selected' : '' }}>
                                                                            Recetas</option>
                                                                        <option value="Ejercicios"
                                                                            {{ $video_receta->categoria == 'Ejercicios' ? 'selected' : '' }}>
                                                                            Ejercicios</option>
                                                                        <option value="Motivacion"
                                                                            {{ $video_receta->categoria == 'Motivacion' ? 'selected' : '' }}>
                                                                            Motivación</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-form-label col-sm-4"><strong>URL:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input style="border-radius:10px" type="text"
                                                                        class="form-control" name="url"
                                                                        value="{{ $video_receta->url }}" id="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Descripción:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <textarea style="border-radius:10px" rows="5" class="form-control" name="descripcion">{{ $video_receta->descripcion }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
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




                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class=" mb-3" style="background-color:#4eba74 ">
                        <h3 class="card-title text-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Ejercicios</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap;">
                            @foreach ($videos_ejercicio as $video_ejercicio)
                            <div class="card opciones text-center mx-3 my-3" style="width: 22rem;">
                                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                                <iframe style="height:15rem" class="card-img-top p-2"
                                    src="https://youtube.com/embed/{{ $video_ejercicio->url }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{ $video_ejercicio->titulo }}</strong></h5>
                                    <p class="card-text">{{ $video_ejercicio->descripcion }}.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                    <a class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal2{{ $video_ejercicio->id }}"
                                        style="border-radius:5px; width:5rem"><i class="fas fa-edit"></i></a>
                                    <a onclick="eliminarVideo({{ $video_ejercicio }});" class="btn btn-danger"
                                        style="border-radius:5px; width:5rem"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                                <form id="deletevideo{{ $video_ejercicio->id }}"
                                    action="{{ route('video.destroy', $video_ejercicio->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                {{-- MODAL DE EDITAR EJERCICIOS --}}
                                <div class="modal fade" id="exampleModal2{{ $video_ejercicio->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header " style="background-color:#4b6ac3" >
                                            <h5 class="modal-title text-lg-center text-white"
                                            style="text-transform: uppercase" id="ModalLabel">Editar datos de video
                                        </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span style="font-size: 30px;color:white"
                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('video.update', $video_ejercicio->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row  m-0 mt-3  justify-content-center">
                                                        <div class="col-sm-10 col-11 text-left">
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Fecha creación:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <label class="col-form-label"> {{  date('Y-m-d',strtotime($video_ejercicio->created_at))}} </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Titulo:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input style="border-radius:10px" type="text"
                                                                        class="form-control" name="titulo"
                                                                        value="{{ $video_ejercicio->titulo }}"
                                                                        id="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Categoría:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <select
                                                                        style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px"
                                                                        class="form-control" name="categoria">
                                                                        <option value="Recetas"
                                                                            {{ $video_ejercicio->categoria == 'Recetas' ? 'selected' : '' }}>
                                                                            Recetas</option>
                                                                        <option value="Ejercicios"
                                                                            {{ $video_ejercicio->categoria == 'Ejercicios' ? 'selected' : '' }}>
                                                                            Ejercicios</option>
                                                                        <option value="Motivacion"
                                                                            {{ $video_ejercicio->categoria == 'Motivacion' ? 'selected' : '' }}>
                                                                            Motivación</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label class="col-form-label col-sm-4"><strong>URL:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input style="border-radius:10px" type="text"
                                                                        class="form-control" name="url"
                                                                        value="{{ $video_ejercicio->url }}" id="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label
                                                                    class="col-form-label col-sm-4"><strong>Descripción:</strong>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <textarea style="border-radius:10px" rows="5" class="form-control" name="descripcion">{{ $video_ejercicio->descripcion }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
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

                            @endforeach
                        </div>
                    </div>
                </div>

            <div class="card mt-4">
                <div class=" mb-3" style="background-color:#7c7ce4 ">
                    <h3 class="card-title text-center mb-4 mt-4 text-white"
                        style="text-transform: uppercase; font-weight:bold">Motivación</h3>
                </div>
                <div class="card-body">
                    <div style="display:flex; justify-content:space-evenly; flex-wrap:wrap;">
                        @foreach ($videos_motivacion as $video_motivacion)
                        <div class="card opciones text-center mx-3 my-3" style="width: 22rem;">
                            {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                            <iframe style="height:15rem" class="card-img-top p-2"
                                src="https://youtube.com/embed/{{ $video_motivacion->url }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $video_motivacion->titulo }}</strong></h5>
                                <p class="card-text">{{ $video_motivacion->descripcion }}.</p>
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                <a class="btn btn-warning" data-toggle="modal"
                                    data-target="#exampleModal3{{ $video_motivacion->id }}"
                                    style="border-radius:5px; width:5rem"><i class="fas fa-edit"></i></a>
                                <a onclick="eliminarVideo({{ $video_motivacion }});" class="btn btn-danger"
                                    style="border-radius:5px; width:5rem"><i class="fas fa-times"></i></a>
                            </div>
                        </div>

                            <form id="deletevideo{{ $video_motivacion->id }}"
                                action="{{ route('video.destroy', $video_motivacion->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>

                            {{-- MODAL DE EDITAR EJERCICIOS --}}
                            <div class="modal fade" id="exampleModal3{{ $video_motivacion->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#4b6ac3">
                                            <h5 class="modal-title text-lg-center text-white"
                                            style="text-transform: uppercase" id="ModalLabel">Editar datos de video
                                        </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST"
                                            action="{{ route('video.update', $video_motivacion->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body py-2 px-0">
                                                <div class="col-12 row  m-0 mt-3  justify-content-center">
                                                    <div class="col-sm-10 col-11 text-left">

                                                        <div class="form-group row mb-2">
                                                            <label
                                                                class="col-form-label col-sm-4"><strong>Fecha creación:</strong>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <label class="col-form-label"> {{  date('Y-m-d',strtotime($video_motivacion->created_at))}} </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label
                                                                class="col-form-label col-sm-4"><strong>Titulo:</strong>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px" type="text"
                                                                    class="form-control" name="titulo"
                                                                    value="{{ $video_motivacion->titulo }}"
                                                                    id="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label
                                                                class="col-form-label col-sm-4"><strong>Categoría:</strong>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select
                                                                    style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px"
                                                                    class="form-control" name="categoria">
                                                                    <option value="Recetas"
                                                                        {{ $video_motivacion->categoria == 'Recetas' ? 'selected' : '' }}>
                                                                        Recetas</option>
                                                                    <option value="Ejercicios"
                                                                        {{ $video_motivacion->categoria == 'Ejercicios' ? 'selected' : '' }}>
                                                                        Ejercicios</option>
                                                                    <option value="Motivacion"
                                                                        {{ $video_motivacion->categoria == 'Motivacion' ? 'selected' : '' }}>
                                                                        Motivación</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label class="col-form-label col-sm-4"><strong>URL:</strong>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input style="border-radius:10px" type="text"
                                                                    class="form-control" name="url"
                                                                    value="{{ $video_motivacion->url }}" id="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label
                                                                class="col-form-label col-sm-4"><strong>Descripción:</strong>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <textarea style="border-radius:10px" rows="5" class="form-control" name="descripcion">{{ $video_motivacion->descripcion }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
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
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

        <script>
            function eliminarVideo(video) {
                var form = document.getElementById('deletevideo' + video.id);
                swal({
                    title: "Estas seguro que quieres eliminar el video " + video.titulo + " ?",
                    text: "Al confirmar, el producto será eliminado permanentemente!",
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
        <!-- plugins:js -->

        <script src="{{ asset('administracion/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('administracion/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        {{-- <script src="{{asset('administracion/vendors/lightgallery/js/lightgallery-all.min.js')}}"></script> --}}
        <!-- end plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('administracion/js/off-canvas.js') }}"></script>
        <script src="{{ asset('administracion/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('administracion/js/misc.js') }}"></script>
        <script src="{{ asset('administracion/js/settings.js') }}"></script>
        <script src="{{ asset('administracion/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        {{-- <script src="{{asset('administracion/js/light-gallery.js')}}"></script> --}}
        <!-- End custom js for this page-->
    </body>


    <!-- Mirrored from www.urbanui.com/melody/template/pages/apps/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:10:25 GMT -->

    </html>
@endsection
