@extends ('layouts.admin')
@section ('contenido')

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Nuevo Registro de Formulario </h3>
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
  </div>
</div>     

{!!Form::open(array('url'=>'admin/gestion/registroformulario','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<label>&nbsp</label>
<div class="row">
  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label for="version">Usuario</label>
      <select name="usuario" id="usuario-cbo" class="form-control selectpicker" data-live-search="true">
       <option>Seleccione Usuario...</option>
       @foreach($respuesta as $r)
       <option value="{{$r->id}}">{{$r->id}} - {{$r->name}} {{$r->last_name}}</option>
       @endforeach
     </select>
   </div>
 </div>

 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
  <div class="form-group">
    <label for="q">Ficha</label>
    <select name="ficha" id="ficha-cbo" class="form-control " data-live-search="true">
      <option>Seleccione Ficha...</option>
      @foreach($respuesta as $r)
      <option value="{{$r->idficha}}">{{$r->codigo}} | {{$r->programa}} - {{$r->descripcion}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
  <div class="form-group">
    <label for="version">Ambiente</label>
    <select name="ambiente" id="ambiente-cbo" class="form-control" data-live-search="true">
      <option>Seleccione Ambiente...</option>
      @foreach($respuesta as $r)
      <option value="{{$r->idambiente}}">{{$r->nombre_ambiente}} | {{$r->nombre_sede}}</option>
      @endforeach
    </select>
  </div>
</div>

<label>&nbsp</label>
<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
  <div class="form-group">

    <button class="btn btn-primary" type="button" id="bt_add">Agregar </button>   
  </div>          
</div>
</div>


<div class="row">

  <div class="panel-body">

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="table-responsive">
        <table id="detalles" class="table table-striped table-bordered table-responsed table-hover">
          <thead style="background-color:#A9D0F5 ">
            <th>Opciones</th>
            <th>ID Pregunta</th>
            <th>Pregunta</th>              
            <th>Descripcion</th>                      
          </thead>

          <tbody>              
          </tbody>

          <tfoot>
            <th></th>
            <th></th>         
            <th></th>
            <th></th>                           
          </tfoot>

          <tbody>              
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">     
  <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-primary" type="submit">Guardar </button>   
    <button class="btn btn-danger" type="reset">Cancelar </button>      
  </div>
</div>


{!!Form::close()!!} 

@push('scripts')
<script>

  var idf = 0;
  var ida =0;
  total = 0;
  subtotal = [];


  $('#usuario-cbo').on('change',cargaficha);
  $('#ficha-cbo').on('change',cargarambiente);


  function cargaficha()
  { 
    idf =$(this).val();   

    //AJAX   

    $.get('/api/sicova/'+idf+'/ficha', function(data){
      var html_cbofichas = '<option value="">Seleccione ficha...</option>';
      for (var i=0; i<data.length; i++) 
        html_cbofichas += '<option value="'+data[i].idficha+'">'+data[i].codigo+'</option>';
      console.log(idf);
      $('#ficha-cbo').html(html_cbofichas);
      mostrarValores($idf);

    });
    


  }

  function cargarambiente()
  {
     ida=$(this).val();
     $.get('/api/sicova/'+ida+'/ambiente', function(data){
      var html_cboambiente ='<option value="">Seleccione Ambiente...</option>';
      for (var i = 0; i<data.length; i++) 
      html_cboambiente += '<option value="'+data[i].idambiente+'">'+data[i].nombre_ambiente+'</option>';
    console.log(ida);
    $('#ambiente-cbo').html(html_cboambiente);


     })
  }
  function mostrarValores()
  {
   console.log(idf);
 }

 function agregar()
 {
  datosPregunta=document.getElementById('pidpregunta').value.split('_');
  idpregunta=datosPregunta[0];
  pregunta=datosPregunta[1];
  descripcion=$("#pdescripcion").val();
  tbl_pregunta_idpregunta=datosPregunta[0];



  if (idpregunta!="" && pregunta!="" && descripcion!="")
  {


   var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button></td><td><input type="hidden" name="tbl_pregunta_idpregunta[]" value="'+idpregunta+'">'+idpregunta+'</td><td><input type="hidden" name="pregunta[]" value="'+pregunta+'">'+pregunta+'</td><td><input type="hidden" name="pdescripcion[]" value="'+descripcion+'">'+descripcion+'</td></tr>';

   cont++;
   limpiar();
   evaluar();
   $('#detalles').append(fila);
 }

 else
 {
  alert("Error al ingresar el detalle de las preguntas, revise los datos");
}
}


function limpiar()
{
 $("#pdescripcion").val("");
}

function evaluar()
{
 if (cont > 0)
 {
  $("#guardar").show();
}
else
{
  $("#guardar").hide();
}
}

function eliminar(index)
{
 // total=total - subtotal[index];
 // $("#total").html("S./ " + total);
 // $("#total_venta").val(total);
 $("#fila" + index).remove();
 evaluar();
}


</script>
@endpush

@endsection
</div>