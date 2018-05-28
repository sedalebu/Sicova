@extends ('layouts.user')
@section ('contenido_user')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Asignacion : {{$asignacionficha->idasignacionficha}}</h3>
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

			 {!!Form::model($asignacionficha,['method'=>'PATCH','route'=>['asignacion.update',$asignacionficha->idasinfacionficha]])!!}
			 {{Form::token()}}

			<div class="form-group"> 	

				<label for="id">Usuario </label><br>
			 	<select name="users_id" class="form-control selectpicker" data-live-search="true">
			 		@foreach($usuario as $f)
			 		<option value="{{$f->id}}">{{$f->name}} {{$f->last_name}}</option>
			 		@endforeach
			 	</select>
			 </div>

			 <div class="form-group"> 
				<label for="id">Ficha </label><br>
			 	<select name="ficha_idficha" class="form-control selectpicker" data-live-search="true">
			 		@foreach($asignacionficha as $af)
			 		<option value="{{$af->idasignacionficha}}">{{$af->ficha_idficha}}</option>
			 		@endforeach
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