@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Asigne el Ambiente </h3>
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
	</div>
</div>   

{!!Form::open(array('url'=>'admin/gestion/asgambiente','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}



<div class="form-group">
	<label for="ambiente">Ambiente</label><br>
	<select name="ambiente_idambiente" id="ambiente_idambiente" class="form-control selectpicker" data-live-search="true">
		@foreach($ambi as $a)
		<option value="{{$a->idambiente}}" selected="Seleccione" >{{$a->nombre_ambiente}} | {{$a->descripcion}} - Sede {{$a->nombre_sede}} </option>
		@endforeach
	</select>

	<label for="Ficha">Ficha </label><br>
	<select name="tbl_ficha_idficha" id="tbl_ficha_idficha" class="form-control selectpicker" data-live-search="true">
		@foreach($fich as $f)
		<option value="{{$f->idficha}}" selected="Seleccione" >{{$f->codigo}} | {{$f->programa}} - {{$f->descripcion}}</option>
		@endforeach
	</select>

	<label>Estado</label><br>
	<select name="estado_asgambiente" id="estado_asgambiente" class="form-control selectpiker" data-live-search="true">
		<option value="Activo">Activo</option>
		<option value="Inactivo">Inactivo</option>   
	</select> 

</div>

<button class="btn btn-primary" type="submit">Guardar </button>		
<button class="btn btn-danger" type="reset">Cancelar </button>		 	
</div>

{!!Form::close()!!}

</div>
</div>

@endsection