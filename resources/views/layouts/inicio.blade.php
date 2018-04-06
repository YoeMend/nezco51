  @extends ('layouts.header')
  @section('content')

  <div class="row">
  	<div class="col-md-6 col-lg-3">
  		<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
  			<div class="info">
  				<h4>Productos</h4>
  				<p><b>{{ $_SESSION["cantidad"] }}</b></p>
  			</div>
  		</div>
  	</div>
  	<div class="col-md-6 col-lg-3">
  		<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
  			<div class="info">
  				<h4>Servicios</h4>
  				<p><b>{{ $_SESSION["cantserv"] }}</b></p>
  			</div>
  		</div>
  	</div>
  	<div class="col-md-6 col-lg-3">
  		<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
  			<div class="info">
  				<h4>Documentos</h4>
  				<p><b>{{ $_SESSION["cantdoc"] }}</b></p>
  			</div>
  		</div>
  	</div>
  	<div class="col-md-6 col-lg-3">
  		<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
  			<div class="info">
  				<h4>Empresas</h4>
  				<p><b>{{ $_SESSION["cantemp"] }}</b></p>
  			</div>
  		</div>
  	</div>
  </div>
  <div class="row">
  	<div class="col-md-6">
  		<div class="tile">
  			<h3 class="tile-title">Productos</h3>


  				<table class="table table-hover table-bordered" id="sampleTable">
  					<thead>
  						<tr>
  							<th>#</th>
  							<th>Descripción</th>
  						</tr>
  					</thead>
  					<tbody>
  						@foreach($zproductos as $zpro)
  						<tr>
  							<td>{{ $zpro->codigo }}</td>

  							<td>{{ $zpro->titulo }}</td>
  						</tr>
  						@endforeach
  					</tbody>
  				</table>
  				<div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
  					<?php echo $zproductos->render(); ?>
  				</div>
 			
  		</div>
  	</div>
  	<div class="col-md-6">
  		<div class="tile">
  			<h3 class="tile-title">Servicios</h3>
  				<table class="table table-hover table-bordered" id="sampleTable">
  					<thead>
  						<tr>
  							<th>#</th>
  							<th>Descripción</th>
  						</tr>
  					</thead>
  					<tbody>
  						@foreach($zservicio as $zserv)
  						<tr>
  							<td>{{ $zserv->id }}</td>

  							<td>{{ $zserv->titulo }}</td>
  						</tr>
  						@endforeach
  					</tbody>
  				</table>
  				<div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
  					<?php echo $zproductos->render(); ?>
  				</div>



  			
  		</div>
  	</div>


  </div>
  @endsection