@extends('admin.dashboard')
@section('contenido')
    <!DOCTYPE html>
    <html lang="es">
    <link rel="stylesheet" href="{{asset('administracion/css/actividades.css')}}">

    <body>


        <div class="page-header">
            <h3 class="page-title">
                Actividades del paciente
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Actividades del paciente </li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card px-4">
                    <div class="card-body">

                        @if(count($actividades)>0)
                        <div style="display:flex; justify-content:space-evenly; flex-wrap:wrap;">
                            @foreach ($actividades as $actividad)

                            <div class="card opciones text-center" style="width: 25rem;">
                                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                                <img src="{{$actividad->imagen->url}}">
                                <div class="card-body">
                                  <h5 class="card-title"><strong>{{ $actividad->nombre }}</strong></h5>
                                  {{-- <p class="card-text">{{ $video_receta->descripcion}}.</p> --}}
                                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                  <a class="btn btn-warning" data-toggle="modal"
                                  data-target="#exampleModal{{ $actividad->id }}" style="border-radius:0"><i
                                      class="fas fa-edit"></i></a>
                                  <a onclick="eliminarVideo({{$actividad->id}});" class="btn btn-danger" style="border-radius:5px; width:5rem"><i class="fas fa-times"></i></a>
                                </div>
                              </div>
                            <form method="POST" id="deleteactividad{{ $actividad->id }}"
                                action="{{ route('actividad.destroy', $actividad->id) }}" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a class="btn btn-danger" onclick="eliminarActividad({{$actividad}});"
                                    style="border-radius:0"><i class="fas fa-times"></i></a>
                            </form>
                               {{-- <div class="container_actividad" style="position:relative; background-color:rgb(22, 144, 214);">
                                <div class="opciones" style="display:flex; justify-content:flex-end;">
                                    <a class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal{{ $actividad->id }}" style="border-radius:0"><i
                                            class="fas fa-edit"></i></a>

                                </div> --}}

                                {{-- <form method="POST" id="deleteactividad{{ $actividad->id }}"
                                    action="{{ route('actividad.destroy', $actividad->id) }}" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-danger" onclick="eliminarActividad({{$actividad}});"
                                        style="border-radius:0"><i class="fas fa-times"></i></a>
                                </form> --}}

                              {{-- <img width="300" height="300"src="{{$actividad->imagen->url}}">
                              <div class="info_actividad" style=" position:absolute; width:100%; background-color:#EC7063; bottom:0;">
                                <h5 class="my-1 text-center">{{ $actividad->nombre }}</h5>
                              </div> --}}
                            </div>


                                {{-- MODAL DE EDITAR RECETAS --}}
                                <div class="modal fade" id="exampleModal{{ $actividad->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Datos de la actividad
                                                    {{ $actividad->nombre }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('actividad.update', $actividad->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <div class="modal-body"
                                                    style="display:flex; flex-wrap:wrap; justify-content:center; align-content:flex-start">
                                                    <div style="margin-left:20px;">

                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Nombre:</strong>
                                                            </label>
                                                            <input type="text" class="form-control" name="nombre"
                                                                value="{{ $actividad->nombre }}">
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Cambiar imagen:</strong>
                                                            </label>
                                                            <input type="file" class="form-control" name="imagen">
                                                        </div>


                                                        <div style="display:flex; justify-content:center;">
                                                            <button type="submit" class="btn btn-success ">Guardar
                                                                cambios</button>
                                                        </div>

                                                    </div>

                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                        <h5 class="text-center">Aun no se han agregado actividades</h5>
                        @endif

                    </div>
                </div>
            </div>
        </div>


        <script>
            function eliminarActividad(actividad) {
                var form = document.getElementById('deleteactividad' + actividad.id);
                swal({
                    title: "Estas seguro que quieres eliminar la actividad " + actividad.nombre + " ?",
                    text: "Al confirmar, la actividad será eliminada permanentemente!",
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
