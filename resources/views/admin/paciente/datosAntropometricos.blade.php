@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos antropométricos</li>
        </ol>
    </nav>
</div>
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class=" mb-3" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white" style="text-transform: uppercase; font-weight:bold">Datos antropométricos para  {{$paciente->nombre}} {{$paciente->apellido}}</h3>

        </div>

            <div class="card-body"  >

                <div class="col-12 row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-12 text-left">

                <form method="POST" action="{{route('paciente.guardarDatosAntropometricos')}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="max-width:528px">

                    <input type="hidden" name="id_paciente" value="{{$paciente->id}}">


                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label ">Peso (Kg):</label>
                        <div class="col-xl-8 ">
                            <input style="border-radius:10px" name="peso" type="number"
                                 class="form-control" placeholder="Ingrese el peso en kilos"
                                id="peso">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label">Altura (Mts):</label>
                        <div class="col-xl-8 ">
                            <input style="border-radius:10px" name="altura" step="0.05" type="number" placeholder="Ingrese la altura en metros"

                                class="form-control" id="altura">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label">IMC:<button class="ml-3" disabled  title="El IMC es un campo que se calcula luego de ingresar el peso y altura" style="border-radius:10px; border:1px solid grey"><i class="fas fa-info"></i></button></label>
                        <div class="col-xl-8 ">
                            <input style="border-radius:10px" type="number" disabled
                                class="form-control" id="imc" placeholder="IMC se calcula luego de ingresar peso y altura">
                        </div>
                    </div>

                    <input type="hidden" name="imc" id="imc2" >

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label ">Grasa corporal (%):</label>
                        <div class="col-xl-8 ">
                            <input style="border-radius:10px" name="grasa_corporal" step="0.01" type="number" placeholder="Ingrese la grasa corporal"
                                 class="form-control"
                                id="grasa_corporal">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label">Masa muscular (%):</label>
                        <div class="col-xl-8 ">
                            <input style="border-radius:10px" name="masa_muscular" step="0.01" type="number" placeholder="Ingrese la masa muscular"
                                 class="form-control"
                                id="masa_muscular">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label">Datos Bioquímicos:</label>
                        <div class="col-xl-8 ">
                            <input style="border-radius:10px" name="imagen" type="file"
                                 class="form-control"
                                id="exampleInputPassword2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-xl-4  col-form-label">Observaciones:</label>
                        <div class="col-xl-8 ">
                            <textarea cols="30" rows="10" style="border-radius:10px" name="observaciones"type="text"
                                 class="form-control"
                                id="observaciones">
                            </textarea>
                        </div>
                    </div>


                    <div class=" mt-5 mr-0 ml-0 p-0 form-group text-center col-12 row justify-content-center ">
                        <div class="col-md-8 p-0 col-xl-6 justify-content-space-around">
                            <button type="submit" class="btn btn-success mb-2 col-sm-12 col-md-5">Guardar
                            </button>
                            <a class="btn btn-light mb-2 col-sm-12 col-md-5"  href="{{ route('da.datosByPaciente', $paciente->id) }}">Cancelar</a>
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

<script>

    function obtenerPeso(e){
        let value = e.target.value;
        // return value;
    }
    function obtenerAltura(e){
        let value = e.target.value;
        // return value;
        if(document.getElementById('peso').value != null){
            let imc = document.getElementById('peso').value/(value*value);
           document.getElementById('imc').value = imc.toFixed(2);
           document.getElementById('imc2').value = imc.toFixed(2);
        }
    }



document.addEventListener('DOMContentLoaded',function(){
    document.getElementById('peso').addEventListener('change',obtenerPeso);
    document.getElementById('altura').addEventListener('change',obtenerAltura);
})
</script>
@endsection
