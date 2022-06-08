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
       
      
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                data-toggle="dropdown">
                <i class="fas fa-bell mx-0"></i>
                <span class="count">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="notificationDropdown">
                <a class="dropdown-item">
                    <p class="mb-0 font-weight-normal float-left">Aún no tienes notificaciones
                    </p>
                    {{-- <span class="badge badge-pill badge-warning float-right">Ver todas</span> --}}
                </a>
                {{-- <div class="dropdown-divider"></div>
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
                        <h6 class="preview-subject font-weight-medium">Settings</h6>
                        <p class="font-weight-light small-text">
                            Private message
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
                </a> --}}
            </div>
        </li>
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{ asset('img/icons/Administrador.png')}}" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                aria-labelledby="profileDropdown">
                @if(auth()->user()->hasRole('Administrador'))
                <a href="{{route('admin.cuenta')}}" class="dropdown-item">
                    <i class="fas fa-cog text-primary"></i>
                    Mi perfil
                </a>
                @endif
                @if(auth()->user()->hasRole('Nutricionista'))
                <a href="{{route('nutricionista.cuenta')}}" class="dropdown-item">
                    <i class="fas fa-cog text-primary"></i>
                    Mi perfil
                </a>
                @endif
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