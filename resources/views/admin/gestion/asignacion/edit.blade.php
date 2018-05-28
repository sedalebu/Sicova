@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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

		{!!Form::model($asignacionficha,['method'=>'PATCH','route'=>['asignacion.update',$asignacionficha->idasignacionficha]])!!}
			 {{Form::token()}}	
		
		<div class="form-group"> 	
			<label for="Usuario">Nombre Usuario </label><br>
			<select name="users_id" class="form-control selectpicker" data-live-search="true">
				@foreach($usuario as $user)

				@if ( $user->id==$asignacionficha->users_id) 
				<option value="{{$user->id}}" selected >{{$user->name}} {{$user->last_name}}</option>
				@else
				<option value="{{$user->id}}" >{{$user->name}} {{$user->last_name}}</option>
				@endif
				@endforeach
			</select>				
		</div>
		
		<div class="form-group"> 	
			<label for="ficha_idficha">Numero de ficha </label><br>
			<select name="ficha_idficha" class="form-control selectpicker" data-live-search="true">
				@foreach($ficha as $asf)

				@if ( $asf->idficha==$asignacionficha->ficha_idficha) 
				<option value="{{$asf->idficha}}" selected>{{$asf->codigo}}</option>
				@else
				<option value="{{$asf->idficha}}" >{{$asf->codigo}}</option>
				@endif
				@endforeach
			</select>				
		</div>

		<div class="form-group"> 	
			<label for="estado_asgficha">Estado de la ficha </label><br>
			<select name="estado_asgficha" class="form-control selectpicker" data-live-search="true">
				
				@if ($asignacionficha->estado_asgficha == "Inactivo" )
				<option value="Activo " >Activo</option>
				<option value="Inactivo " selected>Inactivo</option>
				@else 
				<option value="Activo" selected>Activo</option>
				<option value="Inactivo">Inactivo</option>
				
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