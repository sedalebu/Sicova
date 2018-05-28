<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;
use sicova\Http\Requests; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\PerfilFormRequest;
use sicova\Perfil;
use sicova\Usuario;
use DB;

class AdminController extends Controller
{
    public function __construct()
     {
      
     }
     public function index(Request $request)
     {
          if ($request)
          {
              $usuario= DB::table('users');
            if (Auth::user()->tp_user==3) {
               return view('admin.index');
            }else
            {
              if (Auth::user()->tp_user==2) {
                return view('instructor.index');
              }
              else{
                return view('instructor.index');
            }
              }
               
          }
     } 
     public function show($id)
     {
          return view("instructor.show",["usuario"=>Perfil::findOrFail($id)]);
     }
     public function edit()
     {
          if (Auth::user()->tp_user==3) {
           return view("admin.perfil.edit",["usuario"=>Auth::user()]); 
          }else{
            return view("instructor.edit",["usuario"=>Auth::user()]);            
          }
       }
     public function update(PerfilFormRequest $request)
     {
          $id= Auth::id();
          $usu=Usuario::findOrFail($id);

          $usuario=Perfil::findOrFail($id);
          $usuario->name=$request->get('nombres');
          $usuario->last_name=$request->get('apellidos');

          if (Auth::user()->email!=$request->get('email')) {
            
              if ($usu->email==$request->get('email'))
              {
                $usuario->email=$request->get('email');
              }
              else
              {                
                return response('<script type="text/javascript">     alert("El email ya se encuentra en uso");  window.location="···/edit"   </script>');
              }
            
            }
          if (Hash::check($request->get('contraseña'),$usu->password)) {
            $usuario->update();
            
            if (Auth::user()->tp_user==3) {
              return Redirect::to('admin');
            }else{
              return Redirect::to('instructor');
            }
          }else{
            return response('<script type="text/javascript">     alert("Contraseña Incorrecta, Ingrese Nuevamente");  window.location="···/edit"   </script>');
          }

          
               }
     public function destroy($id)
     {
         
     }
}
