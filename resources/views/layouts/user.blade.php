
<!DOCTYPE html>
<html> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sicova | www.sicova.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('path/to/font-awesome/css/font-awesome.min.css')}}">

    <script src="https://use.fontawesome.com/fd6220c6dc.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
   

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{asset('instructor')}}" class="logo" style="background-color: #5eb319;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sicova</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="    background-color: #57a219;">
          <!-- Sidebar toggle button-->
          <a href="{{asset('#')}}" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="{{asset('#')}}" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                   
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                 
                    
                    <div class="">
                      <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="    background-color: #cfffe9;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style="background: #ddd;"><center> <img src="{{asset('img/logoSena.png')}}" width="100px" style="    background: rgba(255,255,255,.15);
    -moz-border-radius: 10px;
    border-radius: 10px;
    margin-top: 9px;"></center><center><h4>Instructor</h4></center></li>
            
    
            <li class="treeview">
              <a href="{{asset('#')}}">
                <i class="fa fa-user" style="    color: #00c0ef;"></i>
                <span style="color: #4899de;">Perfil</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('InstructorController@edit',Auth::user()->id)}}"><i class="fa fa-circle-o"></i>Datos Personales</a></li>
              </ul>
            </li>

            @if(Auth::user()->tp_user==2)
            <li class="treeview">
              <a href="{{asset('#')}}">
                <i class="fa fa-th-list" style="    color: #00c0ef;"></i>
                <span style="color: #4899de;">Fichas Asignadas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{asset('instructor/ficha')}}"><i class="fa fa-circle-o"></i> Fichas</a></li>
              </ul>
            </li>
            



           
                       
            <li class="treeview">
              <a href="{{asset('#')}}">
                <i class="fa fa-folder" style="    color: #00c0ef;"></i> 
                <span style="color: #4899de;">Formularios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{asset('instructor/registroformulario')}}"><i class="fa fa-circle-o"></i>Registro de formularios </a>
                </li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{asset('admin/centro/sede ')}}">
                  <i class="fa fa-circle-o"></i>Historial</a>
                </li>
              </ul>
            </li>
             <li>
              <a href="{{asset('#')}}">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
           @endif
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Control y Verificacion de Ambientes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('contenido_user')
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1
        </div>
        <strong>Copyright &copy; 2017-2020</strong>  © VI-Trimestre-2017 - All Rigth@2017 - ADSI
      </footer>


    <!-- jQuery 2.1.4 -->
      <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
      @stack('scripts')
      <!-- Bootstrap 3.3.5 -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('js/app.min.js')}}"></script>
  </body>
</html>
