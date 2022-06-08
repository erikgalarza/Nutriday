@extends('client.dashboard')
@section('contenido')
<div style=" margin-top:40px; border-bottom: 1px solid #000" class="text-center"><h4 class="card-title">Seguimiento del progreso</h4></div>
<div class="row" style="margin-top:50px;">
    <input type="hidden" id="datosAntropometricos" value="{{$datos}}">

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">
               <img src="{{asset('img/icons/scale.png')}}">
              Peso (Kg)
            </h4>
            {{-- <h2 class="mb-5">56000 <span class="text-muted h4 font-weight-normal">Peso promedio</span></h2> --}}
            <canvas id="sales-chart"></canvas>
          </div>
        </div>
      </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <img src="{{asset('img/icons/body.png')}}">
            IMC (Kg/A²)
          </h4>
          <canvas id="orders-chart"></canvas>
          <div id="orders-chart-legend" class="orders-chart-legend"></div>                  
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('administracion/js/historialPersonal.js')}}"></script>
@endsection