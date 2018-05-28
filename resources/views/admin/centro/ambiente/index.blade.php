@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Ambientes <a href="ambiente/create"><button class="btn btn-success">Nuevo</button></a></h3>
				@include('admin.centro.ambiente.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Sede</th>
						<th>Nombre de ambiente</th>
						<th>Condicion</th>
						<th>Opciones</th>
					</thead>
					@foreach ($ambientes as $s)
					<tr>
						<td>{{ $s->idambiente}}</td>
						<td>{{ $s->nsede}}</td>
						<td>{{ $s->nombre_ambiente}}</td>
						<td><?php
						if ($s->estado_ambiente==1) {
							echo "En Funcionamiento"; 
						}else{
							echo "Desabilitado";
						}

						?>
						</td>
						<td> 
						<a href="{{URL::action('AmbienteController@edit',$s->idambiente)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$s->idambiente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
						
					</tr>
					@include('admin.centro.ambiente.modal')
					@endforeach
				</table>
			</div>
			{{$ambientes->render()}}  	
		</div>
		

	</div>

</div>


@endsection