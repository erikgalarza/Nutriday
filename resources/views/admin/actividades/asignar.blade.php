@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h5 class="page-title">
            Asignar actividad
        </h5>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asignar actividad</li>
            </ol>
        </nav>
    </div>

    <style>

        .puntero{
            cursor: pointer;

        }

        .ocultar{
            display:none;
        }
    </style>

    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="mb-5" style="background-color:#4b6ac3">
                    <h3 class="card-title titulosa text-lg-center mb-5 mt-5 text-white"
                        style="text-transform: uppercase; font-weight:bold">Asignación de la actividad</h3>
                </div>

                <div class="card-body" style="padding-right:13rem;padding-left:13rem">

                    <form method="POST" class="forms-sample" action="{{route('actividad.guardarAsignacion')}}"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="buscador_paciente my-3" style="display:flex; justify-content:center;">
                            <label><strong>Paciente:</strong> {{$paciente->nombre}}</label>
                        </div>
                        <input type="hidden" name="paciente_id" value="{{$paciente->id}}">
{{-- 
                        <table id="order-listing" class="table mb-5">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Duración</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                              
                            </tbody>
                        </table> --}}
                      
                       
                        <input type="hidden" value="{{$actividades}}" id="actividades">

                        {{-- <div class="form-group row py-2 px-2 clonar" style="background-color:#D5DBDB; border-radius:10px; display:flex; align-items:center;" >
                            <h5 class="mx-4" align="left">#1</h5>
                            <select 
                            name="actividad_id[]"
                            class="js-example-basic-multiple col-4">
                            <option selected disabled>Seleccionar actividad</option>
                            @foreach ($actividades as $actividad)
                                <option value="{{ $actividad->id }}">
                                    {{ $actividad->nombre }}</option>
                            @endforeach
                        </select>
                            <div class="col-sm-4">
                                <input style="border-radius:10px" min="0" name="duracion[]" type="number" class="form-control"
                                     placeholder="Duración">
                            </div>
                            <a  class="btn btn-danger puntero ocultar btnEliminar">Eliminar</a>
                        </div> --}}
                      
                        <div style="background-color:#D5DBDB; border-radius:10px;">
                            <div id="contenedor" class="p-2" style="  display:flex; justify-content:space-between;  align-items:center; flex-wrap:wrap; flex-direction:row;">
                         

                            </div>
                            
                            <div class="opciones col-12 py-3 my-3" style="display:flex; position:sticky;
                            bottom: 0px; justify-content:center; align-items:center;">
                                <label >Agregar actividad</label>
                                <a id="agregar" onclick="agregar();" class="btn btn-outline-success mx-3"><i class="fas fa-plus "></i></a>
                            </div>
                        </div>
                       
                      

                        <div class=" mt-5 form-group text-center">
                            <button type="submit" class="btn btn-success mr-2">Guardar</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        var i = 1;
      
        //  contenedor.className+="mx-2 my-2"    
        function agregar()
        {
           
            var contenedor=document.getElementById("contenedor");
            

            var actividades = document.getElementById('actividades').value;
           actividades =  JSON.parse(actividades)
           console.log(actividades)
           let select = document.createElement("select");
           select.className+=` form-control js-example-basic-multiple col-5 my-2 mr-2`;
           console.log(select)
           select.name="actividad_id[]"; 
   
        var div = document.createElement("div");
        var h5 =  document.createElement("h5");

        
        var a = document.createElement("a");
           for(let j = 0; j<actividades.length; j++)
            {

              
            
                h5.className+="text-left col-1";
                let indice = document.createTextNode(i);
                h5.appendChild(indice)


                let option = document.createElement("option");
                option.setAttribute("value", actividades[j].id);
                let optionTexto = document.createTextNode(actividades[j].nombre);
                option.appendChild(optionTexto);
                select.appendChild(option);

                
            
            div.className+="col-sm-3";
            let input = document.createElement("input")
            input.className+="form-control my-2";
            input.name="duracion[]"
            input.placeholder="Duración"
            input.style="border-radius:10px;max-height:38px; "
            // let input =`<input style="border-radius:10px" min="0" name="duracion[]" type="number" class="form-control"
            //                          placeholder="Duración">`
                div.append(input)
                // <a  class="btn btn-danger puntero ocultar btnEliminar">Eliminar</a>
                a.className+="btn col-2 my-2 ml-2 btn-danger btnEliminar";
                a.style="max-height:38px;"
                let texto = document.createTextNode("Eliminar");
                a.appendChild(texto);
            }
            i++;
            contenedor.append(h5);
            contenedor.appendChild(select)
            contenedor.append(div)
            contenedor.append(a);
           
            console.log(contenedor)
         
                     
        }


        // let agregar = document.getElementById('agregar');
        // let contenido = document.getElementById('contenedor');
        // agregar.addEventListener('click',e=>{
        //     e.preventDefault();
        //     let clonado = document.querySelector('.clonar');
        //     let clon = clonado.cloneNode(true);

        //     contenido.appendChild(clon).classList.remove('clonar');
        
        //     let remover = contenido.lastChild.querySelectorAll('a.btnEliminar');
        //     console.log(remover[0].classList)
        //     remover[0].classList.remove('ocultar') 
        // });

        // contenido.addEventListener('click',e=>{
        //     e.preventDefault();
        //     if(e.target.classList.contains('puntero'))
        //     {
        //         let contenedor = e.target.parentNode;
        //         contenedor.parentNode.removeChild(contenedor)
        //     }
        // })
    </script>
@endsection
