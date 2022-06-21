@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar video
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar video</li>
        </ol>
    </nav>
</div>

<div class="row">

    <div class="col-md-12 grid-margin stretch-card text-left">
        <div class="card">
            <div class=" mb-3" style="background-color:#4b6ac3 ">
                <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">Datos del video</h3>
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
            
            <div class="card-body"  >

                <div class="col-12 row justify-content-center px-0 m-0">
                    <div class="col-md-8 col-xl-9 col-11 text-left pl-md-0">

                <form method="POST" action="{{route('video.store')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="container" style="max-width:621px">

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"  for="exampleInputEmail2"
                            class="col-xl-3 col-form-label">Titulo del video:</label>
                        <div class="col-xl-9">
                            <input style="border-radius: 10px" name="titulo" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese el título">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"  for="exampleInputEmail2"
                            class="col-xl-3 col-form-label">URL del video:</label>
                        <div class="col-xl-9">
                            <input style="border-radius: 10px" name="url" type="text" class="form-control" id="exampleInputEmail2"
                                placeholder="Ingrese la Url del video">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"  for="exampleInputEmail2"
                            class="col-xl-3 col-form-label">Categoría:</label>
                        <div class="col-xl-9">
                           <select style="border-radius: 10px; background-color:#F0F0F0" name="categoria" class="form-control">
                               <option value=""disabled selected>Seleccione una categoría para el video</option>
                               <option value="Recetas">Recetas</option>
                               <option value="Ejercicios">Ejercicios</option>
                               <option value="Motivacion">Motivación</option>
                           </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase"  for="exampleInputEmail2"
                            class="col-xl-3 col-form-label">Descripción:</label>
                        <div class="col-xl-9">
                         <textarea style="border-radius: 10px" class="form-control" name="descripcion" rows="5"></textarea>
                        </div>
                    </div>

                    <div
                    class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                    <div class="col-md-8 p-0 col-xl-5 justify-content-space-around">
                        <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar
                        </button>
                        <a class="btn btn-light mb-2 col-sm-12 col-md-5"
                            href="{{ route('video.index') }}">Cancelar</a>
                    </div>
                </div>

                </div>

                </form>
            </div>
        </div>

            </div>
        </div>
    </div>

</div>
@endsection
