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
        <div class="card-body">
            <h4 class="card-title">Categorías</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categorias as $key => $categoria)
                                    <tr>
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
                                               
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Editar categoría</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                
                                                <div class="modal-body"
                                                    style="display:flex; flex-wrap:wrap; align-content:flex-start">
                                                    
                                                    <div style="margin-left:20px;">

                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Nombre:</strong></label>
                                                            <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="botones text-center my-3">
                                                    <button type="submit" class="btn btn-success">Guardar</button>
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
