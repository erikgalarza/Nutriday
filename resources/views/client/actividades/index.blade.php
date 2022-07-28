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
                    <div class=" mb-3" style="background-color:#4b6ac3 ;border-radius:5px 5px 0 0 ">
                        <h3 class="card-title text-center mb-4 mt-4 text-white"
                            style="text-transform: uppercase; font-weight:bold">Mis Actividades <button class=" ml-3 text-right" disabled
                    title="El color rojo representa las actividades con alta prioriodad, estas deben realizarse lo más pronto posible, el color amarillo representa las actividades que tienen una prioridad media, y el color verde representan las actividades de una priorida baja, pudiendo no realizarlas"
                    style="border-radius:10px; border:1px solid rgb(93, 92, 92)"><i class="fas fa-info"></i></button> </h3>
                    </div>

                    <div class="card-body">
                        @if(count($actividades)>0)
                        <div class="row">
                            <div class="col-12">
                                <div class="row portfolio-grid justify-content-center">

                                    @foreach ($actividades as $key => $actividad)
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mb-4">

                                        @if($prioridades[$key]->prioridad==1)
                                        <figure  class="effect-text-in prioridad-baja" style="height:100%;min-height:225px">
                                            <img src="{{$actividad->imagen->url}}" alt="image" />
                                            <figcaption>
                                                <h4>{{$actividad->nombre}}</h4>
                                                <p>
                                                    {{$duraciones[$key]->duracion}}

                                                </p>
                                            </figcaption>
                                        </figure>
                                        @endif
                                        @if($prioridades[$key]->prioridad==2)
                                        <figure  class="effect-text-in prioridad-media"  style="height:100%;min-height:225px">
                                            <img src="{{$actividad->imagen->url}}" alt="image" />
                                            <figcaption>
                                                <h4>{{$actividad->nombre}}</h4>
                                                <p>
                                                    {{$duraciones[$key]->duracion}}
                                                </p>
                                            </figcaption>
                                        </figure>
                                        @endif
                                        @if($prioridades[$key]->prioridad==3)
                                        <figure  class="effect-text-in prioridad-alta"  style="height:100%;min-height:225px">
                                            <img src="{{$actividad->imagen->url}}" alt="image" />
                                            <figcaption>
                                                <h4>{{$actividad->nombre}}</h4>
                                                <p>
                                                    {{$duraciones[$key]->duracion}}

                                                </p>
                                            </figcaption>
                                        </figure>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="container-fluid row justify-content-center p-0 m-0">
                                <div class="container bg-danger row align-items-center justify-content-center" style="max-width:600px;border-radius:8px;min-height:50px">
                                    <div class="row justify-content-center ">
                                    <label class="text-center text-white"> <strong> No hay actividades asignadas !  </strong> </label>
                                </div>
                            </div>
                        </div>
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
