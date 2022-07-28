@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Categorías de alimentos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías de alimentos</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="mb-0" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
            <h3 class="card-title titulosa text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">Categorías de alimentos</h3>
            </div>
        <div class="card-body">
            <div class="container ">
            <div class="row justify-content-center">
                    <div class="col-lg-10 col-10 d-flex justify-content-center p-2" style="border:1px dashed;border-radius:10px;background-color:#F0F0F0;flex-wrap:wrap" >
                        <h5 class="mr-2 mr-sm-4 text-center  col-form-label">Agregar Categoría:</h5>
                        <div class=" mr-2 ml-2 align-items-center justify-content-center row">
                            <a class="btn btn-success" href="{{route('categoriaAlimento.create')}}"><i class="fas fa-plus mr-3"></i>Agregar </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 justify-content-center row mt-3">
                    <div class="table-responsive text-center w-75">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categorias as $key => $categoria)
                                    <tr>
                                        <td class="pl-0 text-left">{{$key+1}}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>
                                            <a class="btn btn-outline-warning mb-1" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $categoria->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                            <a onclick="eliminarCategoria({{$categoria}});" class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>


                                    <form id="deletecategoria{{$categoria->id}}" method="POST" action="{{route('categoriaAlimento.destroy',$categoria->id)}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                      {{-- MODAL DE EDITAR CATEGORIA --}}

                                      <div class="modal fade" id="exampleModal-2{{ $categoria->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST" action="{{route('categoriaAlimento.update',$categoria->id)}}" enctype="multipart/form-data" >
                                                @method('PATCH')
                                                @csrf
                                            <div class="modal-content">

                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white" style="text-transform: uppercase; font-weight:bold; font-size:16px" id="ModalLabel">Editar alimento</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span  style="color:white;font-size:30px" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body py-2 px-0">
                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-10 col-11 text-left">

                                                    <div class="form-group row mb-2 mt-3">
                                                        <label class="col-sm-4 col-form-label" ><strong>Fecha creción:</strong></label>
                                                        <label class="col-sm-8 col-form-label" >{{date('Y-m-d',strtotime($categoria->created_at))}}</label>
                                                </div>
                                                    <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label" for="recipient-name"><strong>Nombre:</strong></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}">
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-4 mb-0 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center">
                                                    <div class="col-sm-6 col-11 mt-3 col-xl-7 justify-content-space-around">

                                                      <button type="submit" class="btn btn-success mb-2 col-12 col-sm-5">Guardar</button>
                                                      <button type="button" class="btn btn-light mb-2 col-12 col-sm-5" data-dismiss="modal">Cancelar</button>
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
    </div>


    <script>
        function eliminarCategoria(categoria) {
            var form = document.getElementById('deletecategoria' + categoria.id);
            swal({
                title: "Estas seguro que quieres eliminar la categoria " + categoria.nombre + " ?",
                text: "Al confirmar, la categoría será eliminada permanentemente!",
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
