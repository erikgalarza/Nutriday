@extends('admin.dashboard')
@section('contenido')
<style>
    .ocultar
    {
        display:none;
    }
</style>
    <div class="page-header mb-2">
        <h3 class="page-title">
            Ver alimentos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alimentos</li>
            </ol>
        </nav>
    </div>
    <div class="card text-center ">
        <div class=" mb-3" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Alimentos</h3>
        </div>

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card-body">
                <div class="container w-75">
                    <div class="table-responsive text-center">
                        <table id="order-listing" class="table mb-3">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Peso</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alimentos as $key => $alimento)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $alimento->nombre }}</td>
                                        <td>
                                            @if ($alimento->imagen)
                                                <img src="{{ $alimento->imagen->url }}">
                                            @else
                                                <img src="{{ asset('img/logos/canasta.png') }}">
                                            @endif
                                        </td>
                                        <td>{{$alimento->peso}} {{$alimento->medida->abreviatura}}</td>
                                        <td>{{$alimento->categoria->nombre}}</td>
                                        <!-- <td>{{-- $alimento->categoria->nombre--}}</td> -->

                                        <td>
                                            <a data-toggle="modal" data-target="#exampleModal-3{{ $alimento->id }}"
                                                class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-outline-warning mb-1" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $alimento->id }}"><i
                                                    class="fas fa-edit "></i></a>

                                            <a onclick="eliminarAlimento({{$alimento}});" class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i>  </a>

                                                    </td>
                                    </tr>
                                    <form id="deletealimento{{$alimento->id}}" method="POST" action="{{route('alimento.destroy',$alimento->id)}}">
                                        @csrf
                                        @method('delete')

                                    </form>

                                    <style>
                                        @media (min-width:768px) {
                                            .dialogoss {
                                                min-width: 700px !important;
                                            }

                                        }
                                    </style>
                                    {{-- MODAL DE DATOS ALIMENTO --}}

                                    <div class="modal fade"id="exampleModal-3{{ $alimento->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog dialogoss"role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="ModalLabel">Datos alimento</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body py-3 px-0"  >

                                                    <div class="col-12 row m-0 mb-sm-4 mb-3 justify-content-center">
                                                        <div class=" row col-12 col-md-11 p-md-0 text-left justify-content-center">

                                                    <div class="col-11 col-md-5 text-center">

                                                        <div class="form-group mb-4" style="text-transform: uppercase">
                                                            <label ><strong>{{ $alimento->nombre }}</strong></label>
                                                        </div>
                                                        @if (isset($alimento->imagen->url))
                                                        <img class="img-thumbnail p-0"
                                                        style="height: 80%"
                                                            src="{{ $alimento->imagen->url }}">
                                                    @else
                                                        <img class="img-thumbnail p-0 "

                                                            src="{{ asset('img/icons/dieta48.png') }}">
                                                    @endif
                                                    </div>

                                                    <div class="col-12 col-md-7 text-center">
                                                        <div class="container ">
                                                            <div class="row justify-content-center">
                                                        <div class="form-group col-md-12 col-10  " style="text-transform: uppercase;border-bottom:1px solid">
                                                            <label ><strong>Información nutricional</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="container ">
                                                        <div class="row justify-content-center">
                                                            <div class="col-8 col-md-10">
                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5 text-left "><strong>Categoría:</strong></label>
                                                                    <label class="col-7 text-left"> {{  $alimento->categoria->nombre }}</label>
                                                                </div>
                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5 text-left "><strong>Peso:</strong></label>
                                                                    <label class="col-7 text-left"> {{ $alimento->peso }}</label>
                                                                </div>

                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5  text-left "><strong>Valor calórico:</strong></label>
                                                                    <label class="col-7 text-left"> {{ $alimento->valor_calorico }}</label>
                                                                </div>

                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5 text-left"><strong>Carbohidratos:</strong></label>
                                                                    <label class="col-7 text-left">{{ $alimento->carbohidrato }}</label>

                                                                </div>
                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5 text-left"><strong>Proteinas:</strong></label>
                                                                    <label class="col-7 text-left">{{ $alimento->proteina }}</label>
                                                                </div>

                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5 text-left"><strong>Grasas:</strong></label>
                                                                    <label class="col-7 text-left">{{ $alimento->grasa }}</label>
                                                                </div>
                                                                <div class="form-group row mb-2 no-gutters ">
                                                                    <label class="col-5 text-left"><strong>Creado:</strong></label>
                                                                    <label class="col-7 text-left">{{ $alimento->created_at }}</label>
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
                                    </div>



                                    <style>
                                        @media (min-width:768px) {
                                            .dialogoss1 {
                                                min-width: 600px !important;
                                            }

                                        }
                                    </style>
                                      {{-- MODAL DE EDITAR ALIMENTO --}}

                                      <div class="modal fade" id="exampleModal-2{{ $alimento->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog dialogoss1"  role="document">
                                            <form method="POST" action="{{route('alimento.update',$alimento->id)}}" enctype="multipart/form-data" >
                                                @method('PATCH')
                                                @csrf
                                            <div class="modal-content">

                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="ModalLabel">Editar alimento</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row mt-3 mb-0 mr-0 ml-0  p-0 justify-content-center">
                                                        <div class="col-sm-9  col-11 text-left">

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"><strong>Categoría:</strong></label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px" name="categoria" id="exampleInputUsername2">
                                                                    <option value="" selected="" disabled="">Seleccione una categoría</option>
                                                                    @foreach($categorias as $categoria)
                                                                    <option value="{{$categoria->id}}" {{ old('categoria', $alimento->categoria_id) == $categoria->id ? 'selected' : '' }} >{{$categoria->nombre}}</option>
                                                                 @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"><strong>Peso:</strong>
                                                               </label>
                                                               <div class=" col-md-8 d-flex"                           style="justify-content:space-between">
                                                                   <input  style="border-radius:10px; width:32%;max-height:45.2px" type="number" name="peso" class="form-control" value="{{ $alimento->peso}}">
                                                                   <select class="form-control" style="border-radius:10px;background-color:#F0F0F0; width:60%;min-height:45.2px" name="unidad" id="unidad">
                                                                    <option value="" selected="" disabled="">Seleccione una medida</option>
                                                                   @foreach($medidas as $medida)
     <option value="{{$medida->id}}"  {{ old('unidad', $alimento->medida_id) == $medida->id ? 'selected' : '' }}>{{$medida->medida}}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label" ><strong>Nombre:</strong></label>
                                                            <div class="col-md-8">
                                                                <input style="border-radius:10px"  type="text" name="nombre" class="form-control" value="{{$alimento->nombre}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"><strong>Valor calórico:</strong></label>
                                                            <div class="col-md-8">
                                                                <input style="border-radius:10px" type="number" name="valor_calorico" class="form-control" value="{{$alimento->valor_calorico}}">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"><strong>Carbohidratos:</strong></label>
                                                            <div class="col-md-8">
                                                                <input style="border-radius:10px" type="number" name="carbohidrato" class="form-control" value="{{ $alimento->carbohidrato }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"><strong>Proteínas:</strong>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input style="border-radius:10px" type="number" name="proteina" class="form-control" value="{{ $alimento->proteina }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-form-label col-md-4"><strong>Grasas:</strong>
                                                               </label>
                                                               <div class="col-md-8">
                                                                   <input style="border-radius:10px" type="number" name="grasa" class="form-control" value="{{ $alimento->grasa}}">
                                                                </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"><strong>Nueva imagen</strong>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input  style="border-radius:10px" type="file" name="imagen" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-4 col-form-label"> <strong> Imagen actual:</strong></label>
                                                            <div class=" col-md-8 text-center mt-1">
                                                                <a onclick="showImage();" class="btn btn-warning w-100" id="imagen2" type="button">Ver Imagen</a>
                                                            </div>
                                                            <div class="text-center">
                                                                @if (isset($alimento->imagen->url))
                                                                    <img id="imagen" class="ocultar img-thumbnail"
                                                                    style="width:95%;heigth:80%"
                                                                        src="{{ $alimento->imagen->url }}">
                                                                @else
                                                                    <img id="imagen" class="ocultar img-thumbnail"
                                                                        style="width:95%;heigth:80%"
                                                                        src="{{ asset('img/icons/dieta48.png') }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </div>
                                                    <div
                                                    class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                    <div
                                                        class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                        <button type="submit"
                                                            class="btn btn-success mb-2 col-12 col-sm-5 p-2">Guardar</button>
                                                        <button type="button"
                                                            class="btn btn-light mb-2 col-12 col-sm-5 p-2"
                                                            data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                        </div>

                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<script>
    var imagen = document.getElementById('imagen');
    var estado = false;
    function showImage()
    {
        if(estado)
        {
            imagen.className+=" ocultar";
            estado = false;
        }
        else
        {
            imagen.classList.remove('ocultar');
            estado = true;
        }

    }

</script>

    <script>
        function eliminarAlimento(alimento) {
            var form = document.getElementById('deletealimento' + alimento.id);
            swal({
                title: "Estas seguro que quieres eliminar el alimento " + alimento.nombre + " ?",
                text: "Al confirmar, el alimento será eliminado permanentemente!",
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
@endsection
