{{-- CABECERA --}}
<div class="continer-fluid h-35 h-25-md">
	
	<div class="position-absolute h-100 w-100 bg-fixed z-index-90 ps-top-0 ps-left-0 cabecera " style="background-image: url('{{ asset('img/principal/'.$_SESSION['banner']) }}');">
		<div class="svg_video"></div>
		<div class="container">
			<div class="row justify-content-between pt-5 pr-3">
				<div class="logo-sec col-5 col-lg-2 col-md-3 my-2 py-3">
					<img src="{{ asset('public/img/LogoNezco.svg') }}" alt="">
				</div>
				<div class="col-12 col-lg-8 col-md-8 text-right c-white text-sh ">
					<h1 class="ps-top-xs-40px tit position-absolute ps-bottom-0 ps-right-0">@yield ('tit-cabecera')</h1>
				</div>
			</div>
		</div>

	</div>
</div>

