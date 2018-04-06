	{{-- VIDEO --}}
	<div class=" h-100">
		
		<div class="container sticky-top top-fijo mb-2 ">
			<div class="logo_home col-5 col-lg-2 mt-5">
				<img src="{{ asset('images/LogoNezco.svg') }}" alt="">
			</div>
		</div>
		<div>
			<div class="svg_video"></div>
			<video src="{{ asset('video/principal/'.$video->url) }}" class="video_home"  loop muted preload autoplay poster="{{-- imagen cuando el video tarda en cargar --}}"></video>
		</div>
		
	</div>
	{{-- END VIDEO --}}