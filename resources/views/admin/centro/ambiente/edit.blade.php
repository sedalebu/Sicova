@extends ('layouts.admin')
@section ('contenido')



	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Sede: {{$ambiente->nsede}} </h3>
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

			 {!!Form::model($ambiente,['method'=>'PATCH','route'=>['ambiente.update',$ambiente->idambiente]])!!}
			 {{Form::token()}}

			  <div class="form-group">
			 	<label for="sede">Sede </label><br>
			 	<select name="idsede" class="form-control">
			 	@foreach ($sedes as $se)
			 		<option value="{{$se->idsede}}" selected>{{$se->nombre_sede}} </option>
			 	@endforeach
			 	</select>

			 </div>
			 <div class="form-group">
			 	<label for="nombre">Nombre del ambiente </label>	
			 	<input type="text" name="ambiente" class="form-control" required value="{{$ambiente->nombre_ambiente}}">
			 </div>

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
                	var h={{$ambiente->estado_ambiente}};
                	if (h==1) {
                		document.getElementById("vac").innerText = 'En Funcionamiento';
						document.getElementById("est").checked=true;     		
                	}else{
                		document.all("vac").innerText = 'Desabilitado';
						document.all("est").checked=false;
                	}
                	
                </script>
			 <div class="form-group">
			 	<button class="btn btn-primary" type="submit">Guardar </button>		
			 	<button class="btn btn-danger" type="reset">Cancelar </button>		 	
			 </div>

			 {!!Form::close()!!}


@endsection