@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Fichas Asignadas <a href="/admin/gestion/asignacion/create"><button class="btn btn-success"> Nueva Asignación</button></a></h3>
		@include('admin.gestion.asignacion.searchfichas')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Ficha</th>
					<th>Usuario</th>
					<th>Fecha asignacion</th>
					<th>Estado</th>
					<th>Opciones</th>


					
				</thead>
				@foreach ($fichaasing as $a)
				<tr>
					<td>{{ $a->idasignacionficha}}</td>
					<td>{{ $a->codigo}}</td>
					<td>{{ $a->name}} {{$a->last_name}}</td>
					<td>{{ $a->fecha_asignacion}}</td>
					<td>{{ $a->est}}</td>					
					
					<td> 
						<a href="{{URL::action('AsignacionFichaController@edit',$a->idasignacionficha)}}"><button class="btn btn-info">Editar</button></a>
						
						<a href="" data-target="#modal-delete-{{$a->idasignacionficha}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

					</td>

				</tr>
				@include('admin.gestion.asignacion.modal')
				@endforeach
			</table>
		</div>
		{{$fichaasing->render()}}  	
	</div>




	@endsection