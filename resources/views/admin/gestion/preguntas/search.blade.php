{!! Form::open(array('url'=>'admin/gestion/preguntas','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		 <input type="text" class="form-control" name="searchText" placeholder="Buscar por pregunta o estado..." value="{{$searchText}}">
		 <span class="input-group-btn">
		 	<button type="submit" class="btn btn-primary">Buscar</button>
		 </span>
	</div>
</div>
{{Form::close()}}