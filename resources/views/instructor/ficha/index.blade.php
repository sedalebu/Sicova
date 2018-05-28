@extends ('layouts.user')
@section ('contenido_user')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Fichas Asignadas </h3>
		@include('instructor.ficha.searchfichas')
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
					<th>Opciones</th>
					
				</thead>
				@foreach ($fichaasing as $a)
				<tr>
					<td>{{ $a->idasignacionficha}}</td>
					<td>{{ $a->codigo}}</td>
					<td>{{ $a->name}} {{$a->last_name}}</td>

					<td> 
						<a href="{{URL::action('InstructorFichaController@edit',$a->idasignacionficha)}}"><button class="btn btn-info">Detalles</button></a>
						

				</tr>
				@endforeach
			</table>
		</div>
		{{$fichaasing->render()}}  	
	</div>




	@endsection