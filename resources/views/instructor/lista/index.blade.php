@extends ('layouts.user')
@section ('contenido_user')
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Seleccione un grupo <a href="lista/#"><button class="btn btn-success">Nuevo</button></a></h3>
				
		</div>
	</div>

<h4>Esta es una prueba</h4>
	

<div class="btn-group" role="group" aria-label="...">
            <h2>Comboboxes</h2>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Seleccione una opción
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <!--@foreach($categories as $category)-->
                    <li><a href="{{$category->id}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

@endsection