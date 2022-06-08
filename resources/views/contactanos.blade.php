<!DOCTYPE html>
<html>
@include('layouts.head')
	<body>

		<div class="body">
			@include('layouts.header2')

			<div role="main" class="main">

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				{{-- <div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div> --}}

				<div class="container">

					<div class="row py-4">
						<div class="col-lg-6">

							<div class="overflow-hidden mb-1">
								<h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contactanos</strong></h2>
							</div>
							<div class="overflow-hidden mb-4 pb-3">
								<p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"></p>
							</div>

							<form class="contact-form" action="{{route('home.contactar')}}" method="POST">
                                @csrf
 								<div class="contact-form-success alert alert-success d-none mt-4">
									<strong>Success!</strong> Your message has been sent to us.
								</div>
							
								<div class="contact-form-error alert alert-danger d-none mt-4">
									<strong>Error!</strong> There was an error sending your message.
									<span class="mail-error-message text-1 d-block"></span>
								</div>
								
								<div class="form-row">
									<div class="form-group col-lg-6">
										<label class="required font-weight-bold text-dark text-2">Nombres</label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" name="nombres" class="form-control @error('nombres') is-invalid @enderror"  >
									
                                        @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                 

									<div class="form-group col-lg-6">
										<label class="required font-weight-bold text-dark text-2">Correo electrónico</label>
										<input  value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control @error('correo') is-invalid @enderror" name="correo" >
									
                                        @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="font-weight-bold text-dark text-2">Asunto</label>
										<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control @error('asunto') is-invalid @enderror" name="asunto" >
									
                                        @error('asunto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="required font-weight-bold text-dark text-2">Mensaje</label>
										<textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control @error('mensaje') is-invalid @enderror" name="mensaje" ></textarea>
                                        @error('mensaje')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                   
                                </div>
								<div class="form-row">
									<div class="form-group col">
										<input type="submit" value="Enviar mensaje" class="btn btn-primary btn-modern" data-loading-text="Loading...">
									</div>
								</div>
							</form>

						</div>
						<div class="col-lg-6">

							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
								<h4 class="mt-2 mb-1">Nuestras <strong>oficinas</strong></h4>
								<ul class="list list-icons list-icons-style-2 mt-2">
									<li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Dirección:</strong> Junin 26-18 y García Moreno 060150 Riobamba-Ecuador</li>
									<li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Teléfono:</strong> (593) 99 143 8810</li>
									<li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:colpomed2019@gmail.com">colpomed2019@gmail.com</a></li>
								</ul>
							</div>

							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
								<h4 class="pt-5">Horarios de <strong>atención</strong></h4>
								<ul class="list list-icons list-dark mt-2">
									<li><i class="far fa-clock top-6"></i> Lunes - Viernes - 7am a 13pm y 15pm a 19pm</li>
									<li><i class="far fa-clock top-6"></i> Sabados 8am a 12pm</li>
									<li><i class="far fa-clock top-6"></i> Domingos - Cerrado</li>
								</ul>
							</div>

						
						</div>

					</div>

				</div>

			</div>

			<section class="call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-lg-9">
							<div class="call-to-action-content">
								<h2 class="font-weight-normal text-6 mb-0">Porto is <strong class="font-weight-extra-bold">everything</strong> you need to create an <strong class="font-weight-extra-bold">awesome</strong> website!</h2>
								<p class="mb-0">The <strong class="font-weight-extra-bold">Best</strong> HTML Site Template on ThemeForest</p>
							</div>
						</div>
						<div class="col-md-3 col-lg-3">
							<div class="call-to-action-btn">
								<a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="top: -40px; left: 70%;"></span>
							</div>
						</div>
					</div>
				</div>
			</section>

			@include('layouts.footer')
		</div>

		@include('layouts.scripts')

		{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
		<script>

			// Map Markers
			var mapMarkers = [{
				address: "New York, NY 10017",
				html: "<strong>New York Office</strong><br>New York, NY 10017",
				icon: {
					image: "{{asset('img/pin.png')}}",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];

			// Map Initial Location
			var initLatitude = 40.75198;
			var initLongitude = -73.96978;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: (($.browser.mobile) ? false : true),
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 11
			};

			var map = $('#googlemaps').gMap(mapSettings);

			// Map text-center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$('#googlemaps').gMap("centerAt", options);
			}

		</script> --}}

		// <script>
		// 	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		// 	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		// 	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		// 	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		// 	ga('create', 'UA-12345678-1', 'auto');
		// 	ga('send', 'pageview');
		// </script>
		 

	</body>
</html>
