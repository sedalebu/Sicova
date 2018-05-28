@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Sede: {{$sede->nombre_sede}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>
					{{$error}}
				</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($sede,['method'=>'PATCH','route'=>['sede.update',$sede->idsede]])!!}
		{{Form::token()}}

		<div class="form-group">
			<label for="nombre">Nombre sede </label>
			<input type="text" name="sede" class="form-control" value="{{$sede->nombre_sede }}" placeholder="Nombre...">
		</div>
		<div class="form-group">
			<label for="descripcion">Direccion </label>
			<input type="text" name="direccion" class="form-control" value="{{$sede->direccion_sede }}"placeholder="Direccion...">
		</div>
		<div class="form-group">
			<label for="Estado"> Estado</label><br>	
			
			

			<label class="switch">

				<input type="checkbox" name="estado" id="est" 
				onclick="
				if(this.checked){
					document.all('vac').innerText = 'En Funcionamiento';              
				}
				else if (!checked){
					document.all('vac').innerText = 'Desabilitado';                	
				} ">

				<span class="slider"></span>
			</label> <br>
			<label name="vac" id="vac"></label>
			
			<script type="text/javascript">
				var h={{$sede->estado_sede}};
				if (h==1) {
					document.getElementById("vac").innerText = 'En Funcionamiento';
					document.getElementById("est").checked=true;     		
				}else{
					document.all("vac").innerText = 'Desabilitado';
					document.all("est").checked=false;
				}
				
			</script>
		</div>

		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar </button>		
			<button class="btn btn-danger" type="reset">Cancelar </button>		 	
		</div>

		{!!Form::close()!!}

	</div>
</div>

@endsection