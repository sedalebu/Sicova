@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Sedes <a href="sede/create"><button class="btn btn-success">Nuevo</button></a></h3>
				@include('admin.centro.sede.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Sede</th>
						<th>Direccion</th>
						<th>Condicion</th>
						<th>Opciones</th>
					</thead>
					@foreach ($sedes as $s)
					<tr>
						<td>{{ $s->idsede}}</td>
						<td>{{ $s->nombre_sede}}</td>
						<td>{{ $s->direccion_sede}}</td>
						<td><?php
						if ($s->estado_sede==1) {
							echo "En Funcionamiento"; 
						}else{
							echo "Desabilitado";
						}

						?>
						</td>
						<td> 
						<a href="{{URL::action('SedeController@edit',$s->idsede)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$s->idsede}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
						
					</tr>
					@include('admin.centro.sede.modal')
					@endforeach
				</table>
			</div>
			{{$sedes->render()}}  	
		</div>
		

	</div>




@endsection