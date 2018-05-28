@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ambiente </h3>
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

			 {!!Form::open(array('url'=>'admin/centro/ambiente','method'=>'POST','autocomplete'=>'off'))!!}
			 {{Form::token()}}
			 <div class="form-group">
			 	<label for="sede">Sede </label><br>
			 	<select name="idsede" class="form-control">
			 		@foreach($sedes as $s)
			 		<option value="{{$s->idsede}}">{{$s->nombre_sede}}</option>
			 		@endforeach
			 	</select>

			 </div>
			 <div class="form-group">
			 	<label for="nombre">Nombre del ambiente </label>
			 	<input type="text" name="ambiente" class="form-control" placeholder="Nombre..." required value="{{old('nombre')}}">
			 </div>
			 <div class="form-group">
			 	<button class="btn btn-primary" type="submit">Guardar </button>		
			 	<button class="btn btn-danger" type="reset">Cancelar </button>		 	
			 </div>

			 {!!Form::close()!!}

		</div>
	</div>

@endsection