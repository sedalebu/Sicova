@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3>Listado de Fichas <a href="gfichas/create"><button class="btn btn-success">Nuevo</button></a></h3>
				@include('admin.gestion.gfichas.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id Ficha</th>
						<th>Codigo</th>
						<th>Programa</th>
						<th>Jornada</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($fichas as $fic)
					<tr>
						<td>{{ $fic->idficha}}</td>
						<td>{{ $fic->codigo}}</td>
						<td>{{ $fic->programa}}</td>

						<td><?php
						switch ($fic->jornada) {
							case '1':
								echo "Mañana";
								break;
							case '2':
								echo "Tarde";
								break;
							case '3':
								echo "Noche";
								break;
							case '4':
								echo "Madrugada";
								break;
							
							default:					
								echo "Ninguna"	;						
								break;
						}						
						?>					
							
						</td>
						<td>
							
							@if ($fic->estado == 0)						
							{{ $fic->estado ='Inactiva'}}
							@else 
							{{ $fic->estado='Activa'}}
							@endif
	

						</td>
						<td> 
							<a href="{{URL::action('FichaController@edit',$fic->idficha)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$fic->idficha}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('admin.gestion.gfichas.modal')
					@endforeach
				</table>
			</div>
			{{$fichas->render()}}  	
		</div>
		

	</div>


@endsection