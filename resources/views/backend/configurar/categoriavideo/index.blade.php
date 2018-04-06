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

  <div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="{{ route('categoriavideo.create') }}">Crear</a></li>
		</ol>
	</div>

</div>
<div class="row">
		<div class="col-xs-12 col-sm-6">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>Categoría de Video</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<p></p>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Descripción</th>
							<th>Estatus</th>
							<th>Registro</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categoriavideo as $cate)
						<tr>
							<td>
<a href="{{ route('categoriaproducto.show',$cate->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
 <a href="{{ route('categoriaproducto.edit',$cate->id) }}" title="Editar" class="uk-icon-link" uk-icon="icon: pencil" contextmenu="Editar Registro"><i class="fa fa-edit "></i }></a> 
 <a href="{{ route('categoriaproducto.destroy',$cate->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash"><i class="fa fa-trash " onclick="return confirm('¿Seguro desea eliminar este registro?')"></i }></a>
								{{ $cate->id }}</td>
							<td>{{ $cate->descripcion }}</td>
							<td>{{ $cate->estatus }}</td>
							<td>{{ $cate->created_at }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<?php echo $categoriavideo->render(); ?>
			</div>
		</div>
	</div>

</div>

@endsection