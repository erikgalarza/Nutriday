<!DOCTYPE html>
<html>

	@include('layouts.head')

	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">

			@include('layouts.header')

			<div role="main" class="main">
				<section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" id="section-concept" style="background-size: cover; background-position: center; animation-duration: 750ms; animation-delay: 300ms; animation-fill-mode: forwards;" data-plugin-lazyload data-plugin-options="{'threshold': 500}" data-original="img/bg1.jpg">
					<div class="section-angled-layer-bottom bg-light" style="padding: 8rem 0;"></div>
					<div class="container pt-5 mt-5">
						<div class="row align-items-center pt-3">
							<div class="col-lg-5 mb-5">
								<h5 class="text-primary font-weight-bold mb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-duration="750">BIENVENIDO A</h5>
								<h1 class="font-weight-bold text-12 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="color:#0088cc;" data-appear-animation-duration="750">COLPOMED<span class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600" data-appear-animation-duration="800"><span class="d-inline-block text-primary highlighted-word highlighted-word-rotate highlighted-word-animation-1 alternative-font-3 font-weight-bold text-1 ml-2">EC</span></span></h1>
								<p class="custom-font-size-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" data-appear-animation-duration="750" style="color:#0088cc !important;">Colpomed es un Centro Hospital del dia que brinda servicios de salud y laboratorio clinico. <a href="#intro"  style="color:#0088cc;" data-hash data-hash-offset="120" class="text-color-light font-weight-semibold text-1 d-block"></a></p>
								<a class="video-open lightbox d-block   appear-animation text-color-primary" href="#popup-content-1" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" data-appear-animation-duration="750" data-plugin-options="{'type':'inline'}"><div class="video-open-icon"></div>Video comercial</a>

								<div id="popup-content-1" class="dialog dialog-lg zoom-anim-dialog rounded p-3 mfp-hide mfp-close-out">
									<div style="max-height: 500px; max-width:auto;"  class="embed-responsive embed-responsive-4by3">
										<video width="10%" height="10%" autoplay muted loop controls>
										  	<source src="{{asset('img/logos/colpomedPrincipal.mp4')}}" type="video/mp4">
										</video>
									</div>
								</div>
							</div>
							<div class="col-lg-6 offset-lg-1 mb-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1200" data-appear-animation-duration="750">
								<div class="border-width-10 border-color-light clearfix border border-radius">
									<img style="width:100%;" src="{{asset('img/logos/fondoPrincipal.jpg')}}">
								</div>
							</div>
							<div class="col-md-8 col-lg-6 col-xl-5 custom-header-bar py-4 pr-5 appear-animation z-index-2" data-appear-animation="maskRight" data-appear-animation-delay="1200" data-appear-animation-duration="750">
								<div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1500">
									<div class="star-rating-wrap d-flex align-items-center justify-content-center position-relative text-dark text-5 py-2 mb-2">
										<i class="fas fa-star"></i><i class="fas fa-star ml-1"></i><i class="fas fa-star ml-1"></i><i class="fas fa-star ml-1"></i><i class="fas fa-star ml-1"></i>
									</div>

									<h4 class="position-relative text-center font-weight-bold text-7 line-height-2 mb-0">VALORACIÓN DE OPINIONES</h4>

									<p class="position-relative text-center font-weight-normal mb-1">* Mejorando vidas desde 2015</p>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section id="intro" class="section section-no-border section-angled bg-light pt-0 pb-5 m-0">
					<div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-color-light-scale-1" style="padding: 21rem 0;"></div>
					{{-- <div class="container pb-5" style="min-height: 1000px;">
						<div class="row mb-5 pb-lg-3 counters">
							<div class="col-lg-10 text-center offset-lg-1">
								<h2 class="font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-duration="750" data-plugin-options="{'accY': -200}">The Perfect Template for<br>Beginners or Professionals</h2>
								<p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">YOUR WEBSITE TO <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">A NEW LEVEL</span></p>
								<p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-appear-animation-duration="750">Porto is simply a better choice for your new website design. The template is several years among the most popular in the world, being constantly improved and following the trends of design and best practices of code. Your search for the best solution is over, get your own copy and join tens of thousands of happy customers.</p>
							</div>
							<div class="col-sm-6 col-lg-4 offset-lg-2 counter mb-5 mb-md-0">
								<div class="appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="750" data-appear-animation-duration="750">
									<h3 class="font-weight-extra-bold text-14 line-height-1 mb-2" data-to="80" data-append="+">0</h3>
									<label class="font-weight-semibold negative-ls-1 text-color-dark mb-0">Included Demos</label>
									<p class="text-color-grey font-weight-semibold pb-1 mb-2">600+ HTML FILES</p>
									<p class="mb-0"><a href="#demos" data-hash data-hash-offset="120" class="text-color-primary d-flex align-items-center justify-content-center text-4 font-weight-semibold text-decoration-none">VIEW DEMOS <i class="fas fa-long-arrow-alt-right ml-2 text-4 mb-0"></i></a></p>
								</div>
							</div>
							<div class="col-sm-6 col-lg-4 counter divider-left-border">
								<div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="750" data-appear-animation-duration="750">
									<h3 class="font-weight-extra-bold text-14 line-height-1 mb-2" data-to="35" data-append="K+">0</h3>
									<label class="font-weight-semibold negative-ls-1 text-color-dark mb-0">Websites Using Porto HTML</label>
									<p class="text-color-grey font-weight-semibold pb-1 mb-2">100K+ IN ALL VERSIONS</p>
									<p class="mb-0"><a href="https://themeforest.net/item/porto-responsive-html5-template/4106987" class="text-color-primary d-flex align-items-center justify-content-center text-4 font-weight-semibold text-decoration-none" target="_blank">BUILD WEBSITE <i class="fas fa-long-arrow-alt-right ml-2 text-4 mb-0"></i></a></p>
								</div>
							</div>
						</div>
						<div class="intro row align-items-center justify-content-center justify-content-md-start">
							<div class="col-3 pr-0 pl-3 z-index-2">
								<img src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/intro2.jpg" class="img-fluid border border-width-10 border-color-light box-shadow-3 rounded d-none d-md-block appear-animation" alt="Screenshot 2" data-appear-animation="fadeInUp" data-appear-animation-delay="600">
								<div class="position-absolute d-none d-md-flex align-items-end appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="900" style="bottom: -60px; right: -90px;">
									<span class="arrow hlt" style="margin-right: -70px;"></span>
									<strong class="text-color-dark mb-4 pb-3">modern designs!</strong>
								</div>
							</div>
							<div class="col-11 col-md-9 pl-0 pr-5 pb-5 pb-md-0 mb-5 mb-md-0">
								<div class="intro2 pt-5 pt-md-0 mt-5 mt-lg-0 appear-animation pr-5" data-appear-animation="fadeInUp" data-appear-animation-delay="400"><img src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/intro1.jpg" class="img-fluid box-shadow-3 position-relative z-index-1 rounded" alt="Screenshot 1" style="left: -110px;"></div>
								<div class="intro3 z-index-3 position-absolute appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800" style="top: 20%; right: 4%;">
									<img src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/intro3.jpg" class="img-fluid border border-width-10 border-color-light box-shadow-3 rounded" alt="Screenshot 3">
									<div class="position-absolute d-none d-md-flex align-items-end appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" style="bottom: -135px; right: -20px;">
										<strong class="text-color-dark mb-3">a lot of demos!</strong>
										<span class="arrow hru"></span>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
				</section>

				<section class="section section-no-border section-angled section-dark pb-0 m-0" style="background-repeat: no-repeat; background-color: #0169fe !important;" data-plugin-lazyload data-plugin-options="{'threshold': 500}" data-original="img/landing/reason_bg.png">
					<div class="section-angled-layer-top section-angled-layer-increase-angle bg-color-light-scale-1" style="padding: 4rem 0;"></div>
					<div class="spacer py-md-4 my-md-5"></div>
					<div class="container pt-5 mt-5">
                        <div class="row justify-content-center pt-lg-4" style="font-weight: 500px">
                            <p style="font-size: 30px">Galería de Imágenes</p>
                        </div>
                        <div class="row justify-content-center mt-md-5 mb-4 pt-lg-4">

							<div class="col-lg-11">
								<div class="row justify-content-center">
									<div class="col-10 col-sm-6 col-lg-4 image-box appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">
										<img class="img-fluid" alt="Speed Performance" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/instalacion1.png')}}">

									</div>
									<div class="col-10 col-sm-6 col-lg-4 image-box appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" data-appear-animation-duration="750">
										<img class="img-fluid" alt="Speed Performance" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/instalacion2.png')}}">

									</div>
									<div class="col-10 col-sm-6 col-lg-4 image-box appear-animation my-4" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750">
										<img class="img-fluid" alt="Speed Performance" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/instalacion4.jpg')}}">

									</div>
									<div class="col-10 col-sm-6 col-lg-4 image-box appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" data-appear-animation-duration="750">
										<img class="img-fluid" alt="Speed Performance" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/instalacion3.png')}}">

									</div>
									<div  class="col-10 col-sm-6 col-lg-4 image-box appear-animation mb-5" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" data-appear-animation-duration="750">
										<img class="img-fluid" alt="Speed Performance" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/instalacion5.png')}}">

									</div>


								</div>
							</div>
						</div>
					</div>
				</section>

				{{-- <section class="section section-no-border section-angled bg-color-light-scale-1 m-0">
					<div class="section-angled-layer-top section-angled-layer-increase-angle" style="padding: 5rem 0; background-color: #0169fe;"></div>
					<div class="container py-5 my-5">
						<div class="row align-items-center text-center my-5">
							<div class="col-md-6">
								<h2 class="font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750">Introducing Porto Admin</h2>
								<p class="font-weight-semibold text-primary text-4 fonts-weight-semibold positive-ls-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">ADMIN WITH SAME LOOK FEEL AS THE FRONT-END</p>
								<p class="pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" data-appear-animation-duration="750">Porto Admin integration give you a package of new features to add in the front-end template, such as advanced tables, advanced forms, etc... Also allows you to create the back-end of your site using the same design.</p>
								<a href="https://themeforest.net/item/porto-admin-responsive-html5-template/8539472" class="btn btn-modern btn-gradient btn-rounded btn-px-5 py-3 text-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750" target="_blank">VIEW PORTO ADMIN</a>
								<p class="appear-animation text-3" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">* Porto Admin <strong class="text-dark">is not included</strong> in the front-end and is available for $24.</p>
							</div>
							<div class="col-md-6 py-5">
								<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
									<img class="porto-lz"src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_dots2.png" alt="" width="149" height="142" style="position: absolute; top: -60px; right: -8%;">
								</div>
								<div class="appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="0" data-appear-animation-duration="750">
									<div class="strong-shadow rounded strong-shadow-top-right">
										<img src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_admin.jpg" class="img-fluid border border-width-10 border-color-light rounded box-shadow-3" alt="Porto Admin" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> --}}

				{{-- <section class="section border-0 section-dark section-angled section-angled-reverse section-funnel m-0 position-relative overflow-visible" style="background-image: url(img/lazy.png); background-size: 100%; background-position: top; background-repeat: no-repeat;" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_performance_bg.png">
					<div class="section-angled-layer-top section-angled-layer-increase-angle" style="padding: 5rem 0; background-color: #22252a;"></div>
					<svg version="1.1" viewBox="500 200 600 900" width="1920" height="100%" xmlns="http://www.w3.org/2000/svg" class="background-svg-style-1" style="top: 120px;">
						<defs>
							<filter id="shadow" x="-300%" y="-300%" width="600%" height="600%">
							<feDropShadow dx="0" dy="0" stdDeviation="10 10" flood-color="#08c" radius="10" flood-opacity="1" />
							</filter>
						</defs>
						<path id="svg_17" d="m1644.875212,897.875106l-1684.875221,-0.374889l1.25,-446.250108c-1.25,0.372765 496.124925,24.124892 496.124925,24.124892c0,0 255.000064,-106.250026 253.875257,-106.624912c1.124807,0.374885 129.874839,-2.125116 128.750031,-2.500001c1.124808,0.374885 112.374836,-32.125123 111.250027,-32.500008c1.124809,0.374885 144.874844,21.62489 144.874844,21.62489c0,0 128.750032,-73.750018 127.625222,-74.124903c1.124811,0.374884 133.624844,9.124887 133.624844,9.124887c0,0 108.750027,35.000009 108.750027,35.000009c0,0 178.750045,-125.000031 177.625231,-125.374915" opacity="0.5" stroke-opacity="null" stroke-width="0" stroke="#191b1e" fill="#191b1e" fill-opacity="0.4"/>
						<path id="svg_6" d="m1663.83437,909.61168l-1704.94553,-0.72172l1.11111,-486.66724l648.88966,30.00004l105.55568,-41.11116l126.66682,1.11111l122.22236,-34.44449l126.66682,14.44447c0.49906,0.72171 126.05477,-64.83392 126.05477,-64.83392c0,0 128.88904,4.44445 128.38998,3.72273c0.49906,0.72172 118.27698,28.49953 118.27698,28.49953c0,0 173.33353,-108.88902 172.83447,-109.61073" stroke-opacity="null" stroke-width="0" stroke="#1a1b1f" fill="#1a1b1f" fill-opacity="0.4"/>
						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="250" stroke="#000" ry="3.5" rx="3.5" id="svg_9" cy="453.023736" cx="609.150561" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="2000" stroke="#FFF" r="20" id="svg_9" cy="453.023736" cx="609.150561" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 101.5% 50.4%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500" stroke="#000" ry="3.5" rx="3.5" id="svg_10" cy="411.595173" cx="715.341014" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="250" stroke="#FFF" r="20" id="svg_9" cy="411.595173" cx="715.341014" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 119.2% 45.7%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750" stroke="#000" ry="3.5" rx="3.5" id="svg_11" cy="412.071364" cx="841.05527" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="2000" stroke="#FFF" r="20" id="svg_9" cy="412.071364" cx="841.05527" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 140.1% 45.7%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1000" stroke="#000" ry="3.5" rx="3.5" id="svg_12" cy="378.261847" cx="964.388575" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="250" stroke="#FFF" r="20" id="svg_9" cy="378.261847" cx="964.388575" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 160.7% 42%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1250" stroke="#000" ry="3.5" rx="3.5" id="svg_13" cy="391.595177" cx="1090.102832" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="2000" stroke="#FFF" r="20" id="svg_9" cy="391.595177" cx="1090.102832" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 181.6% 43.5%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1500" stroke="#000" ry="3.5" rx="3.5" id="svg_14" cy="327.706436" cx="1216.769206" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="250" stroke="#FFF" r="20" id="svg_9" cy="327.706436" cx="1216.769206" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 202.8% 36.4%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1750" stroke="#000" ry="3.5" rx="3.5" id="svg_15" cy="332.150871" cx="1346.213343" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="2000" stroke="#FFF" r="20" id="svg_9" cy="332.150871" cx="1346.213343" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 224.3% 36.9%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="2000" stroke="#000" ry="3.5" rx="3.5" id="svg_16" cy="358.26192" cx="1463.43529" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="250" stroke="#FFF" r="20" id="svg_9" cy="358.26192" cx="1463.43529" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 243.8% 39.8%;" />

						<ellipse class="dots appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="2250" stroke="#000" ry="3.5" rx="3.5" id="svg_7" cy="278.817661" cx="1589.546107" stroke-opacity="null" stroke-width="0" fill="#fff"/>
						<circle class="appear-animation" data-appear-animation="dotPulse" data-appear-animation-delay="2000" stroke="#FFF" r="20" id="svg_9" cy="278.817661" cx="1589.546107" stroke-opacity="null" stroke-width="0.2" fill="none" style="transform-origin: 264.6% 30.9%;" />


					</svg>
					<img class="img-fluid position-absolute d-none d-lg-block appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" data-appear-animation-duration="750" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_notebook.png" alt="Performance on Laptop" style="display: block; top: -170px; left: 90px;">
					<div class="container text-center py-5 mb-5">
						<div class="row justify-content-center pb-md-5 mb-md-5">
							<div class="col-md-7 offset-lg-5 pb-md-5 mb-md-5">
								<h2 class="font-weight-bold text-9 appear-animation mb-3" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750">Top Performance</h2>
								<p class="custom-text-color-1 color-inherit mb-4 pb-lg-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">Porto has high performance base, all structure are focusing on performance as main point. Porto speed optimization is super fast compared to other templates.</p>
							</div>
						</div>
						<div class="row align-items-center pb-md-5 mb-md-5">
							<div class="col-12 col-md-7 text-center mt-5">
								<h2 class="font-weight-bold text-7 text-md-6 text-lg-9 pt-5 pt-md-4 mt-5 mb-lg-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750">Works Perfectly on <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-bold"> Any </span> Device!</h2>
								<p class="custom-text-color-1 color-inherit appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">We believe you will face lots of traffic from mobile device users not only from desktop or laptop users. Porto is the best solution for you, works fine on any screen resolutions and mobile devices. Try Porto and see how it works!</p>
							</div>
							<div class="col-5 d-none d-md-block">
								<div class="text-right mr-3 mr-lg-5 ml-auto mb-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600" data-appear-animation-duration="750" style="max-width: 244px;" data-plugin-options="{'accY': -100}">
									<img class="img-fluid" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_iphone.png" width="244" height="228" alt="Performance on Mobile">
								</div>
								<img class="img-fluid appear-animation z-index-1 position-relative" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800" data-appear-animation-duration="750" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_ipad.png" width="437" height="241" alt="Performance on Tablet" style="margin-bottom: -10%">
							</div>
						</div>
					</div>
					<div class="section-funnel-layer-bottom">
						<div class="section-funnel-layer bg-light"></div>
						<div class="section-funnel-layer bg-light"></div>
					</div>
				</section> --}}



				{{-- <section class="section section-angled section-angled-reverse border-0 m-0 bg-dark section-dark" style="background-size: 100%; background-position: top;" data-plugin-lazyload data-plugin-options="{'threshold': 500}" data-original="img/bg_inicio4.jpg">
					<div class="section-angled-layer-top section-angled-layer-increase-angle bg-light" style="padding: 4rem 0;"></div>
					<div class="container py-5 mt-5">
						<div class="row align-items-center mt-4 pt-2">
							<div class="col-lg-6 pr-lg-5 position-relative text-center mb-5 mb-lg-0">
								<img alt="Porto Headers" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_headers.png" class="img-fluid appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300" />
							</div>
							<div class="col-lg-5 text-center px-lg-0">
								<h5 class="text-primary font-weight-semibold positive-ls-2 text-4 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-appear-animation-duration="750">ADVANCED USABILITY-FOCUSED </h5>
								<h2 class="font-weight-bold text-9 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">Headers and Menus</h2>
								<p class="custom-text-color-1 color-inherit appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" data-appear-animation-duration="750">Porto comes with several headers and menus options for you to use on your website. We have created several options always focused on the best user experience to improve your business.</p>
								<p class="custom-text-color-1 color-inherit pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750">Select any of the options we have giver you or create your own.</p>
								<div class="d-flex align-items-center justify-content-center">
									<i class="fa fa-check text-color-primary bg-light rounded-circle p-2 mr-3 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600" data-appear-animation-duration="750"></i>
									<p class="mb-0 line-height-5 ls-0 text-color-light font-weight-semibold appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1300" data-appear-animation-duration="750">Menus, Nav Icons, Search Icons, Mini Cart,<br>Account Items, Search and much more...</p>
								</div>
							</div>
						</div>
					</div>
				</section> --}}

				<section class="section section-funnel border-0 bg-light m-0" style="background-size: 100%; background-repeat: no-repeat; background-position: top;" data-plugin-lazyload data-plugin-options="{'threshold': 500}" data-original="img/landing/half_circle.png">
					{{-- <div class="container text-center pb-5 mt-3 mb-5">
						<h2 class="font-weight-bold text-9 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">Layouts</h2>
						<h5 class="text-primary font-weight-semibold positive-ls-2 text-4 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">GIANT LIBRARY OF VARIATIONS</h5>
						<p class="text-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="550">Giant variety of layouts to create your site with unlimited possibilities.</p>
						<div class="row flex-column flex-lg-row justify-content-center align-items-center my-5">
							<div class="col-8 col-md-5 col-lg-3 image-box mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">
								<div class="image mb-3">
									<img alt="Layouts" width="195" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_layouts1.png" class="position-relative z-index-3 mr-auto" style="width: 67.47%; left: -51px;">
									<img alt="Layouts" width="174" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_layouts3.png" class="position-relative z-index-1 ml-auto" style="width: 60.2%; margin-top: -32%; right: -50px;">
									<img alt="Layouts" width="174" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_layouts3.png" class="position-relative z-index-2 mx-auto" style="width: 60.2%; margin-top: -13%;">
								</div>
								<h4 class="text-dark font-weight-bold pt-2 mb-1">Layouts</h4>
								<p class="fs-md text-3 px-lg-4">Max Width 1200px, 1170px, 1024px,<br> full width, etc...</p>
							</div>
							<div class="col-8 col-md-5 col-lg-3 image-box mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" data-appear-animation-duration="750">
								<div class="image mb-3">
									<img alt="Sidebars" width="172" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sidebars1.png" class="position-relative z-index-1 ml-auto" style="right: -33px;">
									<img alt="Sidebars" width="172" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sidebars2.png" class="position-relative z-index-2" style="left: -19px; margin-top: -32%;">
									<img alt="Sidebars" width="172" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sidebars3.png" class="position-relative z-index-3 ml-auto" style="right: -20px; margin-top: -13%;">
								</div>
								<h4 class="text-dark font-weight-bold pt-2 mb-1">Sidebars</h4>
								<p class="fs-md text-3 px-lg-4">Sidebar can be set to be on left, right, both or even disabled.</p>
							</div>
							<div class="col-8 col-md-5 col-lg-3 image-box appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750">
								<div class="image mb-3">
									<img alt="Sliders" width="142" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sliders1.png" class="position-relative z-index-1" style="left: -31px;">
									<img alt="Sliders" width="142" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sliders2.png" class="position-relative z-index-2 ml-auto" style="right: -60px; margin-top: -31%">
									<img alt="Sliders" width="142" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sliders3.png" class="position-relative z-index-3 ml-auto" style="margin-right: 15%; margin-top: -41%;">
									<img alt="Sliders" width="142" height="161" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/porto_sliders4.png" class="position-relative z-index-4" style="left: -50px; margin-top: -35.67%;">
								</div>
								<h4 class="text-dark font-weight-bold pt-2 mb-1">Sliders</h4>
								<p class="fs-md text-3 px-lg-4">You can set several different types of sliders, boxed, full, grid, etc..</p>
							</div>
						</div>
					</div> --}}
					<div class="section-funnel-layer-bottom">
						<div class="section-funnel-layer bg-color-light-scale-1"></div>
						<div class="section-funnel-layer bg-color-light-scale-1"></div>
					</div>
				</section>

				<section class="section section-funnel position-relative z-index-3 border-0 pt-0 m-0">
					<div class="container pb-5 mb-5">
						<h2 class="fotn-weight-extra-bold mb-3 text-center">
							<span class="font-weight-bold text-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">Razones para elegirnos</span>
						</h2>

						<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="850" data-appear-animation-duration="850">


							<div class="owl-carousel carousel-center-active-item-2 nav-style-4 mb-4 pb-3" data-plugin-options="{'items': 1, 'loop': true, 'nav': true, 'dots': false}">
								<div>
									<div class="d-flex flex-column flex-md-row justify-content-between mb-4">
										<div class="author">
											<h4 class="text-5 mb-0">SERVICIO INTEGRAL</h4>
										</div>

									</div>
									<p class="mb-0">En Colpomed todos nuestros servicios integrados se complementan para brindarle a nuestros clientes una experiencia médica diferente, cálida y agradable</p>
								</div>
								<div>
									<div class="d-flex flex-column flex-md-row justify-content-between mb-4">
										<div class="author">
											<h4 class="text-5 mb-0">Instalaciones</h4>
										</div>
									</div>
									<p class="mb-0">
										Nuestro sello distintivo marca su diferencia en el mercado al ser un Centro Médico que cuenta con instalaciones modernas, confortables, con normativas de seguridad y diseño estructural en construcción antisísmica.					</p>
								</div>
								<div>
									<div class="d-flex flex-column flex-md-row justify-content-between mb-4">
										<div class="author">
											<h4 class="text-5 mb-0">Profesionalismo</h4>
										</div>
									</div>
									<p class="mb-0">
										Nuestro actuar se basa en el respeto, la integridad y ética profesional, nuestro compromiso es brindarle una atención con calidad.

									</p>

							</div>
						</div>

					</div>
					<div class="section-funnel-layer-bottom">
						<div class="section-funnel-layer bg-light"></div>
						<div class="section-funnel-layer bg-light"></div>
					</div>
				</section>

				<section id="support" class="section section-angled bg-light border-0 m-0 position-relative z-index-3 pt-0">
					<div class="container pb-5 mb-5">
						<div class="row align-items-center mb-5">
							<div class="col-lg-6 pr-xl-5 mb-5 mb-lg-0">
								<h2 class="font-weight-bold text-9 mb-1">¿Qué pruebas diagnósticas realizamos para la COVID-19?</h2>


								<div class="d-flex align-items-center border border-top-0 border-right-0 border-left-0 pb-4 mb-4">
									<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 mr-3"></i>
									<p class="mb-0" style="text-align:justify;"><b class="text-color-dark">PCR</b> <br> PCR (Reacción en Cadena de la Polimerasa) para detección SARS-CoV-2 en muestras nasofaríngeas y orofaríngeas. El resultado de la prueba PCR, es positivo o negativo, e indica si en el momento actual la persona está infectada por COVID-19.</p>
								</div>
								<div class="d-flex align-items-center border border-top-0 border-right-0 border-left-0 pb-4 mb-4">
									<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 mr-3"></i>
									<p class="mb-0" style="text-align:justify;"><b class="text-color-dark">QUIMIOLUMINISCENCIA (CLIA) </b><br>Los ensayos por CLIA parten del mismo fundamento técnico que los ensayos por ELISA con la diferencia de que en los CLIA la enzima que se acopla al anticuerpo cataliza una reacción quimioluminiscente con la emisión de fotones, midiéndose la producción de luz.</p>
								</div>

							</div>
							<div class="col-lg-4 offset-lg-2">
								<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
									<img class="img-fluid" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/covid2.jpg')}}" alt="" style="position: absolute; bottom: -2%; left: -43%; transform: rotate(90deg)">
								</div>
								<img alt="Porto Support" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/support_login.jpg" class="img-fluid border border-width-10 border-color-light rounded box-shadow-3 ml-5 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200" style="width: 590px; max-width: none;">
								<img alt="Porto Documentation" src="img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="{{asset('img/logos/covid1.jpg')}}" class="img-fluid  rounded box-shadow-3 position-absolute appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="700" style="left: -100px; bottom: 50px;">
							</div>
						</div>
					</div>
					<div class="section-angled-layer-bottom section-angled-layer-increase-angle" style="padding: 4rem 0; background: #222529;"></div>
				</section>

				<section class="section bg-dark section-dark border-0 m-0">
					<div class="container">
						<div class="text-center mb-5">
							<h5 class="font-weight-semibold positive-ls-2 text-4 text-primary mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-appear-animation-duration="750">Disponemos de gran cantidad de opciones</h5>
							<h2 class="font-weight-bold text-9 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">Servicios activos de COLPOMED</h2>
							<p class="custom-text-color-1 color-inherit appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="850" data-appear-animation-duration="750">Contamos con una Unidad de Patología Cervical  y  Video Colposcopia – Vulvoscopia- Vaginoscopia – Androscopia para el diagnóstico y tratamiento de la patología genital y de las  lesiones del cuello uterino y  vacunatorio para la  prevención del  cáncer cervical; Unidad de Ginecología Estética y Regenerativa con tecnología de avanzada y tratamiento ambulatorio con  Radiofrecuencia Fraccionada Microablativa FRAXX  para el tensado y rejuvenecimiento vaginal, incontinencia urinaria y síndrome urogenital de la menopausia..</p>
						</div>
						<div class="row pb-5" style="display:flex; justify-content:space-evenly">
							<div class="d-flex col-sm-6 col-lg-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750">
								<div class=" justify-content-center align-items-center text-center bg-color-dark-scale-2 rounded p-5">
									<i class="icon-bg icon-feature-1 mt-4"></i>
									<h4 class="text-4 mb-2">LABORATORIO</h4>
									<p class="custom-text-color-1 text-3 color-inherit mb-0">Contamos con un área de pre analítica para recepción y toma de muestras, un área para analítica de inmunología, test hormonales y marcadores tumorales, pruebas de Biología molecular, Bioquímica Clínica, Serología y Hematología, Uroanálisis, Coproanálisis, Bacteriología con cámara aislada para siembra y preparación de cultivos.</p>
								</div>
							</div>
							<div class="d-flex text-center col-sm-6 col-lg-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">
								<div class=" align-item-center bg-color-dark-scale-2 rounded p-5">
									<i class="icon-bg icon-feature-2 mt-4"></i>
									<h4 class="text-4 mb-2">CENTRO DE INFUSIONES DE VITAMINA C</h4>
									<p class="custom-text-color-1 text-3 color-inherit mb-0">En Colpomed, brindamos una experiencia médica diferente, cálida y agradable; con un servicio de terapias naturales que se disponen en el Centro de Medicina Funcional.</p>
								</div>
							</div>
							<div class="d-flex text-center col-sm-6 col-lg-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">
								<div class="bg-color-dark-scale-2 rounded p-5">
									<i class="icon-bg icon-feature-3 mt-4"></i>
									<h4 class="text-4 mb-2">FARMACIA</h4>
									<p class="custom-text-color-1 text-3 color-inherit mb-0">Proporcionamos el servicio de Farmacia Interna a todos los usuarios de Consulta externa en Medicina General y de Especialidades.</p>
								</div>
							</div>

						</div>
					</div>
				</section>





				<section class="section bg-color-dark-scale-2 border-0 m-0 py-4">
					<div class="container">
						<div class="row">
							<div class="col">
								<ul class="list list-unstyled list-inline d-flex align-items-center justify-content-center flex-column flex-lg-row mb-0">
									<li class="list-inline-item custom-text-color-1 color-inherit mb-lg-0 text-2 pr-2">Porto Versions:</li>
									<li class="list-inline-item mb-lg-0"><a href="https://themeforest.net/item/porto-admin-responsive-html5-template/8539472?s_rank=2" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">ADMIN HTML</a></li>
									<li class="list-inline-item mb-lg-0"><a href="https://themeforest.net/item/porto-ecommerce-shop-template/22685562" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">SHOP HTML</a></li>
									<li class="list-inline-item mb-lg-0"><a href="https://themeforest.net/item/porto-responsive-wordpress-ecommerce-theme/9207399" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">WORDPRESS</a></li>
									<li class="list-inline-item mb-lg-0"><a href="https://themeforest.net/item/porto-ultimate-responsive-magento-theme/9725864" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">MAGENTO</a></li>
									<li class="list-inline-item mb-lg-0"><a href="https://themeforest.net/item/porto-ultimate-responsive-shopify-theme/19162959" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">SHOPIFY</a></li>
									<li class="list-inline-item mb-lg-0"><a href="https://themeforest.net/item/porto-responsive-drupal-7-theme/5219986" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">DRUPAL</a></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			</div>
			@include('layouts.footer')
		</div>

		@include('layouts.scripts')

	</body>
</html>
