@extends('client.dashboard')
@section('contenido')
    <!DOCTYPE html>
    <html lang="es">
    <link rel="stylesheet" href="{{ asset('administracion/css/galeriaVideos.css') }}">

    <body>
        <div class="page-header mb-2">
            <h3 class="page-title">
                Actividades
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Actividades</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class=" mb-5" style="background-color:#4b6ac3 ">
                        <h3 class="card-title text-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Mis Actividades</h3>
                    </div>

                    <div class="card-body">
                        @if(count($actividades)>0)
                        <div class="row">
                            <div class="col-12">
                                <div class="row portfolio-grid">

                                    @foreach ($actividades as $key => $actividad)
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                        {{-- @if($actividad->proridad==1)
                                        <figure  class="effect-text-in prioridad-baja">
                                        @endif
                                        @if($actividad->proridad==2)
                                        <figure  class="effect-text-in prioridad-media">
                                        @endif
                                        @if($actividad->proridad==3) --}}
                                        <figure  class="effect-text-in {{$actividad->prioridad==1 ? 'prioridad-baja' : ($actividad->prioridad ==2 ? 'prioridad-media' : 'prioridad-alta') }}">
                                        {{-- @endif --}}
                                            <img src="{{$actividad->imagen->url}}" alt="image" />
                                            <figcaption>
                                                <h4>{{$actividad->nombre}}</h4>
                                                <p>
                                                    {{$actividad->descripcion}}
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <label for="">No hay actividades asignadas !</label>
                        @endif
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
