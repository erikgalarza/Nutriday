@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Agregar datos antropométricos
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
            <div class=" mb-5" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-lg-center mb-5 mt-5 text-white" style="text-transform: uppercase; font-weight:bold">D<span style="text-transform: lowercase">atos antropométricos de</span> {{$paciente->nombre." ".$paciente->apellido}}</h3>

        </div>

            <div class="card-body"  style="padding-right:13rem;padding-left:13rem">

                <form method="POST" action="{{route('paciente.guardarDatosAntropometricos')}}" class="forms-sample">
                    @csrf

                    <input type="hidden" name="id_paciente" value="{{$paciente->id}}">


                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Peso (Kg):</label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px" name="peso" type="number"
                                 class="form-control" placeholder="Ingrese el peso en kilos"
                                id="peso">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Altura (Mts):</label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px" name="altura" step="0.05" type="number" placeholder="Ingrese la altura en metros"

                                class="form-control" id="altura">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">IMC:<button class="ml-3" disabled  title="El IMC es un campo que se calcula luego de ingresar el peso y altura" style="border-radius:10px; border:1px solid grey"><i class="fas fa-info"></i></button></label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px" type="number" disabled
                                class="form-control" id="imc" placeholder="">
                        </div>
                    </div>

                    <input type="hidden" name="imc" id="imc2" >

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Grasa corporal (%)</label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px" name="grasa_corporal" step="0.01" type="number" placeholder="Ingrese la grasa corporal"
                                 class="form-control"
                                id="grasa_corporal">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Masa muscular (%)</label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px" name="masa_muscular" step="0.01" type="number" placeholder="Ingrese la masa muscular"
                                 class="form-control"
                                id="masa_muscular">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Datos Bioquímicos:</label>
                        <div class="col-sm-9">
                            <input style="border-radius:10px" name="imagen" type="file"
                                 class="form-control"
                                id="exampleInputPassword2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-weight:bold; font-size:12px; text-transform:uppercase" for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Observaciones:</label>
                        <div class="col-sm-9">
                            <textarea cols="30" rows="10" style="border-radius:10px" name="observaciones"type="text"
                                 class="form-control"
                                id="observaciones">
                            </textarea>
                        </div>
                    </div>



                  <div class="mt-5 form-group text-center">
                    <button type="submit" class="btn btn-success mr-2">Guardar</button>
                
                  </div>


                </form>



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
