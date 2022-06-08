@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Editar datos de administración
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administrador.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
            </ol>
        </nav>
    </div>

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <form method="POST" id="formularioEditarPerfil" action="{{route('admin.updateCuenta')}}" style="display:hidden;">
                @csrf
                <input name="password" type="hidden" class="form-control my-3" placeholder="Nueva contraseña"
                id="password">
                <input name="confirm-password" class="form-control my-3" type="hidden"
                placeholder="Confirmar nueva contraseña" class="form-control" id="newpassword">
            </form>
            
            <div class="card" style="display:flex; flex-wrap:wrap; flex-direction:row; justify-content:center; align-items:center;">
                <div class="imagencard" style="margin:10px 10px;">

                    <img style="max-width:300px;" src="{{ asset('img/icons/Administrador.png') }}">
                </div>
                <div class="infopaciente" >
                    <h5 style="padding-bottom:10px;">Email:{{ $administrador->user->email }}</h5>
                    <input name="password2" type="password" class="form-control my-3" placeholder="Nueva contraseña"
                    id="password2">
                    <input name="confirm-password2" class="form-control my-3" type="password"
                    placeholder="Confirmar nueva contraseña" class="form-control" id="newpassword2">

                    <div style="display:flex; justify-content:center; margin-bottom:10px;">
                        <a onclick="enviarFormulario();" class="btn btn-success">Guardar cambios</a>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
        </div>
    </div>

    <script>
function enviarFormulario() 
{
    var form = document.getElementById('formularioEditarPerfil');

    password = document.getElementById('password2').value;
    newpassword = document.getElementById('newpassword2').value;

    password = document.getElementById('password').value = password;
    newpassword = document.getElementById('newpassword').value = newpassword;

    form.submit();
}
    </script>
    
@endsection
