@extends('client.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Estado de ánimo
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Estado de ánimo</li>
        </ol>
    </nav>
</div>

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="display:flex; flex-wrap:wrap;">
            <div class=" mb-3" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-lg-center mb-4 mt-4 text-white"
                    style="text-transform: uppercase; font-weight:bold">Estado de ánimo actual</h3>
            </div>
            <div class="Pregunta text-center mt-4">
                <h3>¿Cómo te sientes?</h3>
            </div>

            <div class="mb-3" style="width:100%; margin-top:20px; display:flex; justify-content:center; align-items:center; flex-direction:row; flex-wrap:wrap;">
                <a onclick="seleccionar('alegre');" class="iconos" id="alegre" style="border-radius:20%;">
                    <article class="estado_animo mx-4 my-3"   >
                        <div class="imagen mb-2">
                            <img src="{{asset('img/icons/happy.png')}}">
                        </div>
                        <div class="nombre text-center">
                            <h5>Alegre</h5>
                        </div>
                    </article>
                </a>
                <a onclick="seleccionar('triste');" class="iconos"  id="triste" style="border-radius:20%;">
                  <article class="estado_animo mx-4 my-3"  >
                    <div class="imagen mb-2">
                        <img src="{{asset('img/icons/sad.png')}}">
                    </div>
                    <div class="nombre text-center">
                        <h5>Triste</h5>
                    </div>
                </article>
            </a>
            <a onclick="seleccionar('aburrido');" class="iconos" id="aburrido" style="border-radius:20%;"  >
                <article class="estado_animo mx-4 my-3"  >
                    <div class="imagen mb-2">
                        <img src="{{asset('img/icons/bored.png')}}">
                    </div>
                    <div class="nombre text-center">
                        <h5>Aburrido</h5>
                    </div>
                </article>
            </a>
            <a onclick="seleccionar('enojado');" class="iconos" id="enojado" style="border-radius:20%;" >
                <article class="estado_animo mx-4 my-3" >
                    <div class="imagen mb-2">
                        <img src="{{asset('img/icons/angry.png')}}">
                    </div>
                    <div class="nombre text-center">
                        <h5>Enojado</h5>
                    </div>
                </article>
            </a>
            </div>

            <form method="POST" id="formEstadoAnimo" action="{{route('cliente.guardarEstadoAnimo')}}">
                @csrf
                <input type="hidden" name="estado_animo" id="estado_animo">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="comentario col-10 col-md-8"  >
                        <textarea name="descripcion" style="box-shadow: -4px 3px 5px rgb(24, 28, 34);border:3px solid #17202A" class="form-control" rows="5" cols="30" id="descripcion" placeholder="¿A que se debe tu estado de ánimo actual? nos encantaría saberlo para ayudarte mejor!"></textarea>
                        </div>
                    </div>
                </div>
                <div class="botones text-center mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                    <div class="col-8 col-xl-5 p-0 justify-content-space-around">
                    <a onclick="submitFormulario();" class="btn btn-success mb-2 col-sm-12 col-md-5">Enviar</a>
                    <a  href="{{route('cliente.dashboard')}}" class="btn btn-light mb-2 col-sm-12 col-md-5">Cancelar</a>
                    </div>
                </div>

            </form>

    </div>
</div>

<script>
 var estadoAnimo="";
    function seleccionar(animo){
       document.querySelectorAll('.iconos').forEach(a=>{
          if(a.id==animo){
              a.style="background-color:#28B463; border-radius:20%;color:white";
              estadoAnimo=animo;
          }else{
              a.style="";
          }
       })
    }

    function submitFormulario(){
        var form = document.getElementById('formEstadoAnimo');
        document.getElementById('estado_animo').value = estadoAnimo;
        if(estadoAnimo==""){
            alert("Ups! al parecer aun no has indicado tu estado de ánimo");
        }else{
            form.submit();
        }

    }
</script>
@endsection
