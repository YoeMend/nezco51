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
		<h1><i class="fa fa-dashboard"></i> Crear Categoría de Documentos</h1>

	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item active"><a href="{{ route('categoriadocumento.index') }}">Atrás</a></li>
	</ul>
</div>
<div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
				<form class="form-horizontal" role="form" action="{{ route('categoriadocumento.store') }}" method="POST">
                 {{ csrf_field() }}
					<div class="form-group">
						<label class="control-label">Descripción</label>
						<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción" data-toggle="tooltip" data-placement="bottom" title="Descripción de la Categoría" required="">
						
					</div>
					<div class="tile-body">
						<label class="control-label">Estatus</label>
						<div class="col-sm-4">
							<select id="estatus" class="form-control">	
                                <option value="">Seleccione Estatus</option>
								<option value="Activo">Activo</option>
								<option value="Desactivado">Desactivado</option>
							</select>
						</div>
					</div>
					<div class="tile-footer">
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('categoriadocumento.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>



					</div>

				</form>
			</div>
		</div>
	</div>

</div>

@endsection