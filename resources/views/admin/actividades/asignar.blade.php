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
        .puntero {
            cursor: pointer;
        }

        .ocultar {
            display: none;
        }

        @media(max-width:1199px) {
            .container2 {
                max-width: 420px;
            }
        }

        @media(min-width:1199px) {
            .container3 {
                max-width: 420px;
            }

        }

        @media(min-width:1200px) {
            .container4 {
                min-width: 810px;
                max-width: 1140px;
            }
        }
    </style>


    <div class="card">

        <div class=" mb-2" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Asignar actividades a {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
        </div>
        <div class="card-body">
            <div class="container container2 container3 container4">
                <div class="row justify-content-center mb-3 ml-0" style="border:1px dashed; border-radius:10px ">
                    <div class="col-12 form-group text-center mb-1 row justify-content-center"
                        style="border-bottom:1px dashed;background-color:#dce7e7;border-radius:10px 10px 0 0">
                        <div class="col-xl-8 row justify-content-center">
                            <div class="col-xl-3 col-5  no-gutters p-0 text-center ">
                                <label class=" col-form-label " style="font-size:16px;font-weight:bold">Última
                                    consulta:</label>
                            </div>
                            @foreach ($paciente->dato_antropometrico as $kp => $data)
                                @if ($loop->last)
                                    <div class=" col-xl-4 col-6 no-gutters p-0 text-center ">
                                        <label class="col-form-label" style=";font-size:16px">{{ $data->created_at }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 ">
                        <div class="row justify-content-center align-items-center px-2 mt-xl-2">
                            <div class="col-9 col-xl-12 row pr-0 pl-4 pl-xl-2 justify-content-center">
                                <div class="form-group  col-xl-2 row text-xl-center text-left mb-1 ">
                                    <label class="col-xl-12 col-6 col-form-label p-1"><strong>Edad:</strong></label>
                                    <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $paciente->edad }}</label>
                                </div>
                                <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                    <label class="col-xl-12 col-6 col-form-label p-1"><strong>Tipo
                                            diabetes:</strong></label>
                                    <label
                                        class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $paciente->tipo_diabetes }}</label>
                                </div>
                                @foreach ($paciente->dato_antropometrico as $kp => $data)
                                    @if ($loop->last)
                                        <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                            <label class="col-xl-12 col-6 col-form-label p-1"><strong>Peso:
                                                </strong></label>
                                            <label
                                                class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->peso }}</label>
                                        </div>
                                        <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                            <label class="col-xl-12 col-6 col-form-label p-1"><strong>Grasa corporal:
                                                </strong></label>
                                            <label
                                                class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->grasa_corporal }}
                                                (%)
                                            </label>
                                        </div>
                                        <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                            <label class="col-xl-12 col-6 col-form-label p-1"><strong>Masa muscular:
                                                </strong></label>
                                            <label
                                                class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->masa_muscular }}
                                                (%)</label>
                                        </div>
                                        @if ($data->imc <= 18.4)
                                            <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                                <label
                                                    class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                                <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }}
                                                    (Bajo peso)</label>
                                            </div>
                                        @endif

                                        @if ($data->imc >= 18.5 && $data->imc <= 24.9)
                                            <div class="form-group col-xl-2 row text-xl-center text-left mb-1  ">
                                                <label
                                                    class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                                <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }}
                                                    (Normal)</label>
                                            </div>
                                        @endif

                                        @if ($data->imc >= 25 && $data->imc <= 29.9)
                                            <div class="form-group col-xl-2 row text-xl-center text-left mb-1 ">
                                                <label
                                                    class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                                <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }}
                                                    (Sobrepeso)</label>
                                            </div>
                                        @endif

                                        @if ($data->imc >= 30)
                                            <div class="form-group col-xl-2 row text-xl-center text-left mb-1 ">
                                                <label
                                                    class="col-xl-12 col-6 col-form-label p-1"><strong>IMC:</strong></label>
                                                <label class="col-xl-12 col-5 col-form-label p-1 mb-1">{{ $data->imc }}
                                                    (Obeso)</label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> <!-- del contenedor -->
            </div>
        </div>
    </div>




    <div class="card mt-3">
        <div class="card-body">
            <div class="container mt-3">
                <form method="POST" class="forms-sample" action="{{ route('actividad.guardarAsignacion') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                    <input type="hidden" value="{{ $actividades }}" id="actividades">



                        <div class="container" style="border:1px dashed;border-radius:10px">
                            <div class="row justify-content-center p-3" style="border-bottom: 1px dashed;background-color:#dce7e7">
                                <div class="col-12 d-flex text-left" style="font-weight:bold">
                                    <label class="col-1">N°</label>
                                    <label class="col-5 mx-1 text-center">Nombre actividad</label>
                                    <label class="col-3 pl-5 text-center">Duración actividad</label>
                                    <label class="col-2 pl-5 text-center">Acciones</label>
                                </div>

                            </div>

                        <div id="contenedor" class=" col-12"
                        style="  display:flex; justify-content:space-between;  align-items:center; flex-wrap:wrap; flex-direction:row">
                    </div>

                        @if (count($actividades) > 0)
                                    <div class="opciones col-12 py-2 my-1"
                                        style="display:flex; position:sticky;
                                    bottom: 0px; justify-content:center; align-items:center;">
                                        {{-- <label class="col-form-label">Agregar actividad</label> --}}
                                        <a id="agregar" onclick="agregar();" class="btn btn-warning my-4"><i
                                                class="fas fa-plus mr-3"></i>Agregar actividad</a>
                                    </div>
                                @else
                                    <div class="opciones col-12 py-2 my-1"
                                        style="display:flex; position:sticky;
                                    bottom: 0px; justify-content:center; align-items:center;">
                                        <label class="badge badge-danger">No hay actividades para asignar</label>
                                    </div>
                                @endif

                            </div>
            </div>

            <div class=" mt-4 form-group text-center">
                <button type="submit" class="btn btn-success mr-2">Guardar</button>
                <a href="{{ route('actividad.index') }}" class="btn btn-light">Cancelar</a>

            </div>
            </form>
        </div>
    </div>


    <div class="card mt-3">
        <div class="card-body">
            <div class="container ">
                <div class="table-responsive">
                    <table id="order-listing" class="table  text-center">
                        <thead>
                            <tr>
                                <th style="">N°</th>
                                <th style="">Nombre de la actividad</th>
                                <th style="">Duración</th>
                                <th style="">Imagen</th>
                                <th style="">Fecha de asignación</th>
                                <th style="">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($actividades as $key => $actividad)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $actividad->nombre }}</td>
                                <td>{{ $actividad->duracion}}</td>
                                <td>{{ $actividad->imagen->url }}</td>
                                <td>{{ $actividad->created_at }}</td> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <script>
        var i = 1;

        //  contenedor.className+="mx-2 my-2"
        function agregar() {

            var contenedor = document.getElementById("contenedor");


            var actividades = document.getElementById('actividades').value;
            actividades = JSON.parse(actividades)
            console.log(actividades)
            let select = document.createElement("select");
            select.className += ` form-control js-example-basic-multiple col-md-5 my-2 mr-2`;
            console.log(select)
            select.name = "actividad_id[]";

            var div = document.createElement("div");
            var h5 = document.createElement("h5");


            var a = document.createElement("a");



            for (let j = 0; j < actividades.length; j++) {
                h5.className += "text-left col-md-1";
                let indice = document.createTextNode(i);
                h5.appendChild(indice)
                let option = document.createElement("option");
                option.setAttribute("value", actividades[j].id);
                let optionTexto = document.createTextNode(actividades[j].nombre);
                option.appendChild(optionTexto);
                select.appendChild(option);


                div.className += "col-md-3";
                let input = document.createElement("input")
                input.className += "form-control my-2";
                input.name = "duracion[]"
                input.placeholder = "Duración"
                input.style = "border-radius:10px;max-height:38px; "
                // let input =`<input style="border-radius:10px" min="0" name="duracion[]" type="number" class="form-control"
            //                          placeholder="Duración">`
                div.append(input)
                // <a  class="btn btn-danger puntero ocultar btnEliminar">Eliminar</a>
                a.className += "btn col-md-2 my-2 ml-2 btn-danger btnEliminar";
                a.style = "max-height:38px;"
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
