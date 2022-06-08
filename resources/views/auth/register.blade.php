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
                                <div class="col-md-12">
                                    <div class="featured-box featured-box-primary text-left mt-5">
                                        <div class="box-content">
                                            <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">
                                                REGISTRAR UNA CUENTA</h4>
                                            <form method="POST" action="{{ route('register') }}" id="frmSignUp"  class="needs-validation">
                                                @csrf

                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Cédula</label>
                                                        <input id="cedula" name="cedula" type="text" value="{{ old('cedula') }}"
                                                            class="form-control form-control-lg @error('cedula') is-invalid @enderror" required>
                                                            @error('cedula')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Nombre</label>
                                                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                                                            class="form-control form-control-lg @error('name') is-invalid @enderror" required>
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Apellido</label>
                                                        <input id="apellido" name="apellido" type="text" value="{{ old('apellido') }}"
                                                            class="form-control form-control-lg @error('apellido') is-invalid @enderror" required>
                                                            @error('apellido')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Correo electrónico</label>
                                                        <input name="email" id="email" type="email" value="{{ old('email') }}"
                                                            class="form-control form-control-lg @error('email') is-invalid @enderror" required>
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Teléfono</label>
                                                        <input name="telefono" id="telefono" type="tel" value="{{ old('telefono') }}"
                                                            class="form-control form-control-lg @error('telefono') is-invalid @enderror" required>
                                                            @error('telefono')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                </div>

                                                

                                                <div class="form-row">
                                                    <div class="form-group col-lg-6">
                                                        <label
                                                            class="font-weight-bold text-dark text-2">Contraseña</label>
                                                        <input name="password" id="password" type="password"  autocomplete="new-password"
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror" required>
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>

                                                    {{-- <div class="form-group col-lg-6">
                                                        <label class="font-weight-bold text-dark text-2">Confirmar contraseña</label>
                                                        <input name="password-confirm" id="password-confirm" type="password" type="password" name="password_confirmation" required autocomplete="new-password"
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror">
                                                        </div> --}}
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-9">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="terms">
                                                            {{-- <label class="custom-control-label text-2" for="terms">I
                                                                have read and agree to the <a href="#">terms of
                                                                    service</a></label> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-3">
                                                        <input type="submit" value="Registrarse"
                                                            class="btn btn-primary btn-modern float-right"
                                                            data-loading-text="Loading...">
                                                    </div>
                                                </div>
                                            </form>
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
