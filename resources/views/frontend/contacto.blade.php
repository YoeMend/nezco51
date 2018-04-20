
<div class="modal fade mt-md-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">

		      <div class="modal-header p-0">
		      	<div class="box-sh-m h-10em w-100 overflow-hidden bg-img" style="background-image: url('{{ asset('images/4.jpg') }}');">
		      	</div>
		       
		        <button type="button" class="close c-white p-0" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <div class="modal-b
		      ody">

		      	<div class="col pt-2">
		      		<h3 class="tit">Contáctate con nosotros</h3>
		      	</div>
		        
	        	<form method="POST" action="{{route ('enviar')}}" accept-charset="UTF-8" enctype="multipart/form-data"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	        		<div class="row">
			        	<div class="form-group col-12 col-md-6">
			        		<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre y Apellido">
			        	</div>
			        	<div class="form-group col-12 col-md-6">
			        		<input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico">
			        	</div>
  				        	<div class="form-group col-12 col-md-6">
			        		<input type="text" id="asunto" name="asunto" class="form-control" placeholder="Asunto">
			        	</div>

			        	<div class="textarea form-group col-12 col-md-12">
			        		<textarea class="form-control" placeholder="Mensaje" name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
			        	</div>
			        	<div class="col-12 clearfix">
			        		
							<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary float-left">Cerrar</button>

			        		<input type="submit" class="btn btn-primary float-right" value="Enviar">
			        	</div>
		        	</div>
	        	</form>
		        
		      </div>
		      <div class="modal-footer">
		        <p>
							</p>
		      </div>
		    </div>
		  </div>
		</div>