@extends ('layouts.user')
@section ('contenido_user')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nuevo Formulario </h3>
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

       {!!Form::open(array('url'=>'admin/gestion/formularios','method'=>'POST','autocomplete'=>'off'))!!}
       {{Form::token()}}

<div class="row">
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="descripcion">Descripcion </label>
        <input type="text" name="descripcion" class="form-control" placeholder="Descripcion..." id="descripcion">
    </div>
  </div>
  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
    <div class="form-group">
        <label for="version">Version </label>
        <input type="text" name="version" class="form-control" placeholder="Version..." id="version">
    </div>
  </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">   
    <div class="form-group">
          <label>Estado</label>
          <select name="estado" class="form-control selectpiker" data-live-search="true" id="estado">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>   
          </select>          
    </div>
  </div>
</div>

<div class="row">
  <div class="panel panel-primary" >
    <div class="panel-body">
      
      <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
        <div class="form-group">
          <label>Pregunta</label> 
            <select name="pidpregunta" id="pidpregunta" class="form-control" data-live-search="true">
              <option>Seleccione...</option>
              @foreach($preguntas as $pregunta)
              <option value="{{$pregunta->idpregunta}}_{{$pregunta->pregunta}}_{{$pregunta->descripcion}}">{{$pregunta->preguntap}}</option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
        <div class="form-group">
          <label>Descripcion</label>
            <input type="text" disabled name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Descripcion...">            
        </div>          
      </div>
     
      <label>-</label> 
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="button" id="bt_add">Agregar </button>   
           
        </div>          
      </div>

       

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
</div>

{!!Form::close()!!} 

@push('scripts')
<script>

$(document).ready(function(){
 $('#bt_add').click(function(){
  agregar();
 });
});

var cont = 0;

$("#guardar").hide();
$("#pidpregunta").change(mostrarValores);

function mostrarValores()
{
 datosPregunta=document.getElementById('pidpregunta').value.split('_');
  $("#pdescripcion").val(datosPregunta[2]);

 
 

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