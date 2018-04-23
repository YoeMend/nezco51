@extends ('frontend.layaut')
 
@section('title', "Capacitación -")

@section('tit-cabecera', "CAPACITACIÓN Y PERFECCIONAMIENTO DEL TALENTO HUMANO")

@section ('cabecera')
	@include ('frontend.cabecera')
@endsection

@section ('content')


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row align-items-start">
					
					@foreach($servicios as $servicio)

					<div class="col-lg-12 col-md-6 py-3 px-4 border-bottom" >
						<div class="row align-items-center">
							<div class="col-lg-4 h-15em overflow-hidden bg-img" style="background-image: url('{{ asset('img/servicios/'.$servicio->imagen) }}');">
							</div>
							<div class="col-lg-8 pl-lg-5">
								<h3 class="font-italic pt-3 pt-lg-0 ">{{ $servicio->titulo }}</h3>
								
								<?php
									 
									$length = 600;
								    $stringDisplay = substr($servicio->descripcion, 0, $length);

								    if (strlen($stringDisplay) > $length - 1) {
								    	 $stringDisplay.="...";
								    }

									echo $stringDisplay; 
								?>
								
								<div class="col text-right pt-3 ">
						   			<a class="font-italic enlaces " href="servicios_detail/2/{{ $servicio->id }}">Ver más</a>
						    	</div>
							</div>

						</div>
					</div>

					@endforeach
					

					
					
					
				
					
				</div>
			</div>

		</div>
	</div>

@endsection
