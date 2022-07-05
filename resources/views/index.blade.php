<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NUTRIDAY  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/manzana.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <!-- =======================================================
    * Template Name: Day - v4.7.0
    * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">colpomed2019@gmail.com </a>
        <i class="bi bi-phone-fill phone-icon"></i> +(03) 2961078
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://www.facebook.com/Colpomed" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/colpomed/?hl=es" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg" class="twitter"><i class="bi bi-youtube"></i></a>
        <a href="https://www.linkedin.com/in/ximena-coronel-a82538140?originalSubdomain=ec" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">NUTRIDAY <span style="font-size: 15px;color:#919191">by COLPOMED</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Nosotros</a></li>
          <li><a class="nav-link scrollto" href="#services">Servicios</a></li>
          <!-- <li><a class="nav-link scrollto " href="#portfolio">Galería</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#pricing">Información</a></li> -->
          <li><a class="nav-link scrollto" href="#team">Equipo</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contáctanos</a></li>
          <li><a class="nav-link scrollto" href="{{route('login')}}">Inicia Sesión</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>BIENVENIDOS</h1>
      <h2>App para gestión de planes nutricionales</h2>
      <a href="#about" class="btn-get-started scrollto">Más información</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="{{asset('img/colpomed_about.jpg')}}" class="img-fluid" style="border-radius:5px"
              alt="Foto Gerencia Colpomed">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Sobre Nosotros.</h3>
            <p class="fst-italic" style="text-align:justify">
              Somos un Centro Hospitalario de Especialidades Médicas ubicado en la ciudad de Riobamba con amplio
              reconocimiento y experiencia en la práctica de Ginecología, Obstetricia, Patología Cervical y Colposcopia.
            </p>
            <br>
            <ul>
              <li><i class="bi bi-check-circle"></i>Educación alimentaria y nutricional.</li>
              <li><i class="bi bi-check-circle"></i>Tratamientos para la incontinencia urinaria.</li>
              <li><i class="bi bi-check-circle"></i>Diagnóstico y prevención del cáncer uterino.</li>
              <li><i class="bi bi-check-circle"></i>Diagnóstico, control y prevención de enfermedades agudas y crónicas
              </li>
            </ul>
            <br>
            <p style="text-align:justify">
              Nos identificamos como referentes en el manejo de la Patología del Cuello Uterino con una experiencia de
              25 años en el centro del país.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up">
            <div class="box h-100">
              <span>01</span>
              <h4>Laboratorio</h4>
              <p style="text-align: justify">Contamos con un área de pre analítica para recepción y toma de muestras, un
                área para analítica de inmunología, test hormonales y marcadores tumorales, pruebas de Biología
                molecular, Bioquímica Clínica, Serología y Hematología, Uroanálisis, Coproanálisis, Bacteriología con
                cámara aislada para siembra y preparación de cultivos.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
            <div class="box h-100">
              <span>02</span>
              <h4>Centro de infusiones de vitamina C</h4>
              <p style="text-align: justify">En Colpomed, brindamos una experiencia médica diferente, cálida y
                agradable; con un servicio de terapias naturales que se disponen en el Centro de Medicina Funcional.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box h-100">
              <span>03</span>
              <h4>Farmacia</h4>
              <p style="text-align: justify">Proporcionamos el servicio de Farmacia Interna a todos los usuarios de
                Consulta externa en Medicina General y de Especialidades.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="row d-flex align-items-center">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('img/clients/logosaliados.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('img/clients/logosaliados2.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('img/clients/logosaliados.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('img/clients/logosaliados2.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('img/clients/logosaliados.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('img/clients/logosaliados2.png')}}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Servicios</span>
          <h2>Servicios</h2>
          <p>En Colpomed podrás encontrar todo lo que necesitas para tu salud y cuidado personal.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-pulse bx-flashing'></i></div>
              <h4><a href="">Medicina Interna</a></h4>
              <p>El especialista en Medicina Interna, brinda atención integral al paciente, enfocándose en la
                prevención, estudio, diagnóstico, tratamiento y rehabilitación de las enfermedades crónicas propias del
                adulto.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
            data-aos-delay="150">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-plus-medical bx-tada'></i></div>
              <h4><a href="">Medicina General</a></h4>
              <p>Consulta externa de Medicina general con cuidados en atención primaria de salud para niños, mujeres y
                hombres con énfasis en la prevención y fomento de la salud.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up"
            data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-clinic bx-burst'></i></div>
              <h4><a href="">Pediatría Clínica y Neonatologia</a></h4>
              <p>Especialistas en Pediatría y Neonatología, atendemos a niños menores y mayores dentro de un ambiente
                adecuado y con la calidez que el servicio lo requiere.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="450">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-heart-circle bx-spin'></i></div>
              <h4 style="min-height: 57.6px;"><a href="">Ginecología y Obstetricia</a></h4>
              <p>Nos identificamos como referentes en el manejo de la Patología del Cuello Uterino, con una experiencia
                de 25 años en el ejercicio de esa área de la Ginecología en el centro del país.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-food-menu bx-fade-up'></i></div>
              <h4 style="min-height: 57.6px;"><a href="">Nutrición y Dietética</a></h4>
              <p>Contamos con profesionales especializados en Nutrición y Dietética, que mediante el trabajo
                interdisciplinario hacen del proceso de cuidado nutricional, parte del manejo integral del paciente
                ambulatorio y hospitalizado. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="750">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-flask bx-tada'></i></div>
              <h4><a href="">Laboratorio clínico automatizado</a></h4>
              <p>El Laboratorio Clínico de Colpomed, está equipado con tecnología moderna y equipos automatizados de la
                casa Roche, con respaldo técnico y de mantenimiento permanente de equipos</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Instalaciones</h3>
          <p> Laboratorio Clínico de COLPOMED. Equipos automatizados con la mejor tecnología de Laboratorios ROCHE. Por
            ello destacamos como laboratorio clínico inmunológico especializado.</p>
          <buttom title="Video promocional" class="cta-btn btn" data-toggle="modal" data-target="#exampleModal">Aqui va
            un modal</buttom>
        </div>
      </div>

    </section><!-- End Cta Section -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Galería de imágenes</span>
          <h2>Galería de imágenes</h2>
          <p> </p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todas</li>
              <li data-filter=".filter-instalaciones">Instalaciones</li>
              <li data-filter=".filter-consultorio">Consultorio</li>
              <li data-filter=".filter-otros">Noticias</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">

          <div class="col-lg-4 col-md-6 portfolio-item filter-instalaciones">
            <img src="{{asset('img/portfolio/instalaciones.png')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Laboratorio</h4>
              <p>Instalaciones</p>
              <a href="{{asset('img/portfolio/instalaciones.png')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Laboratio de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-otros">
            <img src="{{asset('img/portfolio/otros.png')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Noticias</h4>
              <p>COLPOMED</p>
              <a href="{{asset('img/portfolio/otros.png')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Noticias"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-instalaciones">
            <img src="{{asset('img/portfolio/laboratorio.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Laboratorio Clínico</h4>
              <p>Instalaciones</p>
              <a href="{{asset('img/portfolio/laboratorio.jpg')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Laboratorio médico de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-consultorio">
            <img src="{{asset('img/portfolio/consultorio.PNG')}}" class="img-fluid w-100" alt="">
            <div class="portfolio-info">
              <h4>Consultorio médico</h4>
              <p>Consultorios</p>
              <a href="{{asset('img/portfolio/consultorio.PNG')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Consultorio médico de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-otros">
            <img src="{{asset('img/portfolio/otros2.png')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Noticias</h4>
              <p>COLPOMED</p>
              <a href="{{asset('img/portfolio/otros2.png')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Noticias"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-otros">
            <img src="{{asset('img/portfolio/otros4.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Noticias</h4>
              <p>COLPOMED</p>
              <a href="{{asset('img/portfolio/otros4.jpg')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Noticias"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-instalaciones">
            <img src="{{asset('img/portfolio/Enfermeria.PNG')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Enfermería</h4>
              <p>Instalaciones</p>
              <a href="{{asset('img/portfolio/Enfermeria.PNG')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Enfermería de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-instalaciones">
            <img src="{{asset('img/portfolio/edificio.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Edificio COLPOMED</h4>
              <p>Instalaciones</p>
              <a href="{{asset('img/portfolio/edificio.jpg')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Edificio de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-otros">
            <img src="{{asset('img/portfolio/otros5.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Noticias</h4>
              <p>COLPOMED</p>
              <a href="{{asset('img/portfolio/otros5.jpg')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Noticias"><i class="bx bx-plus"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-instalaciones">
            <img src="{{asset('img/portfolio/instalaciones2.PNG')}}" class="img-fluid w-100 h-100" alt="">
            <div class="portfolio-info">
              <h4>Laboratorio</h4>
              <p>Instalaciones</p>
              <a href="{{asset('img/portfolio/instalaciones2.PNG')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Laboratio de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-consultorio">
            <img src="{{asset('img/portfolio/consultorio3.PNG')}}" class="img-fluid w-100" alt="">
            <div class="portfolio-info">
              <h4>Sala de espera</h4>
              <p>Consultorios</p>
              <a href="{{asset('img/portfolio/consultorio3.PNG')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Sala de espera de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-consultorio">
            <img src="{{asset('img/portfolio/vitaminac.jpg')}}" class="img-fluid w-100" alt="">
            <div class="portfolio-info">
              <h4>Centro de Medicina Funcional.</h4>
              <p>Consultorios</p>
              <a href="{{asset('img/portfolio/vitaminac.jpg')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Centro de Medicina Funcional antidegenerativa, antioxidativa, y sueroterapias biorreguladoras y de infusiones de Megadosis de Vitamina C."><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-consultorio">
            <img src="{{asset('img/portfolio/instalaciones3.PNG')}}" class="img-fluid w-100" alt="">
            <div class="portfolio-info">
              <h4>Consultorio médico infantil</h4>
              <p>Consultorios</p>
              <a href="{{asset('img/portfolio/instalaciones3.PNG')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Consultorio médico infantil de COLPOMED"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-otros">
            <img src="{{asset('img/portfolio/otros3.png')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Noticias</h4>
              <p>COLPOMED</p>
              <a href="{{asset('img/portfolio/otros3.png')}}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="Noticias"><i class="bx bx-plus"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <span>Razones para elegirnos</span>
          <h2>Razones para elegirnos</h2>
          <p>En COLPOMED tienes los mejores servicios para tener el cuidado de tú salud</p>
        </div>

        <div class="row">
        <style>
          .enviar:hover{
            filter: brightness(1.4);
          }
                    
        </style>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="150">
            <div class="box h-100">
              <h4><i class='bx bx-first-aid bx-fade-down'></i></h4>
              <h3>Servicio Integral</h3>
              <div class="container px-0 px-lg-5 ">
                <p style="text-align:justify;">En Colpomed todos nuestros servicios integrados se complementan para
                  brindarle a nuestros clientes una experiencia médica diferente, cálida y agradable.</p>
              </div>
              <div class="btn-wrap">
                <a href="#" class="btn-buy enviar ">Leer más</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in">
            <div class="box featured h-100">
              <h4><i class='bx bx-clinic bx-fade-up'></i></h4>
              <h3>Instalaciones</h3>
              <div class="container px-0 px-lg-5 ">
                <p style="text-align:justify;">
                  Nuestro sello distintivo marca su diferencia en el mercado al ser un Centro Médico que cuenta con
                  instalaciones modernas, confortables, con normativas de seguridad y diseño estructural en construcción
                  antisísmica.
                </p>
              </div>

              <div class="btn-wrap">
                <a href="#" class="btn-buy">Leer más</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
            <div class="box h-100">
              <h4><i class='bx bx-user-voice bx-fade-down'></i></h4>
              <h3>Profesionalismo</h3>
              <div class="container px-0 px-lg-5 ">

                <p style="text-align:justify;">
                  Nuestro actuar se basa en el respeto, la integridad y ética profesional, nuestro compromiso es
                  brindarle una atención con calidad.
                </p>
              </div>

              <div class="btn-wrap">
                <a href="#" class="btn-buy enviar">Leer más</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <style>



    </style>
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <span>Equipo de trabajo</span>
          <h2>Equipo de trabajo</h2>
          <p>Conoce a todo el personal profesional de COLPOMED</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_1.jpg')}}" alt="">
              <h4>DRA. CECILIA XIMENA CORONEL VILLACRES</h4>
              <span>GERENTE COLPOMED </span>
              <p>
                ESPECIALIDAD GINECOLOGÍA Y OBSTETRICIA.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
                <a href="https://www.linkedin.com/in/ximena-coronel-a82538140?originalSubdomain=ec"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_2.png')}}" alt="">
              <h4>DR. IVÁN ENRIQUE NARANJO LOGROÑO</h4>
              <span>DIRECTOR MÉDICO</span>
              <p>
                ESPECIALIDAD GINECOLOGÍA Y OBSTETRICIA.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
                <a href="https://www.linkedin.com/in/ivan-naranjo-61753a140/?originalSubdomain=ec"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_3.png')}}" alt="">
              <h4>DR. JUAN PABLO HARO ROMERO </h4>
              <span>MÉDICO COLPOMED</span>
              <p>
                ESPECIALIDAD MEDICINA INTERNA​.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_4.jpeg')}}" alt="">
              <h4>DRA. DIANA CAROLINA DAVILA CRUZ</h4>
              <span>MÉDICO COLPOMED</span>
              <p>
                ESPECIALIDAD MEDICINA INTERNA.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_5.png')}}" alt="">
              <h4>DR. ANTHONY ALFONSO NARANJO CORONEL</h4>
              <span>MÉDICO COLPOMED</span>
              <p>
                ESPECIALIDAD MÉDICO CIRUJANO
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
                <a href="https://www.linkedin.com/in/anthony-naranjo-7a102b126/?originalSubdomain=ec
                "><i class="bi bi-linkedin"></i></a>

              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_9.jpeg')}}" alt="">
              <h4>DRA. CRISTINA VALERIA CALDERÓN VALLEJO.</h4>
              <span>MÉDICO COLPOMED</span>
              <p>
                ESPECIALIDAD NUTRICIONISTA DIETISTA.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_8.png')}}" alt="">
              <h4>JENNY DEL CARMEN CHAVEZ</h4>
              <span>EQUIPO COLPOMED</span>
              <p>
                BIOQUÍMICA FARMACÉUTICA.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_6.png')}}" alt="">
              <h4>LIC. ESTEFANIA NICOLE ZABALA ESCOBAR</h4>
              <span>EQUIPO COLPOMED</span>
              <p>
                LICENCIADA EN CIENCIAS DE LA SALUD EN LABORATORIO CLÍNICO HISTOPATOLÓGICO.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member w-100">
              <img src="{{asset('img/team/colpomed_10.jpeg')}}" alt="">
              <h4>ING. STEPHANY JOHANA CAZCO ENRIQUEZ</h4>
              <span>EQUIPO COLPOMED</span>
              <p>
                INGENIERA COMERCIAL.
              </p>
              <div class="social">
                <a href="https://www.facebook.com/Colpomed"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/colpomed/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCVdJTSJolVtqvFXgwBCkOOg"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Team Section -->

    <style>
      @media(min-width:1200px){
        .media{
          padding-left: 0 !important;
        }
        .mediaa{
          padding-right: 0 !important;
        }
      }
      @media(max-width:1200px){
        .media{
          padding: 0 !important;
        }
        .mediaa{
          padding: 0 !important;
        }
      }
    </style>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contáctanos</span>
          <h2>Contáctanos</h2>
        </div>
        <div class="container mb-3">
          <div class="row justify-content-center">
          <div class="col-xl-6 col-12 mb-3 mb-xl-0 media">
            <div class="p-4 info-box" style="border:1px solid #f9f9f905;border-radius:5px;text-align: left;">
              <p class="text-center mb-4" style="color:#777777 !important;"> <strong>LABORATORIO CLÍNICO/INMUNOLÓGICO:</strong> </p>
              <ul class="text-left">
                <li class="text-left">
                  <strong style="color:#777777 !important;">Lunes a Viernes: </strong> 07:00 am - 13:00 pm y 15:00 pm - 18:00pm

                </li>
                <li class="text-left">
                  <strong style="color:#777777 !important;">Sábado:</strong> 08:00 am - 11:00 am

                </li>
              </ul>
            </div>
            </div>
            <div class="col-xl-6 col-12 mediaa" style="padding-right: 0 !important;">
              <div class="p-4 info-box" style="border:1px solid #f9f9f9;border-radius:5px;text-align: left;">
                <p class="text-center mb-4" style="color:#777777 !important;"> <strong>CONSULTAS MÉDICAS </strong> </p>
              <ul class="">
                <li>
                  <strong style="color:#777777 !important;">Lunes a Viernes:</strong> 08:00 am - 12:30 pm  y 15:00 pm - 18:30 pm
  
                </li>
                <li>
                  <strong style="color:#777777 !important;">Sábado:</strong> 08:00 am – 11:00 am  
  
                </li>
              </ul>
            </div>
            </div>

          </div>
        </div>


        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Nuestra Dirección</h3>
              <p>Junín 26-18 y García Moreno. Riobamba, Ecuador</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>colpomed2019@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Número de Contacto</h3>
              <p>+ (03) 2961078</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6 ">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.0317728733839!2d-78.64978167077182!3d-1.6683132593875993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3a96b3c5f864f%3A0x49511b39ce2ab632!2sCOLPOMED%20-%20Centro%20Ginecol%C3%B3gico%20-%20Hospital%20del%20D%C3%ADa!5e0!3m2!1ses!2sec!4v1656179238280!5m2!1ses!2sec"
              width="600" height="450" style="border:0; width: 100%; height: 384px;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>

          <div class="col-lg-6">
            <form action="{{route('home.contactar')}}" method="POST" role="form" class="php-email-form">
				@csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nombres" class="form-control" id="nombre" placeholder="Ingresa tu nombre"
                    required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="correo" id="email" placeholder="Ingresa tu email"
                    required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="asunto" id="subject" placeholder="Asunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="mensaje" rows="6" placeholder="Escribe tu mensaje"
                  required></textarea>
              </div>
              {{-- <style>
                .enviar:hover{
                  filter: brightness(1.4);
                }
              </style> --}}
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center enviar"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>NUTRIDAY</span></strong>. Todos los Derechos Reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Por <a href="https://www.facebook.com/Colpomed/">COLPOMED</a>
      </div>
    </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->

  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->

  <script src="{{asset('js/main.js')}}"></script>

  <!-- END PLUGINS NEEDED FOR THE IMPORTANT MESSAGE MODAL POPUP -->
</body>

</html>