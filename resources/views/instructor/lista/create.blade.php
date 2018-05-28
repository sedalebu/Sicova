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