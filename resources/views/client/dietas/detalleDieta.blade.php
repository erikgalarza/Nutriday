@extends('client.dashboard')
@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('administracion/css/asignarAlimentosDieta.css') }}">
    <script src="https://kit.fontawesome.com/50e215d7ac.js" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    <div class="page-header mb-2" style="display:flex; text-align:center; justify-content:center; align-items:center;">
        <div>
            <h3 class="page-title">
            {{ $dieta->nombre }}
            </h3>
        </div>
        @if(isset($paciente))
        <input type="hidden" id="paciente_id" value="{{$paciente['id']}}">
        @endif


        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alimento</li>
            </ol>
        </nav>
    </div>

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">

                <style>
                    li.navi:last-child {
                        margin-right: 0;
                    }
                </style>
                <ul class="nav nav-pills nav-pills-success text-center row justify-content-center align-items-center mt-2"
                    id="pills-tab" role="tablist" style="border:none;font-weight: bold">
                    @php
                        $dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

                    @endphp

                    @for ($i = 0; $i <= 6; $i++)
                        <li class="nav-item my-2 text-center navi" style="min-width:123.5px;font-weight:bold">
                            <a class="nav-link {{ $i == 0 ? 'active' : '' }}" style=";border:1px solid #04B76B" id="pills-dia{{ $i }}-tab"
                                data-toggle="pill" href="#pills-dia{{ $i }}" role="tab"
                                aria-controls="pills-dia{{ $i }}" aria-selected="true">{{ $dias[$i] }}</a>
                        </li>
                    @endfor


                </ul>

                @php
                    $comidas = [' DESAYUNO', 'COLACIÓN DE LA MAÑANA', 'ALMUERZO', 'COLACIÓN DE LA TARDE', 'MERIENDA', 'CENA'];
                    $nameImgComida = ['caffee.png','colacion1.png','almuerzo.png','colacion2.png','merienda.png','cena.png'];

                @endphp
                <div class="card mt-2" style="border:none">
                    <div class="tab-content py-0 px-3" id="pills-tabContent" style="border:none;" >
                        @php
                            $a = -6;
                            $sum = 0;
                            $id = -2;
                            $id2 = -1;
                        @endphp
                        @for ($j = 0; $j <= 6; $j++)
                            <div class="tab-pane fade {{ $j == 0 ? 'show active' : '' }} "
                                id="pills-dia{{ $j }}" role="tabpanel"
                                aria-labelledby="pills-dia{{ $j }}-tab">
                                <div class="accordion accordion-solid-header" id="accordion-{{ $j }}"
                                    role="tablist">
                                    @php
                                        $a = $a + 6;
                                        $sum = $sum + 6;
                                        $f = $sum;
                                        $cont = -1;
                                    @endphp
                                    @for ($k = $a; $k < $f; $k++)
                                        @php
                                            $cont = $cont + 1;
                                            $id = $id + 2;
                                            $id2 = $id + 1;

                                        @endphp
                                {{-- CREACION DE ACORDIONES EMPIEZA AQUI --}}

                                        <div class="card "style="background-color:white;color:black">
                                            <div class="card-header" role="tab" id="heading-{{ $k }}" style="border:1px solid #55558a;border-radius:10px">
                                                <h6 class="mb-0">
                                                    <a  data-toggle="collapse" onclick="dibujar({{$id}})" class="collapsed" style="font-weight: bold"
                                                        href="#collapse-{{ $k }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse-{{ $k }}">
                                                        <img class="imagg mb-2 mr-3" src="{{asset('administracion/images/comidas/'.$nameImgComida[$cont].'')}}"> <span   style="font-weight: bold" >{{ $comidas[$cont] }}</span>
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapse-{{ $k }}"
                                                class="collapse" role="tabpanel"
                                                aria-labelledby="heading-{{ $k }}"
                                                data-parent="#accordion-{{ $j }}">
                                                <div class="card-body pt-2" >


                                                    <div
                                                        style="display:flex; justify-content:space-around; flex-wrap:wrap; margin-top:10px;">
                                                        <div>
                                                            <div class="table-responsive">
                                                               <input type="hidden" value="{{$alimentosLunes}}" id="lunes">
                                                               <input type="hidden" value="{{$alimentosMartes}}" id="martes">
                                                               <input type="hidden" value="{{$alimentosMiercoles}}" id="miercoles">
                                                               <input type="hidden" value="{{$alimentosJueves}}" id="jueves">
                                                               <input type="hidden" value="{{$alimentosViernes}}" id="viernes">
                                                               <input type="hidden" value="{{$alimentosSabado}}" id="sabado">
                                                               <input type="hidden" value="{{$alimentosDomingo}}" id="domingo">

                                                                    <table id="table" class="table table-striped text-center">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="12" scope="col"
                                                                                    style="text-align:center;">
                                                                                    ALIMENTOS <button class="ml-3" disabled  title="La información nutricional del alimento se encuentran en función del valor unitario, los datos se muestran por 1 porción del alimento" style="border-radius:10px; border:1px solid grey"><i class="fas fa-info pr-1"></i></button>
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Porciones
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Imagen
                                                                                </th>
                                                                                <th
                                                                                    class="nombre_alimento titulos_tabla_totales">
                                                                                    Nombre
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Peso
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Categoría
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Proteínas
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Grasas
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Carbohidratos
                                                                                </th>
                                                                                <th class="titulos_tabla_totales">
                                                                                    Valor Calórico
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <!-- 0 2 4 6 8 10 -->

                                                                        <tbody id="tabla{{$id}}">

                                                                        </tbody>
                                                                    </table>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor


{{--
                                    <style>
                                        .resultado {
                                            margin: 50px 0px 0px -100px;
                                            background-color: #dce7e7;
                                            color: whit;
                                            border-radius: 10px;
                                            border: 1px solid #dce7e7;
                                            bottom: 0;

                                            width: 100%;
                                            position: fixed;
                                            z-index: 1;
                                        }
                                    </style> --}}

                                    {{-- <div class="resultado"
                                        style="display:flex;  flex-wrap:wrap; justify-content:space-evenly; align-items:center">
                                        <div class="info_total" style="padding-top:10px; width:70%; text-align:center;">

                                            <div class="cuadro_informacion"
                                                style="display:flex; flex-wrap:wrap; justify-content:space-evenly; align-items:center; flex-direction:row; margin-top:5px;; padding:10px 10px; text-align:center; min-height: 30px; min-width: 100px;">
                                                <div>
                                                <p style="border-bottom:1px solid;font-size:14px;font-weight:bold;text-transform:uppercase">TOTAL {{ $dias[$j] }}</p>
                                                </div>
                                                <div>
                                                    <p style="margin-right:10px;font-size:14px;font-weight:bold;text-transform:uppercase">Carbohidratos:<i
                                                            style="font-weight:400;font-size:14px;font-style:normal;" class="ml-4"
                                                            id="carbohidratosTotal{{ $j }}">0</i></p>
                                                </div>
                                                <div>
                                                    <p><strong style="margin-right:10px;font-size:14px;text-transform:uppercase">Grasas:</strong><i
                                                            style="font-weight:400;font-size:14px;font-style:normal;" class="ml-4"
                                                            id="grasasTotal{{ $j }}">0</i></p>
                                                </div>
                                                <div>
                                                    <p><strong
                                                            style="margin-right:10px;font-size:14px;text-transform:uppercase">Proteinas:</strong><i
                                                            style="font-weight:400;font-size:14px;font-style:normal;" class="ml-4"
                                                            id="proteinasTotal{{ $j }}">0</i></p>
                                                </div>
                                                <div>
                                                    <p><strong style="margin-right:10px;font-size:14px;text-transform:uppercase">Kcal:</strong><i
                                                            style="font-weight:400;font-size:14px;font-style:normal;" class="ml-4 mr-1"
                                                            id="kcalTotal{{ $j }}">0</i>  /1500</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="botones" style="display:flex; justify-content:space-evenly;">
                                            <a onclick="confirmarDia({{ $j }});"
                                                class="btn btn-outline-success mx-2" title="Guardar selección"><i
                                                    class="fas fa-check"></i></a>
                                            <a onclick="quitarConfirmacion({{ $j }});"
                                                class="btn btn-outline-warning" title="Cambiar selección"><i
                                                    class="fas fa-edit"></i></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endfor
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

            function iterar(dia,id)
            {

                console.log(dia)
                console.log('valor de id:'+id);
                var tbody = document.getElementById('tabla'+id);
                console.log(tbody);
                // alert(id);
                tbody.innerHTML='';
                for(let i =0 ; i<dia.length ; i++)
                {

                        // ========== DESAYUNOS DE CADA DIA =============== //
                        for(let j = 0 ; j<72; j+=12)
                        {
                    if(dia[i].horario==='desayuno' && id == j)
                    {
                        if(dia[i].categoria_id === 1 ){
                            dia[i].categoria_id = 'Platos preparados'

                        } else if(dia[i].categoria_id === 2){
                            dia[i].categoria_id = 'Granos'
                        } else if(dia[i].categoria_id === 3 ){
                            dia[i].categoria_id = 'Verduras'

                        } else if(dia[i].categoria_id === 4 ){
                            dia[i].categoria_id = 'Frutas'

                        } else if(dia[i].categoria_id === 5 ){
                            dia[i].categoria_id = 'Productos lácteos'

                        } else if(dia[i].categoria_id === 6 ){
                            dia[i].categoria_id = 'Proteínas'

                        } else if(dia[i].categoria_id === 7 ){
                            dia[i].categoria_id = 'Otros'
                        }

                        if(dia[i].medida_id === 1 ){
                            dia[i].medida_id = 'gr'

                        } else if(dia[i].medida_id === 2 ){
                            dia[i].medida_id = 'lb'

                        } else if(dia[i].medida_id === 3 ){
                            dia[i].medida_id = 'kg'

                        } else if(dia[i].medida_id === 4){
                            dia[i].medida_id = 'ml'

                        } else if(dia[i].medida_id === 5){
                            dia[i].medida_id = 'lt'
                        }

                        let todo = `<tr>
                            <td class="text-center">${dia[i].cantidad}</td>
                            <td><img src="${dia[i].imagen.url}"></td>
                            <td>${dia[i].nombre} </td>
                            <td>${dia[i].peso} (${dia[i].medida_id}) </td>
                            <td>${dia[i].categoria_id} </td>
                            <td>${dia[i].proteina} (${dia[i].medida_id})</td>
                            <td>${dia[i].grasa} (${dia[i].medida_id})</td>
                            <td>${dia[i].carbohidrato} (${dia[i].medida_id})</td>
                            <td>${dia[i].valor_calorico} (kcal)</td>
                            </tr>`
                            $(tbody).append(todo);
                    }
                }

                    //================ FIN DESAYUNOS ====================0 //

                    // ================ COLACIONES 1 =================== //

                    for(let j = 2 ; j<=74 ; j+=12)
                    {
                    if(dia[i].horario==='colacion1' && id == j)
                    {

                        if(dia[i].categoria_id === 1 ){
                            dia[i].categoria_id = 'Platos preparados'

                        } else if(dia[i].categoria_id === 2){
                            dia[i].categoria_id = 'Granos'
                        } else if(dia[i].categoria_id === 3 ){
                            dia[i].categoria_id = 'Verduras'

                        } else if(dia[i].categoria_id === 4 ){
                            dia[i].categoria_id = 'Frutas'

                        } else if(dia[i].categoria_id === 5 ){
                            dia[i].categoria_id = 'Productos lácteos'

                        } else if(dia[i].categoria_id === 6 ){
                            dia[i].categoria_id = 'Proteínas'

                        } else if(dia[i].categoria_id === 7 ){
                            dia[i].categoria_id = 'Otros'
                        }

                        if(dia[i].medida_id === 1 ){
                            dia[i].medida_id = 'gr'

                        } else if(dia[i].medida_id === 2 ){
                            dia[i].medida_id = 'lb'

                        } else if(dia[i].medida_id === 3 ){
                            dia[i].medida_id = 'kg'

                        } else if(dia[i].medida_id === 4){
                            dia[i].medida_id = 'ml'

                        } else if(dia[i].medida_id === 5){
                            dia[i].medida_id = 'lt'
                        }

                        let todo = `<tr>
                            <td class="text-center">${dia[i].cantidad}</td>
                            <td><img src="${dia[i].imagen.url}"></td>
                            <td>${dia[i].nombre} </td>
                            <td>${dia[i].peso} (${dia[i].medida_id}) </td>
                            <td>${dia[i].categoria_id} </td>
                            <td>${dia[i].proteina} (${dia[i].medida_id})</td>
                            <td>${dia[i].grasa} (${dia[i].medida_id})</td>
                            <td>${dia[i].carbohidrato} (${dia[i].medida_id})</td>
                            <td>${dia[i].valor_calorico} (kcal)</td>
                            </tr>`
                            $(tbody).append(todo);
                    }
                }
                // ================== FIN COLACIONES 1 ===========//

                 // ================ ALMUERZOS =================== //

                 for(let j = 4 ; j<=76 ; j+=12)
                    {
                    if(dia[i].horario==='almuerzo' && id == j)
                    {

                        if(dia[i].categoria_id === 1 ){
                            dia[i].categoria_id = 'Platos preparados'

                        } else if(dia[i].categoria_id === 2){
                            dia[i].categoria_id = 'Granos'
                        } else if(dia[i].categoria_id === 3 ){
                            dia[i].categoria_id = 'Verduras'

                        } else if(dia[i].categoria_id === 4 ){
                            dia[i].categoria_id = 'Frutas'

                        } else if(dia[i].categoria_id === 5 ){
                            dia[i].categoria_id = 'Productos lácteos'

                        } else if(dia[i].categoria_id === 6 ){
                            dia[i].categoria_id = 'Proteínas'

                        } else if(dia[i].categoria_id === 7 ){
                            dia[i].categoria_id = 'Otros'
                        }

                        if(dia[i].medida_id === 1 ){
                            dia[i].medida_id = 'gr'

                        } else if(dia[i].medida_id === 2 ){
                            dia[i].medida_id = 'lb'

                        } else if(dia[i].medida_id === 3 ){
                            dia[i].medida_id = 'kg'

                        } else if(dia[i].medida_id === 4){
                            dia[i].medida_id = 'ml'

                        } else if(dia[i].medida_id === 5){
                            dia[i].medida_id = 'lt'
                        }

                        let todo = `<tr>
                            <td class="text-center">${dia[i].cantidad}</td>
                            <td><img src="${dia[i].imagen.url}"></td>
                            <td>${dia[i].nombre} </td>
                            <td>${dia[i].peso} (${dia[i].medida_id}) </td>
                            <td>${dia[i].categoria_id} </td>
                            <td>${dia[i].proteina} (${dia[i].medida_id})</td>
                            <td>${dia[i].grasa} (${dia[i].medida_id})</td>
                            <td>${dia[i].carbohidrato} (${dia[i].medida_id})</td>
                            <td>${dia[i].valor_calorico} (kcal)</td>
                            </tr>`
                            $(tbody).append(todo);
                    }
                }
                // ================== FIN ALMUERZOS ===========//

                 // ================ COLACIONES 2 =================== //

                 for(let j = 6 ; j<=78 ; j+=12)
                    {
                    if(dia[i].horario==='colacion2' && id == j)
                    {

                        if(dia[i].categoria_id === 1 ){
                            dia[i].categoria_id = 'Platos preparados'

                        } else if(dia[i].categoria_id === 2){
                            dia[i].categoria_id = 'Granos'
                        } else if(dia[i].categoria_id === 3 ){
                            dia[i].categoria_id = 'Verduras'

                        } else if(dia[i].categoria_id === 4 ){
                            dia[i].categoria_id = 'Frutas'

                        } else if(dia[i].categoria_id === 5 ){
                            dia[i].categoria_id = 'Productos lácteos'

                        } else if(dia[i].categoria_id === 6 ){
                            dia[i].categoria_id = 'Proteínas'

                        } else if(dia[i].categoria_id === 7 ){
                            dia[i].categoria_id = 'Otros'
                        }

                        if(dia[i].medida_id === 1 ){
                            dia[i].medida_id = 'gr'

                        } else if(dia[i].medida_id === 2 ){
                            dia[i].medida_id = 'lb'

                        } else if(dia[i].medida_id === 3 ){
                            dia[i].medida_id = 'kg'

                        } else if(dia[i].medida_id === 4){
                            dia[i].medida_id = 'ml'

                        } else if(dia[i].medida_id === 5){
                            dia[i].medida_id = 'lt'
                        }

                        let todo = `<tr>
                            <td class="text-center">${dia[i].cantidad}</td>
                            <td><img src="${dia[i].imagen.url}"></td>
                            <td>${dia[i].nombre} </td>
                            <td>${dia[i].peso} (${dia[i].medida_id}) </td>
                            <td>${dia[i].categoria_id} </td>
                            <td>${dia[i].proteina} (${dia[i].medida_id})</td>
                            <td>${dia[i].grasa} (${dia[i].medida_id})</td>
                            <td>${dia[i].carbohidrato} (${dia[i].medida_id})</td>
                            <td>${dia[i].valor_calorico} (kcal)</td>
                            </tr>`
                            $(tbody).append(todo);
                    }
                }
                // ================== FIN COLACIONES 2 ===========//

                 // ================ MERIENDAS =================== //

                 for(let j = 8 ; j<=80 ; j+=12)
                    {
                    if(dia[i].horario==='merienda' && id == j)
                    {

                        if(dia[i].categoria_id === 1 ){
                            dia[i].categoria_id = 'Platos preparados'

                        } else if(dia[i].categoria_id === 2){
                            dia[i].categoria_id = 'Granos'
                        } else if(dia[i].categoria_id === 3 ){
                            dia[i].categoria_id = 'Verduras'

                        } else if(dia[i].categoria_id === 4 ){
                            dia[i].categoria_id = 'Frutas'

                        } else if(dia[i].categoria_id === 5 ){
                            dia[i].categoria_id = 'Productos lácteos'

                        } else if(dia[i].categoria_id === 6 ){
                            dia[i].categoria_id = 'Proteínas'

                        } else if(dia[i].categoria_id === 7 ){
                            dia[i].categoria_id = 'Otros'
                        }

                        if(dia[i].medida_id === 1 ){
                            dia[i].medida_id = 'gr'

                        } else if(dia[i].medida_id === 2 ){
                            dia[i].medida_id = 'lb'

                        } else if(dia[i].medida_id === 3 ){
                            dia[i].medida_id = 'kg'

                        } else if(dia[i].medida_id === 4){
                            dia[i].medida_id = 'ml'

                        } else if(dia[i].medida_id === 5){
                            dia[i].medida_id = 'lt'
                        }

                        let todo = `<tr>
                            <td class="text-center">${dia[i].cantidad}</td>
                            <td><img src="${dia[i].imagen.url}"></td>
                            <td>${dia[i].nombre} </td>
                            <td>${dia[i].peso} (${dia[i].medida_id}) </td>
                            <td>${dia[i].categoria_id} </td>
                            <td>${dia[i].proteina} (${dia[i].medida_id})</td>
                            <td>${dia[i].grasa} (${dia[i].medida_id})</td>
                            <td>${dia[i].carbohidrato} (${dia[i].medida_id})</td>
                            <td>${dia[i].valor_calorico} (kcal)</td>
                            </tr>`
                            $(tbody).append(todo);
                    }
                }
                // ================== FIN MERIENDAS ===========//
                 // ================ CENAS =================== //

                 for(let j = 10 ; j<=82 ; j+=12)
                    {
                    if(dia[i].horario==='cena' && id == j)
                    {
                        if(dia[i].categoria_id === 1 ){
                            dia[i].categoria_id = 'Platos preparados'

                        } else if(dia[i].categoria_id === 2){
                            dia[i].categoria_id = 'Granos'
                        } else if(dia[i].categoria_id === 3 ){
                            dia[i].categoria_id = 'Verduras'

                        } else if(dia[i].categoria_id === 4 ){
                            dia[i].categoria_id = 'Frutas'

                        } else if(dia[i].categoria_id === 5 ){
                            dia[i].categoria_id = 'Productos lácteos'

                        } else if(dia[i].categoria_id === 6 ){
                            dia[i].categoria_id = 'Proteínas'

                        } else if(dia[i].categoria_id === 7 ){
                            dia[i].categoria_id = 'Otros'
                        }

                        if(dia[i].medida_id === 1 ){
                            dia[i].medida_id = 'gr'

                        } else if(dia[i].medida_id === 2 ){
                            dia[i].medida_id = 'lb'

                        } else if(dia[i].medida_id === 3 ){
                            dia[i].medida_id = 'kg'

                        } else if(dia[i].medida_id === 4){
                            dia[i].medida_id = 'ml'

                        } else if(dia[i].medida_id === 5){
                            dia[i].medida_id = 'lt'
                        }

                        let todo = `<tr>
                            <td class="text-center">${dia[i].cantidad}</td>
                            <td><img src="${dia[i].imagen.url}"></td>
                            <td>${dia[i].nombre} </td>
                            <td>${dia[i].peso} (${dia[i].medida_id}) </td>
                            <td>${dia[i].categoria_id} </td>
                            <td>${dia[i].proteina} (${dia[i].medida_id})</td>
                            <td>${dia[i].grasa} (${dia[i].medida_id})</td>
                            <td>${dia[i].carbohidrato} (${dia[i].medida_id})</td>
                            <td>${dia[i].valor_calorico} (kcal)</td>
                            </tr>`
                            $(tbody).append(todo);
                    }
                }
                // ================== FIN CENAS ===========//

                }

            }

        function dibujar(id)
        {
            var lunes = document.getElementById('lunes').value;lunes = JSON.parse(lunes);
            var martes = document.getElementById('martes').value;martes = JSON.parse(martes);
            var miercoles = document.getElementById('miercoles').value;miercoles = JSON.parse(miercoles);
            var jueves = document.getElementById('jueves').value;jueves = JSON.parse(jueves);
            var viernes = document.getElementById('viernes').value;viernes = JSON.parse(viernes);
            var sabado = document.getElementById('sabado').value;sabado = JSON.parse(sabado);
            var domingo = document.getElementById('domingo').value;domingo = JSON.parse(domingo);

            if(id>=0 && id<11){iterar(lunes,id);}
            if(id>=12 && id<23){iterar(martes,id);}
            if(id>=24 && id<35){iterar(miercoles,id);}
            if(id>=36 && id<47){iterar(jueves,id);}
            if(id>=48 && id<59){iterar(viernes,id);}
            if(id>=60 && id<71){iterar(sabado,id);}
            if(id>=72 && id<83){iterar(domingo,id);}

        }
    </script>
        @endsection
