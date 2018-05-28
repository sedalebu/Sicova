@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Programa: {{$programa->programa}}</h3>
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

			 {!!Form::model($programa,['method'=>'PATCH','route'=>['programas.update',$programa->idprograma]])!!}
			 {{Form::token()}}

			 <div class="form-group">
			 	<label for="programa">Programa </label>
			 	<input type="text" name="programa" class="form-control" value="{{$programa->programa}}" placeholder="Programa de formacion...">
			 </div>
			 <div class="form-group">
			 	<label for="descripcion">Descripcion </label>
			 	<input type="text" name="descripcion" class="form-control" value="{{$programa->descripcion }}" placeholder="Descripcion...">
			 </div>
			 <div class="form-group">
			 	<label for="estado">Estado</label>
			 	<select name="estado" class="form-control selectpiker" data-live-search="true" >				
					 
						@if ($programa->estado=='1')						
						<option value="1" selected>Activo</option>
						<option value="0">Inactivo</option>
						@else 
						<option value="1" >Activo</option>
						<option value="0" selected>Inactivo</option>		
						@endif				

				</select>

			 </div>

			 <div class="form-group">
			 	<button class="btn btn-primary" type="submit">Guardar </button>		
			 	<button class="btn btn-danger" type="reset">Cancelar </button>		 	
			 </div>

			 {!!Form::close()!!}

		</div>
	</div>

@endsection