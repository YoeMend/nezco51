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
		<h1><i class="fa fa-dashboard"></i> Empresas</h1>

	</div>
	<ul class="app-nav">
		<form name="form1" method="get" action="{{route ('empresa.index')}}" accept-charset="UTF-8"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<li class="app-search">
				<input id="valor" name="valor" class="app-search__input" type="search" placeholder="Buscar">
				<button type="submit" class="app-search__button" name="boton" id="boton"><i class="fa fa-search"></i></button>
			</li>
			
		</form>
    </ul>
    <ul class="app-breadcrumb breadcrumb side">
    	<li class="breadcrumb-item active">

    		<a href="{{ route('empresa.create') }}" title="Crear" class="uk-icon-link" uk-icon="icon: file" contextmenu="Crear Registro"><i class="fa fa-file-o "></i }></a></li>

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
							<th>Id</th>
							<th>Nombre</th>
							<th>Estatus</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($empresa as $cate)
						<tr>
							<td>
							<a href="{{ route('empresa.show',$cate->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
							<a href="{{ route('empresa.edit',$cate->id) }}" title="Editar" class="uk-icon-link" uk-icon="icon: pencil" contextmenu="Editar Registro"><i class="fa fa-edit "></i }></a> 
							<a href="{{ route('empresa.destroy',$cate->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash"><i class="fa fa-trash " onclick="return confirm('¿Seguro desea eliminar este registro?')"></i }></a>
							<?php 
							$categoria=2;
							$tipo=$cate->id;
							$url = 'videosb/index/'.$categoria.'/'.$tipo;?>
							<a href="{{ url($url) }}" title="Ver Galería de Videos" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Galería de Videos"><i class="fa fa-file-video-o "></i }></a>

                              </td>
											<td>{{ $cate->id }}</td>
											<td><?php echo wordwrap($cate->nombre,100,"<br />"); ?></td>
											<td>{{ $cate->estatus }}</td>
										</tr>
					@endforeach
				</tbody>
				</table>
			<div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
			<?php echo $empresa->render(); ?>
            </div>
			</div>
		</div>
	</div>

</div>
@endsection