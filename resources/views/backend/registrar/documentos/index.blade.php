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
		<h1><i class="fa fa-dashboard"></i> Documentos</h1>

	</div>
	<ul class="app-nav">
		<form name="form1" method="get" action="{{route ('documento.index')}}" accept-charset="UTF-8"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<li class="app-search">
				<input id="valor" name="valor" class="app-search__input" type="search" placeholder="Buscar">
				<button type="submit" class="app-search__button" name="boton" id="boton"><i class="fa fa-search"></i></button>
			</li>
			
		</form>
    </ul>
    <ul class="app-breadcrumb breadcrumb side">
    	<li class="breadcrumb-item active">

    		<a href="{{ route('documento.create') }}" title="Crear" class="uk-icon-link" uk-icon="icon: file" contextmenu="Crear Registro"><i class="fa fa-file-o "></i }></a></li>

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
							<th>Categoria</th>
							<th>Público</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($documento as $cate)
						<tr>
							<td>
							<a href="{{ route('documento.show',$cate->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
							<a href="{{ route('documento.edit',$cate->id) }}" title="Editar" class="uk-icon-link" uk-icon="icon: pencil" contextmenu="Editar Registro"><i class="fa fa-edit "></i }></a> 
							<a href="{{ route('documento.destroy',$cate->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash"><i class="fa fa-trash " onclick="return confirm('¿Seguro desea eliminar este registro?')"></i }></a>
							<?php 
							$categoria=1;
							$tipo=$cate->id;
							$url = 'archivo/index/'.$tipo;?>
							<a href="{{ url($url) }}" title="Ver Archivador" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Archivador"><i class="fa fa-file-pdf-o "></i }></a>
                            				
										</td>
											<td>{{ $cate->id }}</td>
											<td><?php echo wordwrap($cate->nombre,100,"<br />"); ?></td>
											<td>{{ $cate->descat }}</td>
											<td>{{ $cate->publico }}</td>
										</tr>
					@endforeach
				</tbody>
				</table>
			<div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
			<?php echo $documento->render(); ?>
            </div>
			</div>
		</div>
	</div>

</div>
@endsection