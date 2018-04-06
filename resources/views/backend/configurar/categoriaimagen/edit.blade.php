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
            <li><a class="ajax-link" href="{{ route('categoriaimagen.index') }}">Atrás</a></li>
        </ol>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-table"></i>
                    <span>Editar Categoría de Imagenes</span>
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
                <form class="form-horizontal" role="form" action="{{ route('categoriaimagen.update', ($categoriaimagen->id)) }}" method="POST">
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" id="descripcion" name="descripcion" value="{{ $categoriaimagen->descripcion }}" class="form-control" placeholder="Descripción" data-toggle="tooltip" data-placement="bottom" title="Descripción de la Categoría">
                        </div>
                    </div>
                    <div class="form-group has-warning has-feedback">
                        <label class="col-sm-2 control-label">Estatus</label>
                        <div class="col-sm-4">
                            <select id="estatus" class="form-control">  
                                <option value="">Seleccione Estatus</option>
                    <option value="Activo"@if(old('estatus', $categoriaimagen->estatus)=='Activo') selected @endif>Activo</option>
                    <option value="Desactivado"@if(old('estatus', $categoriaimagen->estatus)=='Desactivado') selected @endif>Desactivado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <a href="{{ route('categoriaimagen.index') }}" class="btn btn-default btn-label-left">
                           
                            <span><i class="fa fa-clock-o txt-danger"></i></span>
                                Cancelar
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary btn-label-left">
                            <span><i class="fa fa-clock-o"></i></span>
                                Guardar
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

@endsection