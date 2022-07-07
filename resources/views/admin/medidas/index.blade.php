@extends('admin.dashboard')
@section('contenido')
    <div class="page-header mb-2">
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
            <h3 class="card-title titulosa text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">Unidades de medida</h3>
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
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-10 d-flex justify-content-center p-2" style="border:1px dashed;border-radius:10px;background-color:#F0F0F0;flex-wrap:wrap" >
                        <h5 class="mr-2 ml-2 text-center  col-form-label">Agregar Medida:</h5>
                        <div class=" mr-2 ml-2 align-items-center justify-content-center row">
                            <a title="Agregar una nueva medida" class="btn btn-success" href="{{route('medidaAlimento.create')}}"><i class="fas fa-plus mr-3"></i>Agregar </a>
                        </div>
                    </div>
                 </div>
                </div>
            </div>

            <div class="col-12 justify-content-center row mt-3">
                <div class="table-responsive text-left w-50">
                        <table id="order-listing" class="table mb-3">
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

                                            <a title="Editar datos de medida" class="btn btn-outline-warning mb-1" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $medida->id }}"><i
                                                    class="fas fa-edit"></i></a>

                                                        <a title="Eliminar Medida" onclick="eliminarMedida({{$medida}});" class="btn btn-outline-danger mb-1"><i class="fas fa-trash"></i></a>

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

                                                <div class="modal-body py-2 px-0">

                                                    <div class="col-12 row m-0 justify-content-center">
                                                        <div class="col-sm-10 col-11 text-left">

                                                            <div class="form-group row mb-2">
                                                                <label class="col-sm-4 col-form-label text-left" for="recipient-name"><strong>Fecha creación:</strong></label>
                                                                <div class="col-sm-8">
                                                                    <label class="col-form-label">{{ date('Y-m-d',strtotime($medida->created_at))}}</label>
                                                                </div>
                                                            </div>
                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4 col-form-label text-left" for="recipient-name"><strong>Medida:</strong></label>
                                                            <div class="col-sm-8">
                                                                <input  type="text" name="medida" class="form-control" value="{{$medida->medida}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2">
                                                            <label class="col-sm-4 col-form-label text-left" for="recipient-name"><strong>Abreviatura:</strong></label>
                                                            <div class="col-sm-8">
                                                                <input  type="text" name="abreviatura" class="form-control" value="{{$medida->abreviatura}}">
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
