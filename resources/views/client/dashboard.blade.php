<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DASHBOARD CLIENTE</title>
    <link rel="stylesheet" href="{{ asset('administracion/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administracion/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('administracion/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('administracion/css/style.css') }}">
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>
{{-- @include('layouts.head') --}}

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class=" navbar-brand-wrapper d-flex justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('cliente.dashboard')}}"><img style="height:50px;width:100%;align-items:flex-start"
                        src="{{ asset('img/logos/nutridayTexto.png') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('cliente.dashboard')}}"><img
                        src="{{asset('img/logos/logoManzana.png')}}" alt="logo"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav">
                    <li class="nav-item nav-search d-none d-md-flex">
                        <div class="nav-link">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar" aria-label="Search">
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    {{-- <li class="nav-item d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <span class="btn btn-primary">+ Create new</span>
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="fas fa-bell mx-0"></i>
                            <span class="count">
                                {{ auth()->user()->unreadNotifications->count() }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <a class="dropdown-item">
                                <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                                </p>
                                <span class="badge badge-pill badge-warning float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <i class="fas fa-exclamation-circle mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">Application Error</h6>
                                    <p class="font-weight-light small-text">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="fas fa-wrench mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">Configuración</h6>
                                    <p class="font-weight-light small-text">
                                        Mi perfil
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="far fa-envelope mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">New user registration</h6>
                                    <p class="font-weight-light small-text">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                   
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

                            @if(isset(auth()->user()->pacientes->imagen))
                            <img class="" src="{{auth()->user()->pacientes->imagen->url}}" alt="perfil">
                            @else
                            <img class="" src="{{asset('img/hombre.png')}}" alt="perfil" />
                            @endif

                            
                            {{-- <img src="{{$paciente->imagen->url}}" alt="profile" /> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{route('cliente.cuenta')}}">
                                <i class="fas fa-cog text-primary"></i>
                                Mi perfil
                            </a>

                            <div class="dropdown-divider"></div>
                            <a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="fas fa-power-off text-primary"></i>
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                        </div>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
               <div id="settings-trigger" class="bg-success"><a target="_blank" href="https://api.whatsapp.com/send?phone=593991438810&text=Bienvenido%20a%20COLPOMED,%20%C2%BF%20Deseas%20reservar%20una%20cita%20?"><i class="fab fa-whatsapp"></i></a></div>
       

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link mb-3" style="border-top: 1px dashed;border-bottom:1px dashed">
                            <div class="profile-image">

                                @if(isset(auth()->user()->pacientes->imagen))
                                <img class="" src="{{auth()->user()->pacientes->imagen->url}}" alt="perfil">
                                @else
                                <img class="" src="{{asset('img/hombre.png')}}" alt="perfil" />
                                @endif
                                {{-- <img src="{{$paciente->imagen->url}}" alt="profile" /> --}}
                            </div>
                            <div class="profile-name" >
                                <p class="name">
                                    Bienvenido
                                </p>
                                <p class="designation">
                                  Paciente {{auth()->user()->pacientes->nombre}} {{auth()->user()->pacientes->apellido}}
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="{{route('cliente.misDietas')}}" >
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-clipboard-list fa-2x"></i>
                            </div>
                            <span class="menu-title">Mis dietas</span>

                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link"  href="{{route('cliente.misActividades')}}"
                          ">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-dumbbell fa-2x"></i>
                            </div>
                            <span class="menu-title">Mis actividades</span>

                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        {{-- {{route('cliente.estadoAnimo')}} --}}
                        <a class="nav-link"  href="{{route('cliente.estadoAnimo')}}"
                           >
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-smile fa-2x"></i>
                            </div>
                            <span class="menu-title">Estado de ánimo</span>
                        </a>

                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link"  href="{{route('cliente.videos')}}">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-video fa-2x"></i>
                            </div>
                            <span class="menu-title">Mis videos</span>

                        </a>
                    </li>



                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('contenido')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}}.
                            Todos los derechos reservados.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">NUTRIDAY<i class="far fa-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('administracion/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('administracion/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('administracion/js/off-canvas.js') }}"></script>
    <script src="{{ asset('administracion/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('administracion/js/misc.js') }}"></script>
    <script src="{{ asset('administracion/js/settings.js') }}"></script>
    <script src="{{ asset('administracion/js/todolist.js') }}"></script>
    <script src="https://kit.fontawesome.com/50e215d7ac.js" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    {{-- <script src="{{ asset('administracion/js/dashboard.js') }}"></script> --}}
    <!-- End custom js for this page-->

</body>


</html>
