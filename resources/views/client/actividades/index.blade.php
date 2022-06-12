@extends('client.dashboard')
@section('contenido')
    <!DOCTYPE html>
    <html lang="es">
    <link rel="stylesheet" href="{{ asset('administracion/css/galeriaVideos.css') }}">

    <body>
        <div class="page-header">
            <h3 class="page-title">
                Videos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Videos</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12 ">

                <div class="card">
                    <div class=" mb-3" style="background-color:#4b6ac3 ">
                        <h3 class="card-title text-lg-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Actividades</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="text-center"
                            style="display:flex; justify-content:space-center; flex-wrap:wrap;text-align:center;justify-content:center;align-items:center">
                            @foreach ($actividades as $key => $actividad)
                            <div class="card mx-3" style="width: 18rem;">
                                <img src="{{$actividad->imagen->url}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{$actividad->nombre}}</h5>
                                  <p class="card-text">{{$actividad->descripcion}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">Duración: {{$duraciones[$key]->duracion}}</li>
                                </ul>
                                {{-- <div class="card-body">
                                  <a href="#" class="card-link">Card link</a>
                                  <a href="#" class="card-link">Another link</a>
                                </div> --}}
                              </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>



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
