@extends('client.dashboard')
@section('contenido')
    <div class="page-header mb-2">
        <h3 class="page-title">
            Mis dietas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mis dietas</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class=" mb-2" style="background-color:#4b6ac3;border-radius:5px 5px 0 0 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Dietas asignadas</h3>
        </div>
        @if (count($dietas)>0)
                  <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table text-center">
                            <thead>
                                <tr>
                                    <th class="pl-0 text-left">N°</th>
                                    <th>Nombre</th>
                                    <th>Tipo diabetes</th>
                                    <th>IMC</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha finalización</th>
                                    <th>Estado</th>
                                    <th>Ver dieta</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($dietas as $key => $dieta)
                                    <tr>
                                        <td class="pl-0 text-left">{{ $key+1 }}</td>
                                        <td>{{ $dieta->nombre }}</td>
                                        <td>{{ $dieta->tipo_diabetes }}</td>
                                        <td>{{ $dieta->imc }}</td>
                                        <td>{{ date('Y-m-d',strtotime($dieta->created_at)) }}</td>
                                        <td> {{date('Y-m-d',strtotime($fechasFinDieta[$key]))}}</td>
                                        <td><p class="px-3 py-2 badge badge-{{$dieta->estado=='inactiva'?'danger':'success'}} badge-pill">{{$dieta->estado}}</p></td>
                                        <td>
                                            <a href="{{route('cliente.verDieta',$dieta->id)}}"
                                                class="btn btn-outline-info py-2 px-3"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>

                                    {{-- MODAL DE DATOS DIETA --}}

                                    <div class="modal fade" id="exampleModal-3{{ $dieta->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Datos de la dieta</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"
                                                    style="display:flex; flex-wrap:wrap; align-content:flex-start">



                                                    <div style="margin-left:20px;">

                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Nombre:</strong>
                                                                {{ $dieta->nombre }}</label>

                                                        </div>




                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                      {{-- MODAL DE EDITAR DIETA --}}

                                      <div class="modal fade" id="exampleModal-2{{ $dieta->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST" action="{{route('alimento.update',$dieta->id)}}" enctype="multipart/form-data" >
                                                @method('PATCH')
                                                @csrf
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Editar dieta</h5>
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
                                                            <input type="text" name="nombre" class="form-control" value="{{$dieta->nombre}}">

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
        @else
        <div class="card-body">
            <div class="container-fluid row justify-content-center p-0 m-0">
                <div class="container bg-danger row align-items-center justify-content-center" style="max-width:600px;border-radius:8px;min-height:50px">
                    <div class="row justify-content-center ">
                    <label class="text-center text-white"> <strong> No hay dietas asignadas !  </strong> </label>
                </div>
            </div>
        </div>
        </div>
        @endif

    </div>


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
