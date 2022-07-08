@extends('client.dashboard')
@section('contenido')

{{-- <style>
    .btnAlimentos
    {
        cursor:pointer;
    }
</style> --}}
    <div class="page-header mb-2">
        <h3 class="page-title">
            Inicio
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
        </nav>
    </div>
    <input type="hidden" id="dieta_id" value="{{$dieta->id}}">
    <input type="hidden" id="paciente_id" value="{{$paciente->id}}">

    @php
    $nombreDia=["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO","DOMINGO"];
    @endphp

      {{-- MODAL DE VER ALIMENTOS POR DIA --}}
    @for($i = 0; $i<7;$i++)
     
    <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog"
        aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4b6ac3">
                    <h5 class="modal-title text-lg-center text-white"style="text-transform: uppercase; font-weight:bold;"
                        id="ModalLabel">
                        Alimentos de la dieta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3 px-0">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Día: {{$nombreDia[$i]}}</h4>
                                <div class="container my-2 p-0"
                                    style=" min-height:600px; display:flex; flex-wrap:wrap; flex-direction:row;"
                                    id="container{{$i}}">

                                    <div class="desayuno w-100 text-center mt-3" id="desayuno{{$i}}">
                                        <div class="row justify-content-center align-items-center">
                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">DESAYUNO</h5>
                                        </div>
                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                            <h5 class="col-2 m-0 ">Peso</h5>
                                            <h5 class="col-3 m-0">Imagen</h5>
                                            <h5 class="col-3 m-0">Porción</h5>
                                        </div>
                                        <div class="col-12 my-2" style="border-top:1px solid"></div>
                                        <div class="alimentosDesayuno col-12 w-100"id="alimentosDesayuno{{$i}}"></div>
                                    </div>
                                    </div>


                                    <div class="colacion1 w-100 text-center mt-3" id="colacion1{{ $i }}">
                                        <div class="row justify-content-center align-items-center">
                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">COLACIÓN DE LA MAÑANA</h5>
                                        </div>
                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                        <div class="cabecera mt-2 col-12 text-center row no-gutters  align-items-center justify-content-center">
                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                            <h5 class="col-2 m-0 ">Peso</h5>
                                            <h5 class="col-3 m-0">Imagen</h5>
                                            <h5 class="col-3 m-0 ">Porción</h5>
                                        </div>
                                        <div class="col-12 my-2" style="border-top:1px solid"></div>
                                        <div class="alimentosColacion1 col-12 w-100"id="alimentosColacion1{{ $i }}"></div>
                                        </div>
                                    </div>


                                    <div class="almuerzo w-100 text-center mt-3" id="almuerzo{{ $i }}">
                                        <div class="row justify-content-center align-items-center">
                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">ALMUERZO</h5>
                                        </div>
                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                            <h5 class="col-2 m-0 ">Peso</h5>
                                            <h5 class="col-3 m-0">Imagen</h5>
                                            <h5 class="col-3 m-0">Porción</h5>
                                        </div>
                                        <div class="col-12 my-2" style="border-top:1px solid"></div>
                                        <div class="alimentosAlmuerzo col-12 w-100"id="alimentosAlmuerzo{{ $i }}"></div>
                                        </div>
                                    </div>

                                    <div class="colacion2 w-100 text-center mt-3" id="colacion2{{ $i }}">
                                        <div class="row justify-content-center align-items-center">
                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">COLACIÓN DE LA TARDE</h5>
                                        </div>
                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                            <h5 class="col-2 m-0 ">Peso</h5>
                                            <h5 class="col-3 m-0">Imagen</h5>
                                            <h5 class="col-3 m-0">Porción</h5>
                                        </div>
                                        <div class="col-12 my-2" style="border-top:1px solid"></div>

                                        <div class="alimentosColacion2 col-12 w-100"id="alimentosColacion2{{ $i }}"></div>
                                        </div>
                                    </div>

                                    <div class="merienda w-100 text-center mt-3" id="merienda{{ $i }}">
                                        <div class="row justify-content-center align-items-center">
                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">MERIENDA</h5>
                                        </div>
                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                            <h5 class="col-2 m-0 ">Peso</h5>
                                            <h5 class="col-3 m-0">Imagen</h5>
                                            <h5 class="col-3 m-0">Porción</h5>
                                        </div>
                                        <div class="col-12 my-2" style="border-top:1px solid"></div>

                                        <div class="alimentosMerienda col-12 w-100"id="alimentosMerienda{{ $i }}"></div>
                                        </div>
                                    </div>

                                    <div class="cena w-100 text-center mt-3" id="cena{{ $i }}">
                                        <div class="row justify-content-center align-items-center">
                                            <h5 class="textoDesayuno col-12 text-left" style="color:#828383">CENA</h5>
                                        </div>
                                        <div class="w-100 p-3 "style="border: 1px solid #828383; border-radius:5px">
                                        <div class="cabecera mt-2 col-12 text-center no-gutters  row align-items-center justify-content-center">
                                            <h5 class="col-4 m-0 text-left">Nombre</h5>
                                            <h5 class="col-2 m-0 ">Peso</h5>
                                            <h5 class="col-3 m-0">Imagen</h5>
                                            <h5 class="col-3 m-0">Porción</h5>
                                        </div>
                                        <div class="col-12 my-2" style="border-top:1px solid"></div>

                                        <div class="alimentosCena col-12 w-100"id="alimentosCena{{ $i }}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor

   
        
      

    <div class="card">
        <div class="col-12 p-0">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                        @for($i=0 ; $i<7; $i++)
                        <div class="statistics-item text-center" style="max-width: 120px">
                            <p>
                                <i class="fa-regular fa-calendar-minus"></i>
                            </p>
                            <h2 class="" style="font-size:18px;text-transform:uppercase">{{$nombreDia[$i]}}</h2>
                            <a data-toggle="modal"
                            data-target="#exampleModal{{$i}}" onclick="cargarAlimentos({{$i}});"  class="btnAlimentos">
                                <label class="badge badge-outline-success badge-pill mt-3">Ver detalles</label>
                            </a>
                        </div>
                      @endfor

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3" style="border-radius:10px">
        <div class=" mb-2" style="background-color:#4b6ac3;border-radius:10px 10px 0 0 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Seguimiento del progreso</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <input type="hidden" id="datosAntropometricos" value="{{ $datos }}">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <img src="{{ asset('img/icons/scale.png') }}">
                                Peso (Kg)
                            </h4>
                            {{-- <h2 class="mb-5">56000 <span class="text-muted h4 font-weight-normal">Peso promedio</span></h2> --}}
                            <canvas id="sales-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <img src="{{ asset('img/icons/body.png') }}">
                                IMC (Kg/A²)
                            </h4>
                            <canvas id="orders-chart"></canvas>
                            <div id="orders-chart-legend" class="orders-chart-legend"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3" style="border-radius:10px ">
        <div class=" mb-2" style="background-color:#4eba74;border-radius:10px 10px 0 0 " >
            <h3 class="card-title text-center mb-3 mt-3 text-white"style="text-transform: uppercase; font-weight:bold"><i
                    class="fas fa-dumbbell"></i>
                Actividades<button class=" ml-3 text-right" disabled
                    title="Aqui se encuentran actividades que tienen una alta prioridad, el resto de actividades se ecuentra en la pestaña de actividades"
                    style="border-radius:10px; border:1px solid rgb(93, 92, 92)"><i class="fas fa-info"></i></button></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th> N°</th>
                            <th> Imagen</th>
                            <th> Nombre actividad </th>
                            <th> Duración </th>
                            <th> Prioridad </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="py-1">
                                <img src="images/faces/face1.jpg" alt=" Imagen actividad" class="img-sm rounded-circle">
                            </td>
                            <td>
                                Correr
                            </td>
                            <td>30 min</td>
                            <td>
                                <label class="badge badge-danger badge-pill">Alta</label>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>2</td>
                            <td class="py-1">
                                <img src="images/faces/face1.jpg" alt="Imagen actividad" class="img-sm rounded-circle">
                            </td>
                            <td>
                                nadar
                            </td>
                            <td>40 min</td>
                            <td>
                                <label class="badge badge-danger badge-pill">Alta</label>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td class="py-1">
                                <img src="images/faces/face1.jpg" alt=" Imagen actividad" class="img-sm rounded-circle">
                            </td>
                            <td>
                                Correr
                            </td>
                            <td>30 min</td>
                            <td>
                                <label class="badge badge-danger badge-pill">Alta</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card  mt-3" style="border-radius:10px ">
        <div class="card-body">
            <div class="d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <a class="btn btn-social-icon btn-facebook btn-rounded " href="https://www.facebook.com/Colpomed/">
                        <div class=" d-flex align-items-center  justify-content-center h-100">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                    </a>
                    <div class="ml-4">
                        <h5 class="mb-0">Facebook</h5>
                        <p class="mb-0">2887 friends</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <a class="btn btn-social-icon btn-whatsapp btn-rounded" style="background-color:#25d366;color:white ">
                        <!-- Este faltaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
                        <div class=" d-flex align-items-center  justify-content-center h-100">
                            <i class="fab fa-whatsapp"></i>
                        </div>


                    </a>
                    <div class="ml-4">
                        <h5 class="mb-0">Whatsapp</h5>
                        <p class="mb-0">Para consultas</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <a class="btn btn-social-icon btn-youtube btn-rounded"
                        href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg" style="color:white ">
                        <div class=" d-flex align-items-center  justify-content-center h-100">
                            <i class="fab fa-youtube"></i>
                        </div>
                    </a>
                    <div class="ml-4">
                        <h5 class="mb-0">Youtube</h5>
                        <p class="mb-0">Subscribete</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <a class="btn btn-social-icon btn-instagram btn-rounded" href="https://www.instagram.com/Colpomed/"
                        style="background-color:#ac2bac;color:white ">
                        <div class=" d-flex align-items-center  justify-content-center h-100">
                            <i class="fab fa-instagram"></i>
                        </div>
                    </a>
                    <div class="ml-4">
                        <h5 class="mb-0">Instagram</h5>
                        <p class="mb-0">930 followers</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <a class="btn btn-social-icon btn-linkedin btn-rounded"
                        href="https://www.linkedin.com/in/ximena-coronel-a82538140/" style="color:white ">
                        <div class=" d-flex align-items-center  justify-content-center h-100">
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                    </a>
                    <div class="ml-4">
                        <h5 class="mb-0">Linkedin</h5>
                        <p class="mb-0">54 followers</p>
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
    <script src="{{ asset('administracion/js/historialPersonal.js') }}"></script>

    <script>
         function cargarAlimentos(dia_id) {
            let dietaid = document.getElementById('dieta_id').value;
            let pacienteid = document.getElementById('paciente_id').value;
            $.ajax({
                url: "{{ route('dieta.traerAlimentos') }}",
                dataType: "json",
                data: {
                    dieta_id: dietaid,
                    paciente_id: pacienteid,
                    diaSeleccionado: dia_id+1
                }
            }).done(function(res) {

                console.log(res);
                // let arreglo = JSON.parse(res)
                // console.log(arreglo)
                var contenedor1 = document.getElementById('alimentosDesayuno' + dia_id);
                var contenedor2 = document.getElementById('alimentosColacion1' + dia_id);
                var contenedor3 = document.getElementById('alimentosAlmuerzo' + dia_id);
                var contenedor4 = document.getElementById('alimentosColacion2' + dia_id);
                var contenedor5 = document.getElementById('alimentosMerienda' + dia_id);
                var contenedor6 = document.getElementById('alimentosCena' + dia_id);

                contenedor1.innerHTML = '';
                contenedor2.innerHTML = '';
                contenedor3.innerHTML = '';
                contenedor4.innerHTML = '';
                contenedor5.innerHTML = '';
                contenedor6.innerHTML = '';

                for (let i = 0; i < res.length; i++) {
                    let comida = res[i]

                    cant = Object.keys(comida);
                    long = cant.length
                    for (let j = 0; j < long - 2; j++) {

                        if (i == 0) {
                            let contenido =
                                `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor1).append(contenido)
                        }
                        if (i == 1) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor2).append(contenido)
                        }
                        if (i == 2) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor3).append(contenido)
                        }
                        if (i == 3) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor4).append(contenido)
                        }
                        if (i == 4) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor5).append(contenido)
                        }
                        if (i == 5) {
                            let contenido =
                            `<div class="container text-center no-gutters p-0 m-0 "><div class="d-flex row justify-content-space-evenly align-items-center no-gutters"><label class="col-4 text-left">${res[i][j].nombre}</label><label class="col-2 ">${res[i][j].peso}</label> <div class="col-3" ><img  style="max-width:30px;max-heigth:30px;"  src='${res[i][j].imagen.url}'></div><label class="col-3">${res[i].cantidad}</label></div></div>`
                            $(contenedor6).append(contenido)
                        }
                    }

                }

            })

        }
    
    </script>

@endsection
