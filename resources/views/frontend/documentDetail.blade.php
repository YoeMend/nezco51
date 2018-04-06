@extends ('frontend.layaut')

@section('title', "Leyes -")

@section('tit-cabecera')

@section ('cabecera')
	@include ('frontend.cabecera')
@endsection

@section ('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="tit">{{ $documentos->nombre }}</h2>
			</div>
			<div class="col-12">
				<p>
					{{ $documentos->descripcion }}
				</p>
			</div>
		</div>
	</div>

@endsection
