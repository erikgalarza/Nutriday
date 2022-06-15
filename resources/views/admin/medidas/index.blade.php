@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Unidades de medida
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Unidades de medida</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="mb-3" style="background-color:#4b6ac3">
            <h3 class="card-title titulosa text-lg-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">Unidades de medida</h3>
            </div>
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-8 mb-3 text-center justify-content-center d-flex p-3" style="border:1px dashed;border-radius:10px;background-color:#F0F0F0">
                    <h5 class=" col-4  col-form-label">Agregar unidad de medida:</h5>
                    <div class="col-2 text-center align-items-center justify-content-center row">
                        <a class="btn btn-success" href="{{route('medidaAlimento.create')}}"><i class="fas fa-plus mr-3"></i>Agregar </a>
                    </div>
                 </div>
                <div class="col-12 justify-content-center row mt-3">
                    <div class="table-responsive text-left w-50">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Medida</th>
                                    <th>Abreviatura</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">

                                @foreach ($medidas as $key => $medida)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $medida->medida }}</td>
                                        <td>({{ $medida->abreviatura }})</td>

                                        <td>

                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $medida->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                                        <a onclick="eliminarMedida({{$medida}});" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                                    </td>
                                    </tr>


                                    <form id="deletemedida{{$medida->id}}" method="POST" action="{{route('medidaAlimento.destroy',$medida->id)}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                      {{-- MODAL DE EDITAR CATEGORIA --}}

                                      <div class="modal fade" id="exampleModal-2{{ $medida->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST" action="{{route('medidaAlimento.update',$medida->id)}}" enctype="multipart/form-data" >
                                                @method('PATCH')
                                                @csrf
                                            <div class="modal-content">

                                                <div class="modal-header" style="background-color:#4b6ac3">
                                                    <h5 class="modal-title text-lg-center text-white"  style="text-transform: uppercase; font-weight:bold; font-size:16px" id="ModalLabel">Editar medida</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span style="color:white;font-size:30px"  aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-bodytext-center col-12 mt-2 justify-content-center" style=" padding:1.5rem 3rem">

                                                        <div class="form-group d-flex mb-2">
                                                            <label class="col-3 col-form-label text-left" for="recipient-name"><strong>Medida:</strong></label>
                                                            <div class="col-9">
                                                            <input  type="text" name="medida" class="form-control" value="{{$medida->medida}}">
                                                        </div>
                                                        </div>
                                                        <div class="form-group d-flex mb-2">
                                                            <label class="col-3 col-form-label text-left" for="recipient-name"><strong>Abreviatura:</strong></label>
                                                            <div class="col-9">
                                                            <input  type="text" name="abreviatura" class="form-control" value="{{$medida->abreviatura}}">
                                                        </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer text-center my-3"style="justify-content: center; align-items:center">
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
        function eliminarMedida(medida) {
            var form = document.getElementById('deletemedida' + medida.id);
            swal({
                title: "Estas seguro que quieres eliminar la medida " + medida.medida + " ?",
                text: "Al confirmar, la medida será eliminada permanentemente!",
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
