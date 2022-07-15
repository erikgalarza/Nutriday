@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h5 class="page-title">
            Asignar actividad
        </h5>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
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

        @media (max-width:992px) {
            .consulta {
                order: 1;
            }
        }
    </style>

<form method="POST" class="forms-sample" action="{{ route('actividad.guardarAsignacion') }}">
    @csrf

    <div class="card ">
        <div class="mb-2" style="background-color:#4b6ac3">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Actividades de {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
        </div>
        <div class="row px-4" style="margin-top:10px;">

            <div class="col-lg-6 grid-margin stretch-card consulta ">
                <div class="card m">
                    <div class="card-body text-center py-2 row justify-content-lg-center">

                        <div class="col-12 row justify-content-center">
                            <div class=" col-12 row justify-content-center" style="border-bottom:1px solid;max-width:345px">
                                <div class="col-6 col-lg-12 col-xl-6  p-0 ">
                                    <label class="col-form-label" style="font-size:16px;font-weight:bold">
                                        Última consulta:</label>
                                </div>
                                @foreach ($paciente->dato_antropometrico as $kp => $data)
                                    @if ($loop->last)
                                        <div class="col-6 col-lg-12 col-xl-6 no-gutters p-0 text-center ">
                                            <label class="col-form-label"
                                                style=";font-size:16px">{{ date('Y-m-d', strtotime($data->created_at)) }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <style>
                            @media (max-width:992px) {
                                .contenedor {
                                    max-width: 360px !important;
                                    padding-left: 2rem !important;
                                }
                            }

                            @media (min-width:992px) {
                                .contenedor2 {
                                    max-width: 290px !important;
                                    padding-left: 0rem !important;
                                }
                            }
                        </style>
                        <div class="container mt-3 contenedor contenedor2" style="">
                            <div class="col-lg-12 col-10 text-left ml-4 p-0">
                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"><strong>Tipo diabetes:</strong></label>
                                    <label class="col-7">{{ $paciente->tipo_diabetes }}</label>
                                </div>
                                <div class="form-group row mb-1">
                                    <label class="col-5 text-left"> <strong>Edad:</strong></label>
                                    <label class="col-7">{{ $paciente->edad }}</label>
                                </div>

                                @foreach ($paciente->dato_antropometrico as $kp => $data)
                                    @if ($loop->last)
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Altura:</strong></label>
                                            <label class="col-7">{{ $data->altura }} (m)</label>
                                        </div>
                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Peso:</strong></label>
                                            <label class="col-7">{{ $data->peso }} (kg)</label>
                                        </div>

                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Grasa corporal:</strong>
                                            </label>
                                            <label class="col-7">{{ $data->grasa_corporal }} (%)</label>
                                        </div>

                                        <div class="form-group row mb-1">
                                            <label class="col-5 text-left"><strong>Masa muscular:</strong></label>
                                            <label class="col-7">{{ $data->masa_muscular }} (%) </label>
                                        </div>

                                        @if ($data->imc <= 18.4)
                                            <div class="form-group row mb-1">
                                                <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                <label class="col-7">{{ $data->imc }} (Bajo peso)</label>
                                            </div>
                                        @endif
                                        @if ($data->imc >= 18.5 && $data->imc <= 24.9)
                                            <div class="form-group row mb-1">
                                                <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                <label class="col-7">{{ $data->imc }} (Normal)</label>
                                            </div>
                                        @endif
                                        @if ($data->imc >= 25 && $data->imc <= 29.9)
                                            <div class="form-group row mb-1">
                                                <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                <label class="col-7">{{ $data->imc }} (Sobrepeso)</label>
                                            </div>
                                        @endif

                                        @if ($data->imc >= 30)
                                            <div class="form-group row mb-1">
                                                <label class="col-5 text-left"><strong>IMC:</strong></label>
                                                <label class="col-7">{{ $data->imc }} (Obeso)</label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card consulta">
                <div class="card">
                    <div class="card-body">
                        <div class="row  justify-content-between mb-2"  style="max-height: auto;">
                            <h4 class="card-title col-6">
                                <img src="http://localhost:8000/img/icons/scale.png">   Peso (Kg)
                            </h4>
                            <div class=" col-4 text-right"> <a title="Ver más" class="btn btn-outline-secondary p-2"
                                    data-toggle="modal" data-target="#exampleModal-35"><i class="fa fa-plus"
                                        aria-hidden="true"></i></a></div>

                        </div>
                        <input type="hidden" id="datosAntropometricos" value="{{$datos}}">
                        <canvas id="sales-chart"  style="max-height: 180px;"></canvas>

                    </div>
                </div>
            </div>
        </div>


            <div class="  form-group text-center mt-2 mb-4">
                <button type="submit" class="btn btn-success mr-2"><i class="fa-solid fa-floppy-disk mr-2"></i> Guardar
                    actividades</button>
                <a href="{{ route('actividad.index') }}" class="btn btn-light">Cancelar</a>
            </div>
    </div>

    <div class="card mt-3 p-0">
        <div class="card-body p-0">
            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
            <input type="hidden" name="idResponsable" value="{{ $idResponsable }}" id="idResponsable">
            <input type="hidden" value="{{ $actividadesReales }}" id="actividades">
            <div class="col-12 mx-0" style="border:1px solid #9a9b9b ;border-radius:7px  ">
                <div class="row justify-content-center p-3"
                    style="border-bottom: 1px solid #9a9b9b;background-color:#dce7e7">
                    <div class="row w-100  text-left" style="font-weight:bold">
                        <label class="col-md-1 col-12 text-center text-md-left">N°</label>
                        <label class="col-md-4 col-12  text-center">Nombre actividad</label>
                        <label class="col-md-3 col-12  text-center">Prioridad</label>
                        <label class="col-md-2 col-12   text-center text-md-right">Duración </label>
                        <label class="col-md-2 col-12   text-center text-md-right">Acciones</label>
                    </div>

                </div>

                <div id="contenedor" class=" col-12 mt-3"
                    style="  display:flex; justify-content:space-between;  align-items:center; flex-wrap:wrap; flex-direction:row">
                </div>
                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
            <input type="hidden" name="idResponsable" value="{{ $idResponsable }}" id="idResponsable">
            <input type="hidden" value="{{ $actividadesReales }}" id="actividades">

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class=" bg-danger m-1 p-0 row justify-content-center align-items-center"
                            style="border-radius:5px" role="alert">
                            <label class="col-form-label text-white"
                                style="font-size:14px;font-weight:bold;text-transform:uppercase">
                                {{ $error }} para la actividad</label>

                        </div>
                    @endforeach
                @endif
                @if (count($actividadesReales) > 0)
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
    </div>

</form>

    <div class="card mt-3">
        <div class="card-body">
            <div class="container ">
                <div class="table-responsive">
                    <table id="order-listing" class="table  text-center" style="min-width: 791px">
                        <thead>
                            <tr>
                                <th style="">N°</th>
                                <th style="">Nombre actividad</th>
                                {{-- <th style="">Prioridad</th> --}}
                                <th style="">Imagen</th>
                                <th style="">Duración</th>
                                <th>Nutricionista</th>
                                <th style="">Fecha asignación</th>

                                <th style="">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividades as $key => $actividad)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $actividad->nombre }}</td>
                                    <td><img src="{{ $actividad->imagen->url }}"></td>
                                    <td>{{ $actividad->duracion }}</td>
                                    <td>{{ $actividad->responsable }}</td>
                                    <td>{{ date('Y-m-d', strtotime($actividad->created_at)) }}</td>
                                    <td>


                                        <a href="{{ route('actividad.eliminarActividadAsignada', [$actividad->id, $paciente->id]) }}"
                                            class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade"id="exampleModal-35" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg"role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#4b6ac3">
                            <h5 class="modal-title text-lg-center text-white"
                                style="text-transform: uppercase; font-weight:bold; font-size:16px" id="ModalLabel">
                                Gráfica de peso
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        var i = 1;

        function eliminarFila(id) {
            $('#lbl' + id).remove();
            $('#btnEliminar' + id).remove();
            $('#selectPrioridad' + id).remove();
            $('#selectActividad' + id).remove();
            $('#contenedorDuracion' + id).remove();
        }

        function agregar() {

            var contenedor = document.getElementById("contenedor");


            var actividades = document.getElementById('actividades').value;
            actividades = JSON.parse(actividades)


            let selectActividad = document.createElement("select");
            selectActividad.className += ` form-control js-example-basic-simple col-md-4 my-2 `;
            selectActividad.id = "selectActividad" + i

            let selectPrioridad = document.createElement("select");
            selectPrioridad.id = "selectPrioridad" + i
            selectPrioridad.className += ` form-control js-example-basic-simple col-md-3 my-2 `;

            selectActividad.name = "actividad_id[]";
            selectPrioridad.name = "prioridad_id[]";

            var div = document.createElement("div"); //div que contiene a duracion
            div.id = "contenedorDuracion" + i
            var label = document.createElement("label");

            // //creacion del boton de eliminar
            var a =
                `<div class="col-md-1 my-2 ml-2 text-center" id="btnEliminar${i}"><a class="btn btn-danger btnEliminar"  onclick="eliminarFila(${i})"><i class="fa-solid fa-xmark "></i></a></div>`
            //fin boton eliminar

            //edicion del indice de filas
            label.className += "text-left col-md-1 pr-0 pl-2";
            label.id = "lbl" + i;
            let indice = document.createTextNode(i);
            label.appendChild(indice)
            //fin edicion indice filas

            for (let j = 0; j < actividades.length; j++) {
                //creamos las options para el selectActividad
                let option = document.createElement("option");
                option.setAttribute("value", actividades[j].id);
                let optionTexto = document.createTextNode(actividades[j].nombre);
                option.appendChild(optionTexto);
                selectActividad.appendChild(option);
                //fin options para selectActividad
            }


            const nombrePrioridad = ["Baja", "Media", "Alta"];
            for (let x = 0; x < 3; x++) {
                //creamos las options para el selectPrioridad
                let option = document.createElement("option");
                option.setAttribute("value", (x + 1));
                let optionTexto = document.createTextNode(nombrePrioridad[x]);
                option.appendChild(optionTexto);
                selectPrioridad.appendChild(option);
                //fin options para selectPrioridad
            }

            //este div es el que contiene a los inputs de duracion
            div.className += "col-md-2 p-0";
            let input = document.createElement("input")
            input.className += "form-control my-2";
            input.name = "duracion[]"
            input.placeholder = "Duración"
            input.style = "border-radius:10px;max-height:38px; "
            div.append(input)
            //fin div inputs duracion

            i++; // aumentamos el indice contador de filas

            contenedor.append(label);
            contenedor.appendChild(selectActividad)
            contenedor.appendChild(selectPrioridad)
            contenedor.append(div)
            $(contenedor).append(a);

            console.log(contenedor)
        }



        function eliminarActividad(actividad) {
            var form = document.getElementById('eliminarActividad' + actividad.id);
            swal({
                title: "Estas seguro que quieres eliminar la actividad " + actividad.nombre + " ?",
                text: "Al confirmar, la actividad será eliminada permanentemente!",
                icon: "warning",
                buttons: [
                    'No, cancelar!',
                    'Si, estoy seguro!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    form.submit(); // <--- submit form programmatically

                }
            })

        }
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
     integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
     integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="{{ asset('administracion/js/historialPaciente.js') }}"></script>




@endsection
