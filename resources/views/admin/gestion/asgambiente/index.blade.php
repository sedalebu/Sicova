@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Ambientes Asignados <a href="asgambiente/create"><button class="btn btn-success"> Nueva Asignación de Ambiente</button></a></h3>
		@include('admin.gestion.asgambiente.searchambiente')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Ambiente</th>
					<th>Ficha</th>
					<th>Fecha de Asignacion</th>
					<th>Estado</th>
					<th>Opciones</th>					
				</thead>

				@foreach ($ambiasing as $a)

				<tr>
					<td>{{ $a->idasignacionambiente}}</td>
					<td>{{ $a->asd}}</td>
					<td>{{ $a->fp}}</td>
					<td>{{ $a->fecha_asignacion}}</td>
					<td>{{ $a->estado_asgambiente}}</td>					
					
					<td> 
						<a href="{{URL::action('AsignacionAmbienteController@edit',$a->idasignacionambiente)}}"><button class="btn btn-primary">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$a->idasignacionambiente}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>

				</tr>
				@include('admin.gestion.asgambiente.modal')
				@endforeach
				
			</table>
		</div>
		{{$ambiasing->render()}}  	
	</div>




	@endsection