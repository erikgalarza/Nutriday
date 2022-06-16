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
                <div class=" row justify-content-center" style="background-color:#4b6ac3 ">
                    <h3 class="card-title text-lg-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Asignar actividades a paciente</h3>
                </div>
                <div class="card-body" style="padding-right:13rem;padding-left:13rem">

                    <form method="POST" class="forms-sample" action="{{route('actividad.guardarAsignacion')}}"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="buscador_paciente mb-3  row  ml-0" style="display:flex; justify-content:center;border:1px dashed; border-radius:10px;width:100%">
                            <div class="col-12 form-group text-center mb-1" style="border-bottom:1px dashed;background-color:#f0f0f0;border-radius:10px 10px 0 0">

                                <label class="col-4 col-form-label text-center" style="text-transform: uppercase;font-size:16px;font-weight:bold">{{$paciente->nombre}} {{$paciente->apellido}}</label>
                            </div>
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1" ><strong>Edad:</strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{$paciente->edad}}</label>
                                </div>
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1" ><strong>Tipo diabetes:</strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{$paciente->tipo_diabetes}}</label>
                                </div>
                            @foreach($paciente->dato_antropometrico as $kp => $data)
                                @if($loop->last)
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>Peso: </strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{ $data->peso}}</label>
                                </div>
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>Grasa corporal: </strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{$data->grasa_corporal}} (%)</label>
                                </div>
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>Masa muscular: </strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{$data->masa_muscular}} (%)</label>
                                </div>
                                @if($data->imc <= 18.4)
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>IMC:</strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{ $data->imc }} (Bajo peso)</label>
                                </div>
                                @endif

                                @if($data->imc >=18.5 &&  $data->imc <= 24.9)
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>IMC:</strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{ $data->imc }} (Normal)</label>
                                </div>
                                @endif

                                @if($data->imc >=25 &&  $data->imc <= 29.9)
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>IMC:</strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{ $data->imc }} (Sobrepeso)</label>
                                </div>
                                @endif

                                @if($data->imc >=30)
                                <div class="form-group col-2 row text-center mb-2">
                                    <label class="col-12 col-form-label p-1"><strong>IMC:</strong></label>
                                    <label class="col-12 col-form-label p-1 mb-1">{{ $data->imc }} (Obeso)</label>
                                </div>

                                @endif

                            @endif
                            @endforeach

                        </div>
                        <input type="hidden" name="paciente_id" value="{{$paciente->id}}">
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

                        <div class=" mt-4" style="border:1px dashed;border-radius:10px">
                            <table id="order-listing" class="table  text-center" style="background-color:#F0F0F0; border-radius:10px; ">
                                <thead >
                                    <tr >
                                        <th style="">N°</th>
                                        <th style="">Nombre</th>
                                        <th style="">Duración</th>
                                        <th style="">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            <div id="contenedor" class=" col-12" style="  display:flex; justify-content:space-between;  align-items:center; flex-wrap:wrap; flex-direction:row;border-top:1px dashed">

                            </div>

                            @if(count($actividades)>0)
                            <div class="opciones col-12 py-2 my-1" style="display:flex; position:sticky;
                            bottom: 0px; justify-content:center; align-items:center;">
                                {{-- <label class="col-form-label">Agregar actividad</label> --}}
                                <a id="agregar" onclick="agregar();" class="btn btn-warning my-4"><i class="fas fa-plus mr-3"></i>Agregar actividad</a>
                            </div>
                            @else
                            <div class="opciones col-12 py-2 my-1" style="display:flex; position:sticky;
                            bottom: 0px; justify-content:center; align-items:center;">
                               <label class="badge badge-danger">No hay actividades para asignar</label>
                            </div>
                            @endif


                        </div>

                        <div class=" mt-5 form-group text-center">
                            <button type="submit" class="btn btn-success mr-2">Guardar</button>
                            <a href="{{route('actividad.index')}}" class="btn btn-light">Cancelar</a>

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
