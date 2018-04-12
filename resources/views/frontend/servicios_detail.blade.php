@extends ('frontend.layaut')
 
@section('title', "Capacitación -")

@section('tit-cabecera', "CAPACITACIÓN Y PERFECCIONAMIENTO DEL CAPITAL HUMANO")

@section ('cabecera')
	@include ('frontend.cabecera')
@endsection

@section ('content')


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row align-items-start">
					<div class="col-lg-12 col-md-12 py-3 px-4 border-bottom" >
						<div class="row align-items-center">
							<div class="col-lg-12 pl-lg-5 border-bottom-1">
								<h3 class="font-italic pt-3 pt-lg-0 ">{{ $servicio_detail->titulo }}</h3>
								
									<?= $servicio_detail->descripcion; ?>

								
								
									<?= $servicio_detail->detalles; ?>
								
							</div>
							<hr>
							<div class="col-lg-12">
								
								<ul id="lightgallery" class=" col cards cards-galery text-center list-unstyled row">

									
									<li class=" card py-2" data-responsive="{{ asset('public/img/servicios/'.$servicio_detail->imagen) }}" data-src="{{ asset('img/servicios/'.$servicio_detail->imagen) }}" data-sub-html="{{ $servicio_detail->titulo }}" {{-- data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1" --}}>
									<a href="">
				                      <img src="{{ asset('img/servicios/'.$servicio_detail->imagen) }}" alt="{{ $servicio_detail->titulo }}" class="img-fluid">
				                    </a>

					                @foreach($imagenes as $imagen)
					                <li class=" card py-2" data-responsive="{{ asset('img/servicios/'.$imagen->url) }}" data-src="{{ asset('img/servicios/'.$imagen->url) }}" data-sub-html="{{ $imagen->nombre }}" {{-- data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1" --}}>
					                    <a href="">
					                        <img class="img-fluid" src="{{ asset('img/servicios/'.$imagen->url) }}" alt="{{ $imagen->nombre }}">
					                    </a>
					                </li>
					                @endforeach

					            </ul>
							</div>

						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/lightgallery.js') }}"></script>
         <script src="{{ asset('js/minigrid.min.js') }}"></script>
        <script>
            lightGallery(document.getElementById('lightgallery'));
        </script>

    <script>

    (function(){
        var grid;
        function init() {
            grid = new Minigrid({
              container: '.cards',
              item: '.card',
              gutter: 18
            });
            grid.mount();
        }
  
      // mount
      function update() {
        grid.mount();
      }

    document.addEventListener('DOMContentLoaded', init);
    window.addEventListener('resize', update);

    })();

    </script>

@endsection
