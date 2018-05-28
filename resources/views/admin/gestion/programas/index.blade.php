@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3>Listado de Programas <a href="programas/create"><button class="btn btn-success">Nuevo</button></a></h3>
				@include('admin.gestion.programas.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Programa</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($programas as $pro)
					<tr>
						<td>{{ $pro->idprograma}}</td>
						<td>{{ $pro->programa}}</td>
						<td>{{ $pro->descripcion}}</td>
						<!--<td>{{ $pro->estado}}</td>-->
						<td>
							
							@if ($pro->estado=='1')						
							{{ $pro->estado='Activo'}}
							@else 
							{{ $pro->estado='Inactivo'}}
							@endif		

						</td>
						<td> 
							<a href="{{URL::action('ProgramaController@edit',$pro->idprograma)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pro->idprograma}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('admin.gestion.programas.modal')
					@endforeach
				</table>
			</div>
			{{$programas->render()}}  	
		</div>
		

	</div>


@endsection