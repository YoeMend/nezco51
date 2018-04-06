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
		<h1><i class="fa fa-dashboard"></i> Galeria de Imagenes</h1>
		<p>{{ $texto }}</p>

	</div>


	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><a href="{{ route($atras) }}">Atrás</a><i class="fa fa-home fa-lg"></i></li>
		<?php $url = 'imagenes/create/'.$categoria.'/'.$tipo;?>
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
							<th align="center">Público</th>
							<th align="center">Miniatura</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($imagenes as $cate)
						<tr>
							<td width="2%">
							<?php $url = 'imagenes/show/'.$categoria.'/'.$tipo.'/'.$cate->id;?>	
							<a href="{{ url($url) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
							<?php $url = 'imagenes/edit/'.$categoria.'/'.$tipo.'/'.$cate->id;?>	
							<a href="{{ url($url) }}" title="Editar" class="uk-icon-link" uk-icon="icon: pencil" contextmenu="Editar Registro"><i class="fa fa-edit "></i }></a> 
							
							<a href="{{ route('imagenes.destroy',$cate->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash"><i class="fa fa-trash " onclick="return confirm('¿Seguro desea eliminar este registro?')"></i }></a>
								
										</td>
											<td width="5%" >{{ $cate->nombre }}</td>
											<td width="5%">{{ $cate->url }}</td>
											<td width="2%">{{ $cate->publico }}</td>
					<td width="2%" align="center">
					<?php if ($cate->categoria_imagen_id==1): ?>
						<p><img src="{{ asset('img/productos/'.$cate->url) }}" style="max-width: 50%"></p>	
					<?php endif ?>
					<?php if ($cate->categoria_imagen_id==2): ?>
						<p><img src="{{ asset('img/servicios/'.$cate->url) }}" style="max-width: 50%"></p>	
					<?php endif ?>
					<?php if ($cate->categoria_imagen_id==3): ?>
						<p><img src="{{ asset('img/galeria/'.$cate->url) }}" style="max-width: 50%"></p>	
					<?php endif ?>
					<?php if ($cate->categoria_imagen_id==4): ?>
						<p><img src="{{ asset('img/empresa/'.$cate->url) }}" style="max-width: 50%"></p>	
					<?php endif ?>
												

											</td>
										</tr>
					@endforeach
				</tbody>
				</table>
			<div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
			<?php echo $imagenes->render(); ?>
            </div>
			</div>
		</div>
	</div>

</div>
@endsection