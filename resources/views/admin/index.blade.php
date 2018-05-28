@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<div class="alert alertahome">
					<h2><center>Bienvenido Administrador: {{ Auth::user()->name }} {{ Auth::user()->last_name }}</center></h2>
					</div>
					
				</table>
			</div>	
		</div>
		

	</div>

</div>


@endsection