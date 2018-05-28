@extends ('layouts.user')
@section ('contenido_user')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					@if(Auth::user()->tp_user==2)
					<div class="alert alertahome">
					<center><h2>Bienvenido Instructor: {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h2></center>
					</div>
					<div class="row">
						<div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
							
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						   <a href="instructor/formulario/create">
						   	<button>
						   		<center>
						   			<img src="{{asset('img/diligenciar.png')}}" style="width: 200px ;    padding-top: 30px;">
						   			<center><h2>Diligenciar Formulario</h2></center>
						   		</center>
						   	</button>
						   </a>
						   

						  </div>
						  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
						    
						        <a href="instructor/formulario">
						        	<button>
						        		<center style="padding-bottom: 30px">
						        			<img src="{{asset('img/informes.png')}}">
						        			<center><h2>Informes de Formularios</h2></center>
						        		</center>
						        	</button>
						        </a>
						        
						  </div>
					@else
					<div class="alert alertaInfo">
					<center><h2>Bienvenido su usuario esta en proceso de validacion agradecemos su espera</h2></center>
				   </div>
					@endif
					
					</div>
				</table>
			</div>	
		</div>
		

	</div>

</div>


@endsection