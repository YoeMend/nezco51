@extends ('layouts.header')
@section('content')
<div class="row">
	<div class="col-lg-10">
		@if($notificacion=Session::get('notificacion'))
		<div class="alert alert-success">{{ $notificacion }}</div>
		@endif
		@if($notificacion_error=Session::get('notificacion_error'))
		<div class="alert alert-danger">{{ $notificacion_error }}</div>
		@endif
	</div>
</div>


<div class="app-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Archivador de Documentos</h1>
		<p>{{ $texto }}</p>

	</div>


	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><a href="{{ route($atras) }}">Atrás</a><i class="fa fa-home fa-lg"></i></li>
		<?php $url = 'archivo/create/'.$iddocumento;?>
		<li class="breadcrumb-item active"><a href="{{ url($url) }}">Crear</a></li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<table class="table table-hover table-bordered" id="sampleTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Url</th>
							<th>Público</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($archivo as $cate)
						<tr>
							<td>
							<a href="{{ route('archivo.show',$cate->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
							<a href="{{ route('archivo.destroy',$cate->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash"><i class="fa fa-trash " onclick="return confirm('¿Seguro desea eliminar este registro?')"></i }></a>
								
										</td>
											<td>{{ $cate->nombre }}</td>
											<td>{{ $cate->url }}</td>
											<td>{{ $cate->publico }}</td>
										</tr>
					@endforeach
				</tbody>
				</table>
			<div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
			<?php echo $archivo->render(); ?>
            </div>
			</div>
		</div>
	</div>

</div>
@endsection