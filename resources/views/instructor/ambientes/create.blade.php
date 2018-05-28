@extends ('layouts.user')
@section ('contenido_user')
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
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Sede</th>
						<th>Listado De Ambientes</th>
						<th>Condicion</th>
						<th>Opciones</th>
					</thead>
					@foreach ($sedes as $s)
					 {!!Form::open(array('url'=>'instructor/ambientes','method'=>'POST','autocomplete'=>'off'))!!}
			         {{Form::token()}}
					<tr>
						<td>{{ $s->idsede}}</td>
						<td>{{ $s->nombre_sede}}</td>
						<td>

						<select class="form-control" data-live-search="true" name="ambiente">
							@foreach ($ambientes as $am)
							@if($s->idsede==$am->sede)
							<option value="{{$am->idambiente}}">{{$am->nombre_ambiente}}</option>
							@endif
							@endforeach
						</select></td>
						<td>hi
						</td>
						<td> 
						<button class="btn btn-primary" type="submit">Guardar </button>	
						</td>
					</tr>
					{!!Form::close()!!}
					@endforeach
				</table>
			</div>
			{{$sedes->render()}}  	
		</div>
@endsection