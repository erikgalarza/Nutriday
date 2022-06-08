<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': true, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-dark box-shadow-none">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}">
                            <a href="#" class="goto-top"><img alt="Porto" style="width:80%;"   data-sticky-top="0" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500}" data-original="{{asset('img/logos/nutridayTexto.png')}}"></a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links header-nav-light-text header-nav-dropdowns-dark">
                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-text-capitalize header-nav-main-text-size-2 header-nav-main-mobile-dark header-nav-main-effect-1 header-nav-main-sub-effect-1 appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" style="color:#0088cc;" href="{{route('home')}}">
                                                Inicio
                                            </a>
                                        
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" style="color:#0088cc;" data-hash data-hash-offset="130" href="{{route('home.nosotros')}}">
                                                Nosotros
                                            </a>
                                        </li>
                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle" style="color:#0088cc;" href="{{route('home.contactanos')}}">
                                                Contactanos
                                            </a>
                                       
                                        </li>
                                     {{-- si el usuario esta logueado o iniciado sesion --}}
                                        @if(Auth::check())
                                        <li class="dropdown">
                                            <a onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="dropdown-item dropdown-toggle active" href="{{route('login')}}">
                                                Cerrar sesión
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        </li>
                                        <li>
                                            @if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Nutricionista'))
                                            <a href="{{route('administrador.dashboard')}}" title="Dashboard"><i class="fas fa-user"></i></a>
                                            @endif
                                         
                                        </li>
                                        @else
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" style="color:#0088cc;" href="{{route('login')}}">
                                                Iniciar sesión
                                            </a>
                                        </li>
                                        @endif
                                     
                                       

                                    </ul>
                                </nav>
                            </div>
                            
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>