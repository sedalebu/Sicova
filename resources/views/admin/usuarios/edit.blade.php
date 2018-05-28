@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3></h3>
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

			 {!!Form::model($usuario,['method'=>'PATCH','route'=>['usuarios.update',$usuario->id]])!!}
			 {{Form::token()}}
                <h3>Datos Personales</h3>
				<div class="table-responsive">

				<table class="table table-striped table-bordered table-condensed table-hover">
             <div class="form-group">
			 	<label for="descripcion">Tipo Documento </label>
			 <select id="tipo_documento" name="tipo_documento" class="form-control" value="{{$usuario->tipo_documento}}" required autofocus>
                                    <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                                    <option value="Cedula de Extrangeria">Cedula de Extrangeria</option>
                                </select>
			 </div>

			<div class="form-group">
			 	<label for="documento">Documento</label>
			 	<input type="text" name="documento" class="form-control" value="{{$usuario->documento}}">
			 </div>

			 <div class="form-group">
			 	<label for="descripcion"> Genero</label>
			 	<select id="tipo_documento" name="genero" class="form-control" value="{{$usuario->genero}}" required autofocus>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
			 </div>
			 <div class="form-group">
			 	<label for="descripcion"> </label>
			 	
			 </div>
			 <div class="form-group">
			 	<label for="descripcion">Nombres: </label>
			 	<input type="text" name="name" class="form-control" placeholder="Nombres..." value="{{$usuario->name}}">
			 </div>
			 	<label for="descripcion">Apellidos: </label>
			 	<input type="text" name="last_name" class="form-control" placeholder="Apellidos..." value="{{$usuario->last_name}}">
			 </div>
			 	<label for="descripcion">Correo: </label>
			 	<input type="text" name="email" class="form-control" placeholder="Correo..." value="{{$usuario->email}}">
			 </div>
		     	<label for="descripcion">Contraseña </label>
			 	<input type="password" name="contraseña" class="form-control" placeholder="Contraseña..." >
			 </div>
			 	<label for="descripcion">Confirmar Contraseña </label>
			 	<input type="password" name="contraseña_confirmation" class="form-control" placeholder="Confirmar Contraseña">
			 </div>
					</table>
				</div>

				<div class="form-group">
			 	<label for="descripcion">Estado</label><br>
			 	<label class="switch">

                <input type="checkbox" name="estado" id="est1" 
                onclick="
                if(this.checked){
                	document.all('vac1').innerText = 'En Funcionamiento';              
                }
                else if (!checked){
                	document.all('vac1').innerText = 'Desabilitado';                	
                } ">

                <span class="slider"></span>
                </label> <br>
                <label name="vac1" id="vac1"></label>
                
                <script type="text/javascript">
                	var h={{$usuario->estado}};
                	if (h==1) {
                		document.getElementById("vac1").innerText = 'En Funcionamiento';
						document.getElementById("est1").checked=true;     		
                	}else{
                		document.all("vac").innerText = 'Desabilitado';
						document.all("est").checked=false;
                	}
                	
                </script>
			 </div>

			 <div class="form-group">
			 	<label for="descripcion">Habilitar Instructor</label><br>
			 	<label class="switch">

                <input type="checkbox" name="tp_user" id="est" 
                onclick="
                if(this.checked){
                	document.all('vac').innerText = 'Instructor';              
                }
                else if (!checked){
                	document.all('vac').innerText = 'Estandar';                	
                } ">

                <span class="slider"></span>
                </label> <br>
                <label name="vac" id="vac"></label>
                
                <script type="text/javascript">
                	var h={{$usuario->tp_user}};
                	if (h==2) {
                		document.getElementById("vac").innerText = 'Instructor';
						document.getElementById("est").checked=true;     		
                	}else{
                		document.all("vac").innerText = 'Estandar';
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