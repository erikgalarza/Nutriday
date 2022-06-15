@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Categorías de alimentos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías de alimentos</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="mb-3" style="background-color:#4b6ac3">
            <h3 class="card-title titulosa text-lg-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">Categorías de alimentos</h3>
            </div>
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-8 mb-3 text-center justify-content-center d-flex p-3" style="border:1px dashed;border-radius:10px;background-color:#F0F0F0">
                   <h5 class=" col-3  col-form-label">Agregar Categoría:</h5>
                   <div class="col-3 text-center align-items-center justify-content-center row">
                       <a class="btn btn-success" href="{{route('categoriaAlimento.create')}}"><i class="fas fa-plus mr-3"></i>Agregar </a>
                   </div>
                </div>
                <div class="col-12 justify-content-center row mt-3">
                    <div class="table-responsive text-center w-50">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categorias as $key => $categoria)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>

                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $categoria->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                                        <a onclick="eliminarCategoria({{$categoria}});" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

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
                                                <div class="modal-body d-flex text-center col-12 mt-2 justify-content-center"
                                                    style=" padding:1.5rem 3rem">
                                                    <div class="form-group d-flex ">

                                                            <label class="col-4 col-form-label" for="recipient-name"><strong>Nombre:</strong></label>
                                                            <div class="col-8">
                                                                <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}">
                                                            </div>


                                                    </div>
                                                </div>
                                                <div class="modal-footer  text-center my-3"style="justify-content: center; align-items:center">
                                                    <button type="submit" class="btn btn-success">Guardar</button>
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
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
