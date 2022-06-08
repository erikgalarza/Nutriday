@extends('client.dashboard')
@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('administracion/css/asignarAlimentosDieta.css') }}">


    <div class="page-header" style="display:flex; text-align:center; justify-content:center; align-items:center;">
        <div>
            <h3 class="page-title">
                Dietas {{ $dieta->id }}
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
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="display:flex; justify-content:evenly;">
                        <h4 class="card-title">Diabetes: Tipo
                            @if ($dieta->tipo_diabetes == 3)
                                (Gestacional)
                            @else
                                {{ number_format($dieta->tipo_diabetes, 0) }}
                            @endif

                        </h4>
                        @if (isset($imc))
                            <h4 class="card-title mx-5">Estado del IMC: {{ $imc }}
                                @if ($imc <= 18.4)
                                    (Bajo peso)
                                @endif
                                @if ($imc >= 18.5 && $imc <= 24.9)
                                    (Normal)
                                @endif
                                @if ($imc >= 25 && $imc <= 29.9)
                                    (Sobrepeso)
                                @endif
                                @if ($imc >= 30)
                                    (Obeso)
                                @endif

                            </h4>
                        @endif
                    </div>
                   
                    <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                        @php
                            $dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                        @endphp

                        @for ($i = 0; $i <= 6; $i++)
                            <li class="nav-item my-2 text-center text-center" style="min-width:123.5px;">
                                <a class="nav-link {{ $i == 0 ? 'active' : '' }}" id="pills-dia{{ $i }}-tab"
                                    data-toggle="pill" href="#pills-dia{{ $i }}" role="tab"
                                    aria-controls="pills-dia{{ $i }}"
                                    aria-selected="true">{{ $dias[$i] }}</a>
                            </li>
                        @endfor

                    </ul>

                    @php
                        $comidas = ['DESAYUNO', 'COLACIÓN DE LA MAÑANA', 'ALMUERZO', 'COLACIÓN DE LA TARDE', 'MERIENDA', 'CENA'];
                    @endphp
                    <div class="card">
                        <div class="tab-content" id="pills-tabContent">
                            @php
                                $a = -6;
                                $sum = 0;
                                $id = -2;
                                $id2 = -1;
                            @endphp
                            @for ($j = 0; $j <= 6; $j++) 

                           
                                <div class="tab-pane fade {{$j==0?'show active':''}}"
                                    id="pills-dia{{ $j }}" role="tabpanel"
                                    aria-labelledby="pills-dia{{ $j }}-tab">
                                    <div class="accordion accordion-solid-header" id="accordion-{{ $j }}"
                                        role="tablist">
                                        {{-- <p>{{$dia}}</p> --}}
                                        @php
                                            $a = $a + 6;
                                            $sum = $sum + 6;
                                            $f = $sum;
                                            $cont = -1;
                                            $i = -1;
                                        @endphp
                                        @for ($k = $a; $k < $f; $k++)
                                            @php
                                            $i = $i+1;
                                                $cont = $cont + 1;
                                                $id = $id + 2;
                                                $id2 = $id + 1;
                                            @endphp
                                            <div class="card">
                                                <div class="card-header" role="tab" id="heading-{{ $k }}">
                                                    <h6 class="mb-0">
                                                        <a data-toggle="collapse"
                                                            class="{{ $k == 0 ? '' : 'collapsed' }}"
                                                            href="#collapse-{{ $k }}"
                                                            aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                                            aria-controls="collapse-{{ $k }}">
                                                            {{ $comidas[$cont] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="collapse-{{ $k }}"
                                                    class="{{ $k == 0 ? 'collapse show' : '' }}" role="tabpanel"
                                                    aria-labelledby="heading-{{ $k }}"
                                                    data-parent="#accordion-{{ $j }}">
                                                    <div class="card-body">

                                                        <input type="hidden" id="dieta_id" value="{{ $dieta->id }}">
                                                      
                                                        <div
                                                            style="display:flex; justify-content:space-around; flex-wrap:wrap;">
                                                            <div>
                                                                <div class="table-responsive">
                                                                    <form method="POST" id="tablaAlimentos">
                                                                        @csrf
                                                                        <input type="hidden" id="alimento_id_eliminar"
                                                                            name="alimento_id_eliminar">
                                                                        <input type="hidden" id="dieta_id" name="dieta_id"
                                                                            value="{{ $dieta->id }}">
                                                                        <table id="table" class="table table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th colspan="6" scope="col"
                                                                                        style="text-align:center;">ALIMENTOS
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class="titulos_tabla_totales">
                                                                                        Cantidad
                                                                                    </th>
                                                                                    <th class="titulos_tabla_totales">
                                                                                        Imagen
                                                                                    </th>
                                                                                    <th
                                                                                        class="nombre_alimento titulos_tabla_totales">
                                                                                        Nombre
                                                                                    </th>
                                                                                    <th class="titulos_tabla_totales">
                                                                                        Peso</th>
                                                                                </tr>
                                                                            </thead>
                                                                            {{-- <h5>tbody={{ $id }}</h5> --}}
                                                                            <tbody id="tbody{{ $id }}">
                                                                                <tr>
                                                                                    @if($k<6)
                                                                                    <td>{{$alimentosLunes[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosLunes[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosLunes[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosLunes[$i]['alimento']['peso']}}</td>
                                                                                    @endif

                                                                                     @if($k>=6 && $k<12)
                                                                                    <td>{{$alimentosMartes[5]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosMartes[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosMartes[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosMartes[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                    
                                                                                    @if($k>=12 && $k<18)
                                                                                    <td>{{$alimentosMiercoles[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosMiercoles[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosMiercoles[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosMiercoles[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                    @if($k>=18 && $k<25)
                                                                                    <td>{{$alimentosJueves[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosJueves[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosJueves[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosJueves[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                    @if($k>=25 && $k<32)
                                                                                    <td>{{$alimentosJueves[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosJueves[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosJueves[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosJueves[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                    @if($k>=32 && $k<39)
                                                                                    <td>{{$alimentosViernes[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosViernes[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosViernes[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosViernes[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                    @if($k>=39 && $k<47)
                                                                                    <td>{{$alimentosSabado[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosSabado[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosSabado[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosSabado[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                    @if($k>=47 && $k<55)
                                                                                    <td>{{$alimentosDomingo[$i]['cantidad']}}</td>
                                                                                    <td><img src="{{$alimentosDomingo[$i]['imagen']}}"></td>
                                                                                    <td>{{$alimentosDomingo[$i]['alimento']['nombre']}}</td>
                                                                                    <td>{{$alimentosDomingo[$i]['alimento']['peso']}}</td>
                                                                                    @endif
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor


                                         
                  {{-- <style>
                                                    .resultado {
                                                        margin: 50px 0px 0px -100px;
                                                        background-color: #ebf4fa;
                                                        border-radius: 10px;
                                                        border: 1px solid #000;
                                                        bottom: 0;
                                                       
                                                        width: 100%;
                                                        position: fixed;
                                                        z-index: 1;
                                                    }
                  </style>  --}}
                  
              


                                    </div>
                                </div>
                            @endfor
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection