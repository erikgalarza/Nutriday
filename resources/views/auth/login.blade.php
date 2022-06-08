<!DOCTYPE html>
<html>
@include('layouts.head')

<body>

    <div class="body">
     @include('layouts.header2')

        <div role="main" class="main">

            {{-- @include('layouts.breadcrumb',['pagina'=>'Registrarse']) --}}
            <section class="page-header page-header-classic">
                <div class="container">
                    <div class="row">
                        <div class="col">
                           
                        </div>
                    </div>
                    <div class="row">
                       
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="featured-boxes">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="featured-box featured-box-primary text-left mt-5">
                                        <div class="box-content">
                                            <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">
                                                SOY CLIENTE</h4>
                                            <form method="POST" action="{{ route('login2') }}" id="frmSignIn" class="needs-validation">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Correo electrónico</label>
                                                        <input  id="email" type="email" value="{{ old('email') }}"  name="email"
                                                            class="form-control form-control-lg @error('email') is-invalid @enderror" autocomplete="email" required>
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        {{-- <a class="float-right" href="#">(Lost Password?)</a> --}}
                                                        <label
                                                            class="font-weight-bold text-dark text-2">Contraseña</label>
                                                        <input id="password" type="password" name="password" 
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror" autocomplete="current-password" required>
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                            name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                                            <label class="custom-control-label text-2"
                                                                for="rememberme">Recordarme</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <input type="submit" value="Iniciar sesión"
                                                            class="btn btn-primary btn-modern float-right"
                                                            data-loading-text="Loading...">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box featured-box-primary text-left mt-5">
                                        <div class="box-content">
                                            
                                            <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Si no posees una cuenta para acceder a los servicios de COLPOMED, deberás realizar una consulta previa en nuestras instalaciones donde se te ayudará con el registro correspondiente.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('layouts.footer')
    </div>

   @include('layouts.scripts')

</body>

</html>
