<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendor2/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor2/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendor2/css/vendor.bundle.addons.css')}}">
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css2/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{asset('img/LogoNutridia.png')}}" alt="logo">
              </div>
              <h4>Bienvenido !</h4>
              <!-- <h6 class="font-weight-light">Happy to see you again!</h6> -->
              <form method="POST" action="{{route('login')}}" class="pt-3">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span  style="border-radius: 8px 0 0 8px !important;" class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user "></i>
                      </span>
                    </div>
                    <input name="email"  style="border-radius:0 8px 8px 0 !important;"  type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Ingresa tu Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span style="border-radius: 8px 0 0 8px !important;" class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-lock "></i>
                      </span>
                    </div>
                    <input type="password" name="password" style="border-radius:0 8px 8px 0 !important;" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Contraseña">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Matener cuenta iniciada
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Olvidaste tu contraseña?</a>
                </div>
                <div class="my-3">
                  <button  style="font-weight: bold;" type="submit" class="btn btn-block btn-success auth-form-btn" ><i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>Iniciar Sesión</a>
                </div>
                <div class="d-flex">
                    <style>
                      .boton:hover{
                        filter:brightness(0.9);
                      }
                    </style>
                  <a style="background-color:#4b6ac3;" href="{{route('home')}}" class="btn boton auth-form-btn auth-form-btn flex-grow text-white">
                    <i class="fa-solid fa-house-chimney mr-2"></i>Regresar al Inicio
                  </a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="font-weight-medium text-center flex-grow align-self-end ">Copyright &copy; 2022  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendor2/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendor2/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('js2/off-canvas.js')}}"></script>
  <script src="{{asset('js2/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js2/misc.js')}}"></script>
  <script src="{{asset('js2/settings.js')}}"></script>
  <script src="{{asset('js2/todolist.js')}}"></script>
  <script src="https://kit.fontawesome.com/50e215d7ac.js" crossorigin="anonymous"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>
