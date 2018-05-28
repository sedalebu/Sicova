@extends ('layouts.user')
@section ('contenido')

  <div class="row">

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
        <label for="idformulario">ID</label>
       <p>{{$formularios->idformulario}}</p>
       </div>   
    </div>

    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
       <p>{{$formularios->descripcion}}</p>
       </div>   
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <p>{{$formularios->fecha}}</p>
      </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
        <label for="version">Version</label>
        <p>{{$formularios->version}}</p>
      </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
        <label for="estado">Estado del Formulario </label>
        <p>
              @if ($formularios->estado=='1')           
              {{ $formularios->estado='Activo'}}
              @else 
              {{ $formularios->estado='Inactivo'}}
              @endif
        </p>
       </div>
    </div>
</div>
  
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-body">

         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-responsed table-hover">
                  <thead style="background-color:#A9D0F5 ">
                 
                    <th>Id</th>
                    <th>Pregunta</th>           
                    <th>Descripcion</th>
                    <th>Estado Pregunta</th>

                  </thead>                  
                  <tfoot>
                 
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                              
                  </tfoot>
                  <tbody>
                    @foreach($detalles as $det)
                    <tr>
                      <td>{{$det->idpregunta}}</td>
                      <td>{{$det->pregunta}}</td>
                      <td>{{$det->pdescripcion}}</td>
                      <td>
                        @if ($det->pestado=='1')           
                        {{ $det->pestado='Activa'}}
                        @else 
                        {{ $det->pestado='Inactiva'}}
                        @endif
                      </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                  
              </table>
            </div>
          </div>
        </div>      
      </div>   
      
@endsection