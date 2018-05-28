@extends ('layouts.user')
@section ('contenido_user')



	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3></h3>
			@if (count($errors)>0)
			 <div class="alert alert-danger">
			 	<ul>
			 		@foreach ($errors->all() as $error)
			 		<li>
			 			{{$error}}
			 		</li>
			 		@endforeach
			 	</ul>
			 </div>
			 @endif

			 {!!Form::model($usuario,['method'=>'PATCH','route'=>['instructor.update',Auth::user()->id]])!!}
			 {{Form::token()}}
                <h3>Datos Personales</h3>
				<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
						<div class="form-group">
			 	<label for="documento"></label>
			 	<input type="text" name="" class="form-control" readonly="readonly" value="{{$usuario->documento}}">
			 </div>
			 <div class="form-group">
			 	<label for="descripcion">Nombres: </label>
			 	<input type="text" name="nombres" class="form-control" placeholder="Nombres..." value="{{$usuario->name}}">
			 </div>
			 	<label for="descripcion">Apellidos: </label>
			 	<input type="text" name="apellidos" class="form-control" placeholder="Apellidos..." value="{{$usuario->last_name}}">
			 </div>
			 	<label for="descripcion">Correo: </label>
			 	<input type="text" name="email" class="form-control" placeholder="Correo..." value="{{$usuario->email}}">
			 </div>
			 <div>
		     	<label for="descripcion">Contraseña </label>
			 	<input type="password" name="contraseña" class="form-control" placeholder="Contraseña..." >
			 </div>
					</table>
				</div>

					
						
					
					
		

                
			 <div class="form-group">
			 	<button class="btn btn-primary" type="submit">Guardar </button>		
			 	<button class="btn btn-danger" type="reset">Cancelar </button>		 	
			 </div>

			 {!!Form::close()!!}

		</div>
	</div>

@endsection