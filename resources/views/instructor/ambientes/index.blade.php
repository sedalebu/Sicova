@extends ('layouts.user')
@section ('contenido_user')
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Listado de Ambientes Asignados <a href="ambientes/create"><button class="btn btn-success">Nuevo Registro</button></a></h3>
				@include('instructor.ambientes.searchambiente')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Sede</th>
						<th>Ambiente</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($ambiasing as $a)
					<tr>
						<td>{{ $a->idambiente}}</td>
						<td>{{ $a->nombre_sede}}</td>
						<td>{{ $a->nombre_ambiente}}</td>
						<td><?php
						if ($a->estado_ambiente==1) {
							echo "En Funcionamiento"; 
						}else{
							echo "Desabilitado";
						}

						?>
						</td>
						<td> 
						<a href="">Detalle</button></a>
						</td>
						
					</tr>
					@endforeach
				</table>
			</div>
			{{$ambiasing->render()}}  	
		</div>




@endsection