@extends('client.dashboard')
@section('contenido')

<div class="page-header">
    <h3 class="page-title">
        Página de inicio
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ol>
    </nav>
</div>

<div class="card">
            <div class="col-12 p-0">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="statistics-item text-center"  style="max-width: 120px" >
                          <p>
                            <i class="fa-regular fa-calendar-minus"></i>
                        </p>
                          <h2 class="" style="font-size:18px;text-transform:uppercase">Lunes</h2>
                          <label class="badge badge-outline-success badge-pill mt-3">Ver detalles</label>
                        </div>
                        <div class="statistics-item text-center"  style="max-width: 120px" >
                          <p>
                            <i class="fa-regular fa-calendar-minus"></i>
                        </p>
                          <h2  class="" style="font-size:18px;text-transform:uppercase">Martes</h2>
                          <label class="badge badge-outline-danger badge-pill mt-3">Ver detalles</label>
                        </div>
                        <div class="statistics-item text-center " style="max-width: 120px" >
                          <p>
                            <i class="fa-regular fa-calendar-minus"></i>
                          </p>
                          <h2  class="" style="font-size:18px;text-transform:uppercase">Miércoles</h2>
                          <label class="badge badge-outline-success badge-pill mt-3">Ver detalles</label>
                        </div>
                        <div class="statistics-item text-center"  style="max-width: 120px" >
                          <p>
                            <i class="fa-regular fa-calendar-minus"></i>
                        </p>
                          <h2  class="" style="font-size:18px;text-transform:uppercase">Jueves</h2>
                          <label class="badge badge-outline-success badge-pill mt-3">Ver detalles</label>
                        </div>
                        <div class="statistics-item text-center"  style="max-width: 120px" >
                          <p>
                            <i class="fa-regular fa-calendar-minus"></i>
                        </p>
                          <h2  class="" style="font-size:18px;text-transform:uppercase">Viernes</h2>
                          <label class="badge badge-outline-success badge-pill mt-3">Ver detalles</label>
                        </div>
                        <div class="statistics-item text-center"  style="max-width: 120px" >
                          <p>
                            <i class="fa-regular fa-calendar-minus"></i>
                        </p>
                          <h2  class="" style="font-size:18px;text-transform:uppercase">Sábado</h2>
                          <label class="badge badge-outline-danger badge-pill mt-3">Ver detalles</label>
                        </div>
                        <div class="statistics-item text-center"  style="max-width: 120px" >
                            <p>
                                <i class="fa-regular fa-calendar-minus"></i>
                            </p>
                            <h2 class="" style="font-size:18px;text-transform:uppercase">Domingo</h2>
                            <label class="badge badge-outline-success badge-pill mt-3">Ver detalles</label>
                          </div>

                    </div>
                  </div>
                </div>
              </div>
        </div>



    <div class="card mt-5">
        <div class=" mb-2" style="background-color:#4b6ac3 ">
            <h3 class="card-title text-center mb-4 mt-4 text-white"style="text-transform: uppercase; font-weight:bold">
                Seguimiento del progreso</h3>
        </div>
        <div class="card-body">
            <div class="row" >
                <input type="hidden" id="datosAntropometricos" value="{{ $datos }}">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <img src="{{ asset('img/icons/scale.png') }}">
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
                                <img src="{{ asset('img/icons/body.png') }}">
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

  <div class="card  mt-5">
    <div class="card-body">
        <div class="d-md-flex justify-content-between align-items-center">
          <div class="d-flex  mb-3 mb-md-0">
            <a class="btn btn-social-icon btn-facebook btn-rounded "  href="https://www.facebook.com/Colpomed/">
                <div class=" d-flex align-items-center  justify-content-center h-100">
                    <i class="fab fa-facebook-f"></i>
                </div>
            </a>
            <div class="ml-4">
              <h5 class="mb-0">Facebook</h5>
              <p class="mb-0">2887 friends</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3 mb-md-0">
            <a class="btn btn-social-icon btn-whatsapp btn-rounded" style="background-color:#25d366;color:white "> <!-- Este faltaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
                <div class=" d-flex align-items-center  justify-content-center h-100">
              <i class="fab fa-whatsapp"></i>
            </div>


            </a>
            <div class="ml-4">
              <h5 class="mb-0">Whatsapp</h5>
              <p class="mb-0">Para consultas</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3 mb-md-0">
            <a class="btn btn-social-icon btn-youtube btn-rounded" href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg" style="color:white ">
                <div class=" d-flex align-items-center  justify-content-center h-100">
                <i class="fab fa-youtube"></i>
                </div>
            </a>
            <div class="ml-4">
              <h5 class="mb-0">Youtube</h5>
              <p class="mb-0">Subscribete</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3 mb-md-0">
            <a class="btn btn-social-icon btn-instagram btn-rounded" href="https://www.instagram.com/Colpomed/" style="background-color:#ac2bac;color:white ">
            <div class=" d-flex align-items-center  justify-content-center h-100">
              <i class="fab fa-instagram"></i>
            </div>
            </a>
            <div class="ml-4">
              <h5 class="mb-0">Instagram</h5>
              <p class="mb-0">930 followers</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3 mb-md-0">
            <a class="btn btn-social-icon btn-linkedin btn-rounded" href="https://www.linkedin.com/in/ximena-coronel-a82538140/" style="color:white ">
                <div class=" d-flex align-items-center  justify-content-center h-100">
                <i class="fab fa-linkedin-in"></i>
                </div>
            </a>
            <div class="ml-4">
              <h5 class="mb-0">Linkedin</h5>
              <p class="mb-0">54 followers</p>
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
    <script src="{{ asset('administracion/js/historialPersonal.js') }}"></script>
@endsection
