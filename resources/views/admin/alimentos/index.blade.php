@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
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
        <div class=" mb-5" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-5 mt-5 text-white"style="text-transform: uppercase; font-weight:bold">Alimentos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive text-center">
                        <table id="order-listing" class="table mb-5">
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
                                        <td>{{$alimento->peso}}{{$alimento->medida->medida}}</td>
                                        <td>{{$alimento->categoria->nombre}}</td>
                                        <!-- <td>{{-- $alimento->categoria->nombre--}}</td> -->

                                        <td>
                                            <a data-toggle="modal" data-target="#exampleModal-3{{ $alimento->id }}"
                                                class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $alimento->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                                        <a onclick="eliminarAlimento({{$alimento}});" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

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
                                                <div class="modal-body d-flex text-center col-12 mb-5"
                                                    style=" padding:1.5rem 3rem">

                                                    <div class="col-6 mr-3">

                                                        <div class="form-group mb-3" style="text-transform: uppercase">
                                                            <label ><strong>{{ $alimento->nombre }}</strong></label>
                                                        </div>
                                                        @if (isset($alimento->imagen->url))
                                                            <img class="img-thumbnail"
                                                                style="width:100%; height:90%"
                                                                src="{{ $alimento->imagen->url }}">
                                                        @else
                                                            <img class="img-thumbnail"
                                                                style="width:100%; height:90%"
                                                                src="{{ asset('img/icons/dieta48.png') }}">
                                                        @endif
                                                    </div>

                                                    <div class="col-6 text-center" style="text-align: center">
                                                        <div class="justifiy-content-center col-12" style="margin:0 auto">



                                                        <div class="form-group mb-4 justify-content-center" style="text-transform: uppercase;border-bottom:1px solid">
                                                            <label ><strong>Información nutricional</strong></label>
                                                        </div>
                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left "><strong>Categoría:</strong></label>
                                                            <label class="col-4 text-left"> {{  $alimento->categoria->nombre }}</label>
                                                        </div>
                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left "><strong>Peso:</strong></label>
                                                            <label class="col-4 text-left"> {{ $alimento->peso }}</label>
                                                        </div>

                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left "><strong>Valor calórico:</strong></label>
                                                            <label class="col-4 text-left"> {{ $alimento->valor_calorico }}</label>
                                                        </div>

                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left"><strong>Carbohidratos:</strong></label>
                                                            <label class="col-4 text-left">{{ $alimento->carbohidrato }}</label>

                                                        </div>
                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left"><strong>Proteinas:</strong></label>
                                                            <label class="col-4 text-left">{{ $alimento->proteina }}</label>
                                                        </div>

                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left"><strong>Grasas:</strong></label>
                                                            <label class="col-4 text-left">{{ $alimento->grasa }}</label>
                                                        </div>
                                                        <div class="form-group row mb-2 justify-content-center">
                                                            <label class="col-6 text-left"><strong>Creado:</strong></label>
                                                            <label class="col-4 text-left">{{ $alimento->created_at }}</label>
                                                        </div>

                                                    </div>


                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                      {{-- MODAL DE EDITAR ALIMENTO --}}

                                      <div class="modal fade" style="min-width:600px !important;" id="exampleModal-2{{ $alimento->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="min-width:600px !important;"  role="document">
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

                                                <div class="modal-body mb-0" style="padding:1.5rem 4rem">

                                                    <div class="col-12 text-left mt-3">

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"><strong>Categoría:</strong></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" style="border-radius:10px;background-color:#F0F0F0;min-height:45.2px" name="categoria" id="exampleInputUsername2">
                                                                    <option value="" selected="" disabled="">Seleccione una categoría</option>
                                                                    @foreach($categorias as $categoria)
                                                                    <option value="{{$categoria->id}}" {{ old('categoria', $alimento->categoria_id) == $categoria->id ? 'selected' : '' }} >{{$categoria->nombre}}</option>
                                                                 @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"><strong>Peso:</strong>
                                                               </label>
                                                               <div class=" col-sm-9 d-flex"                           style="justify-content:space-between">
                                                                   <input  style="border-radius:10px; width:32%;max-height:45.2px" type="number" name="peso" class="form-control" value="{{ $alimento->peso}}{{$alimento->medida}}">
                                                                   <select class="form-control" style="border-radius:10px;background-color:#F0F0F0; width:60%;min-height:45.2px" name="unidad" id="unidad">
                                                                    <option value="" selected="" disabled="">Seleccione una medida</option>
                                                                   @foreach($medidas as $medida)
     <option value="{{$medida->id}}"  {{ old('unidad', $alimento->medida_id) == $medida->id ? 'selected' : '' }}>{{$medida->medida}}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label" ><strong>Nombre:</strong></label>
                                                            <div class="col-sm-9">
                                                                <input style="border-radius:10px"  type="text" name="nombre" class="form-control" value="{{$alimento->nombre}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"><strong>Valor calórico:</strong></label>
                                                            <div class="col-sm-9">
                                                                <input style="border-radius:10px" type="number" name="valor_calorico" class="form-control" value="{{$alimento->valor_calorico}}">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"><strong>Carbohidratos:</strong></label>
                                                            <div class="col-sm-9">
                                                                <input style="border-radius:10px" type="number" name="carbohidrato" class="form-control" value="{{ $alimento->carbohidrato }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"><strong>Proteínas:</strong>
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <input style="border-radius:10px" type="number" name="proteina" class="form-control" value="{{ $alimento->proteina }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-form-label col-sm-3"><strong>Grasas:</strong>
                                                               </label>
                                                               <div class="col-sm-9">
                                                                   <input style="border-radius:10px" type="number" name="grasa" class="form-control" value="{{ $alimento->grasa}}">
                                                                </div>

                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"><strong>Nueva imagen</strong>
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <input  style="border-radius:10px" type="file" name="imagen" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-1">
                                                            <label class="col-sm-3 col-form-label"> <strong> Imagen actual:</strong></label>
                                                            <div class=" col-sm-9 text-center mt-1">
                                                                <button class="btn btn-outline-info" id="imagen2" type="button" style="width:100%">Ver</button></div>
                                                            <div class="text-center">
                                                                @if (isset($alimento->imagen->url))
                                                                    <img class="img-thumbnail"
                                                                    style="width:95%;heigth:80%"
                                                                        src="{{ $alimento->imagen->url }}">
                                                                @else
                                                                    <img class="img-thumbnail"
                                                                        style="width:95%;heigth:80%"
                                                                        src="{{ asset('img/icons/dieta48.png') }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </div>

                                            <div class="modal-footer text-center" style="justify-content: center; align-items:center">
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>

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
    </div>

<script>
    function ocultar(id){
    var elemento = document.getElementById(id);
    elemento.style.display = "none";
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
