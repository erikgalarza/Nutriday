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
 
            <div class="Pregunta text-center mt-4">
                <h3>¿Cómo te sientes?</h3>
            </div>

            <div  style="width:100%; margin-top:20px; display:flex; justify-content:center; align-items:center; flex-direction:row; flex-wrap:wrap;">
                <a onclick="seleccionar('alegre');" class="iconos" id="alegre" style="border-radius:20%;">
                    <article class="estado_animo mx-4 my-3"   >
                        <div class="imagen">
                            <img src="{{asset('img/icons/happy.png')}}">
                        </div>
                        <div class="nombre text-center">
                            <h5>Alegre</h5>
                        </div>
                    </article>
                </a>
                <a onclick="seleccionar('triste');" class="iconos"  id="triste" style="border-radius:20%;">
                  <article class="estado_animo mx-4 my-3"  >
                    <div class="imagen">
                        <img src="{{asset('img/icons/sad.png')}}">
                    </div>
                    <div class="nombre text-center">
                        <h5>Triste</h5>
                    </div>
                </article>
            </a>
            <a onclick="seleccionar('aburrido');" class="iconos" id="aburrido" style="border-radius:20%;"  >
                <article class="estado_animo mx-4 my-3"  >
                    <div class="imagen">
                        <img src="{{asset('img/icons/bored.png')}}">
                    </div>
                    <div class="nombre text-center">
                        <h5>Aburrido</h5>
                    </div>
                </article>
            </a>
            <a onclick="seleccionar('enojado');" class="iconos" id="enojado" style="border-radius:20%;" >
                <article class="estado_animo mx-4 my-3" >
                    <div class="imagen">
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

                <div class="comentario" style="margin:20px 180px;" >
                    <textarea name="descripcion" style="box-shadow: -4px 3px 5px rgb(24, 28, 34);
                    border:3px solid #17202A" class="form-control" rows="5" cols="30" id="descripcion" placeholder="¿A que se debe tu estado de ánimo actual? nos encantaría saberlo para ayudarte mejor!"></textarea>
                </div>

            </form>
            

        <div class="botones my-5 text-center">
            <a onclick="submitFormulario();" class="btn btn-success">Enviar</a>
        </div>

     
    </div>
</div>

<script>
 var estadoAnimo="";
    function seleccionar(animo){
       document.querySelectorAll('.iconos').forEach(a=>{
          if(a.id==animo){
              a.style="background-color:#28B463; border-radius:20%;";
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
