@extends('client.dashboard')
@section('contenido')
    <!DOCTYPE html>
    <html lang="es">
    <link rel="stylesheet" href="{{ asset('administracion/css/galeriaVideos.css') }}">

    <body>
        <div class="page-header mb-2">
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
                    <div class=" mb-3" style="background-color:#4b6ac3 ;border-radius:5px 5px 0 0 ">
                        <h3 class="card-title text-lg-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Recetas</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="text-center"
                            style="display:flex; justify-content:space-center; flex-wrap:wrap;text-align:center;justify-content:center;align-items:center">
                            @foreach ($videos_receta as $video_receta)

                                <div class="card opciones text-center mx-3 my-3" style="width: 22rem;">

                                    <iframe style="height:15rem" class="card-img-top p-2"
                                        src="https://youtube.com/embed/{{ $video_receta->url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $video_receta->titulo }}</strong></h5>
                                        <p class="card-text">{{ $video_receta->descripcion }}.</p>



                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class=" mb-3" style="background-color:#4eba74 ;border-radius:5px 5px 0 0 ">
                        <h3 class="card-title text-lg-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Ejercicios</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap;">
                            @foreach ($videos_ejercicio as $video_ejercicio)
                                <div class="container_video" style="background-color:rgb(91, 250, 152);">
                                    <div class="opciones" style="display:flex; justify-content:flex-end;">

                                    </div>
                                    <h5 class="my-1 text-center" style="text-transform: uppercase">
                                        {{ $video_ejercicio->titulo }}</h5>
                                    <iframe src="https://youtube.com/embed/{{ $video_ejercicio->url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="card mt-3">
                    <div class=" mb-3" style="background-color:#7c7ce4;border-radius:5px 5px 0 0 ">
                        <h3 class="card-title text-lg-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Motivacion</h3>
                    </div>
                    <div class="card-body">
                        <div style="display:flex; justify-content:space-evenly; flex-wrap:wrap;">
                            @foreach ($videos_motivacion as $video_motivacion)
                                <div class="container_video" style="background-color:rgb(91, 250, 152)">
                                    <div class="opciones" style="display:flex; justify-content:flex-end;">


                                    </div>
                                    <h5 class="my-1 text-center" style="text-transform: uppercase">
                                        {{ $video_motivacion->titulo }}</h5>
                                    <iframe src="https://youtube.com/embed/{{ $video_motivacion->url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <!-- plugins:js -->

        {{-- <script src="{{ asset('administracion/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('administracion/vendors/js/vendor.bundle.addons.js') }}"></script> --}}
        <!-- endinject -->
        <!-- plugin js for this page -->
        {{-- <script src="{{asset('administracion/vendors/lightgallery/js/lightgallery-all.min.js')}}"></script> --}}
        <!-- end plugin js for this page -->
        <!-- inject:js -->
        {{-- <script src="{{ asset('administracion/js/off-canvas.js') }}"></script>
        <script src="{{ asset('administracion/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('administracion/js/misc.js') }}"></script>
        <script src="{{ asset('administracion/js/settings.js') }}"></script>
        <script src="{{ asset('administracion/js/todolist.js') }}"></script> --}}
        <!-- endinject -->
        <!-- Custom js for this page-->
        {{-- <script src="{{asset('administracion/js/light-gallery.js')}}"></script> --}}
        <!-- End custom js for this page-->
    </body>


    <!-- Mirrored from www.urbanui.com/melody/template/pages/apps/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:10:25 GMT -->

    </html>
@endsection
