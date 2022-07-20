<!DOCTYPE html>
<html lang="es">
@include('admin.layouts.head')
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class=" navbar-brand-wrapper d-flex justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('administrador.dashboard')}}"><img style="height:50px;width:100%;align-items:flex-start"
                        src="{{ asset('img/logos/nutridayTexto.png') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img
                        src="{{asset('img/logos/logoManzana.png')}}" alt="logo"></a>
            </div>
            {{-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('home')}}"><img
                        src="{{ asset('img/logos/nutriday_descrip.png') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img
                        src="{{asset('img/favicon.png')}}" alt="logo" /></a>
            </div> --}}
          @include('admin.layouts.header')
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                {{-- <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div> --}}
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task-todo">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove fa fa-times-circle"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove fa fa-times-circle"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove fa fa-times-circle"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove fa fa-times-circle"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove fa fa-times-circle"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="events py-4 border-bottom px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="fa fa-times-circle text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                            <p class="text-gray mb-0">build a js based app</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="fa fa-times-circle text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img
                                        src="{{ asset('administracion/images/faces/face1.jpg') }}" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img
                                        src="{{ asset('administracion/images/faces/face2.jpg') }}" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img
                                        src="{{ asset('administracion/images/faces/face3.jpg') }}" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img
                                        src="{{ asset('administracion/images/faces/face4.jpg') }}" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img
                                        src="{{ asset('img/icons/Administrador.png')}}" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img
                                        src="{{ asset('administracion/images/faces/face6.jpg') }}" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link mb-4" style="border-top: 1px dashed #9999; border-bottom: 1px dashed #9999">
                            <div class="profile-image">
                                <img src="{{ asset('img/icons/Administrador.png')}}" alt="image" />
                            </div>
                            <div class="profile-name">
                                <p class="name">
                                    Bienvenido
                                </p>
                                @if(auth()->user()->hasRole('Nutricionista'))
                                <p class="designation">
                                    Nutricionista
                                </p>
                                @elseif(auth()->user()->hasRole('Administrador'))
                                <p class="designation">
                                    Administrador
                                </p>
                                @endif
                            </div>
                        </div>
                    </li>


                    @if(auth()->user()->hasRole('Administrador'))

                    <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                                aria-controls="page-layouts">
                                <div  class="mr-4" style="min-width:35px">
                                    <i class="fa-solid fa-user-gear fa-2x"></i>
                                </div>
                                <span class="menu-title">Administradores</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <!-- botones de adentro del acordeón -->
                        <div class="collapse" id="page-layouts">
                            <ul class="nav flex-column sub-menu">
                                <li  class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{url('admin/crear-admin')}}"> <i class="fa-solid fa-user-plus mr-3"></i>Agregar</a></li>
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('administrador.listar')}}"> <i class="fa-solid fa-users-gear mr-3"></i>Ver todos</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false"
                            aria-controls="sidebar-layouts">
                            <div  class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-user-doctor fa-2x"></i>
                            </div>
                            <span class="menu-title">Nutricionistas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="sidebar-layouts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{url('admin/crear-nutricionista')}}"> <i class="fa-solid fa-user-plus mr-3"></i>Agregar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('admin/listar-nutricionistas')}}"> <i class="fa-solid fa-people-group mr-3"></i>Ver todos</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    @endif


                    @if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Nutricionista'))
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-user fa-2x"></i>
                            </div>
                            <span class="menu-title">Pacientes</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse"  id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{url('/dashboard/agregarpaciente')}}"><i class="fa-solid fa-user-plus mr-3"></i>Agregar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('dashboard/pacienteslistados')}}"><i class="fa-solid fa-people-group mr-3"></i>Ver todos</a></li>
                                <li class="nav-item "> <a class="nav-link" href="{{route('da.asignarDatosAntropometricos')}}"><i class="fa-solid fa-hospital-user mr-3"></i>Dato antropométrico</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-utensils fa-2x"></i>
                            </div>
                            <span class="menu-title">Alimentos</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('alimento.addAlimento')}}"><i class="fa-regular fa-square-plus mr-3"></i>Agregar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('dashboard/alimentoslistados')}}"><i class="fa-solid fa-list mr-3"></i>Ver todos</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('categoriaAlimento.index')}}"><i class="fa-solid fa-file-circle-plus mr-3"></i>Categorías alimentos</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('medidaAlimento.index')}}"><i class="fa-solid fa-ruler mr-3"></i>Unidades de medida</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false"
                            aria-controls="ui-advanced">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-clipboard-list fa-2x"></i>
                            </div>
                            <span class="menu-title">Dietas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('dieta.asignarDieta')}}"> <i class="fa-solid fa-chalkboard-user mr-3"> </i>Asignar dieta</a></li>
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{url('dashboard/crearDieta')}}"> <i class="fa-regular fa-square-plus mr-3"> </i>Agregar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('dashboard/listadosdietas')}}"> <i class="fa-solid fa-list mr-3"> </i>Ver todas</a>  </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-dumbbell fa-2x"></i>
                            </div>
                            <span class="menu-title">Actividades</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('actividad.add')}}"><i class="fa-regular fa-square-plus mr-3"></i>Agregar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('actividad.pacientes')}}"><i class="fa-solid fa-chalkboard-user mr-3"></i>Asignar actividad</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('dashboard/listadosactividades')}}"><i class="fa-solid fa-list mr-3"></i>Ver todos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false"
                            aria-controls="editors">
                            <div class="mr-4" style="min-width:35px">
                                <i class="fa-solid fa-video fa-2x"></i>
                            </div>
                            <span class="menu-title">Videos</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="editors">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{url('dashboard/agregarvideo')}}"><i class="fa-regular fa-square-plus mr-3"></i>Agregar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('dashboard/listadosvideos')}}"><i class="fa-solid fa-list mr-3"></i>Ver todos</a></li>

                            </ul>
                        </div>
                    </li>


                </ul>
            </nav>
            @endif
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('contenido')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
              @include('admin.layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
@include('admin.layouts.scripts')
</body>


</html>

