@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Asigne Ficha </h3>
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

{!!Form::open(array('url'=>'admin/gestion/asignacion','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="form-group">
	<label for="Ficha">Ficha </label><br>
	<select name="ficha_idficha" class="form-control selectpicker" data-live-search="true" p>
		@foreach($ficha as $f)
		<option value="{{$f->idficha}}" selected="Seleccione" >{{$f->codigo}}</option>
		@endforeach
	</select>

	<label for="id">Usuario </label><br>
	<select name="users_id" class="form-control selectpicker" data-live-search="true">
		@foreach($id as $i)
		<option value="{{$i->id}}">{{$i->name}} {{$i->last_name}}</option>
		@endforeach
	</select>

	<label>Estado</label><br>
      <select name="estado_asgficha" class="form-control selectpiker" data-live-search="true">
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