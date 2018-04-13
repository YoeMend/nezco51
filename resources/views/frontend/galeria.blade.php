@extends ('frontend.layaut')
@section('title', "Galeria -")

@section('tit-cabecera')


@section ('content')

	<div class="container">
		<div class="row">
			@foreach($galerias as $galeria)
                          
			<div class=" col-12 col-lg-4 col-md-6 py-3">
				<a class="item-g" href="galeria_detail/3/{{ $galeria->id }}">
					<div class="h-15em overflow-hidden bg-img" style="background-image: url('{{ asset('img/galeria/'.$galeria->zurl ) }}')">
						<div class="item-galery">
							<div class="row text-center px-3 pt-5">
								<div class="col">
									<h3 class="c-white font-italic ">{{ $galeria->nombre }}</h3>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>

@endsection