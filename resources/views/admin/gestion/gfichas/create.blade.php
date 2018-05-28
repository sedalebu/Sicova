@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Ficha </h3>
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

			 {!!Form::open(array('url'=>'admin/gestion/gfichas','method'=>'POST','autocomplete'=>'off'))!!}
			 {{Form::token()}}
			 <div class="form-group">
			 	<label for="codigo">Codigo </label>
			 	<input type="text" name="codigo" class="form-control" placeholder="Codigo...">
			 </div>
			 <div class="form-group">
				<label>Programa</label>
				<select  name="programa" class="form-control selectpicker" data-live-search="true">
					@foreach ($programas as $pro)
						<option value="{{$pro->idprograma}}">{{$pro->programa}}</option>
					@endforeach
				</select>
			</div>
			 <div class="form-group">
				 	<label>Jornada</label>
				 	<select name="jornada" class="form-control selectpiker" data-live-search="true" id="jornada">
					  <option value="1">Mañana</option>
					  <option value="2">Tarde</option> 	
					  <option value="3">Nocturna</option> 	
					  <option value="4">Madrugada</option> 	
					</select>				 	
				 </div>
				<div class="form-group">
				 	<label>Estado</label>
				 	<select name="estado" class="form-control selectpiker" data-live-search="true" id="estado">
					  <option value="1">Activo</option>
					  <option value="0">Inactivo</option> 	
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