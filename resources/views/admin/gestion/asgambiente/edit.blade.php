@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Asignacion de Ambiente: {{$asignacionambiente->idasignacionambiente}}</h3>
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

		{!!Form::model($asignacionambiente,['method'=>'PATCH','route'=>['asgambiente.update',$asignacionambiente->idasignacionambiente]])!!}
		{{Form::token()}}	
		
		<div class="form-group"> 	
			<label for="idambiente">Ambiente </label><br>
			<select name="ambiente_idambiente" class="form-control selectpicker" data-live-search="true">
				@foreach($a as $a)

				@if ( $a->idambiente==$asignacionambiente->ambiente_idambiente) 
				<option value="{{$a->idambiente}} " selected >{{$a->nombre_ambiente}} - {{$a->descripcion}} / {{$a->nombre_sede}}</option>
				@else
				<option value="{{$a->idambiente}}" >{{$a->nombre_ambiente}} - {{$a->descripcion}} / {{$a->nombre_sede}}</option>
				@endif
				@endforeach
			</select>				
		</div>

		<div class="form-group"> 	
			<label for="ficha_asgedit">Ficha </label><br>
			<select name="tbl_ficha_idficha" class="form-control selectpicker" data-live-search="true">
				@foreach($f as $f)

				@if ( $f->idficha == $asignacionambiente->tbl_ficha_idficha) 
				<option value="{{$f->idficha}} " selected >{{$f->codigo}} - {{$f->programa}} / {{$f->descripcion}}</option>
				@else
				<option value="{{$f->idficha}}" > {{$f->codigo}} - {{$f->programa}} / {{$f->descripcion}} </option>
				@endif
				@endforeach
			</select>				
		</div>

		<div class="form-group"> 
			<label>Estado</label><br>
			<select name="estado_asgambiente" id="estado_asgambiente" class="form-control selectpiker" data-live-search="true">

				@if ($asignacionambiente->estado_asgambiente == "Inactivo" )
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