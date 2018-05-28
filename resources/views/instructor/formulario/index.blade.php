@extends ('layouts.user')
@section ('contenido_user')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Formularios <a href="formulario/create"><button class="btn btn-success">Nuevo</button></a></h3>
				@include('instructor.formulario.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Fecha</th>
						<th>Formulario</th>
						<th>Ambiente</th>
						<th>Opciones</th>
						
					</thead>
					@foreach ($respuesta as $for)
					<tr>
						<td>{{ $for->fecha}}</td>
						<td>{{ $for->formulario}}</td>
						<td>{{ $for->nombre_ambiente}}</td>
						<td>  
							<a href=""><button class="btn btn-primary">Detalles</button></a>
							<a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
						</td>
					</tr>
				
					@endforeach
				</table>
			</div>
				
		</div>
		

	</div>




@endsection