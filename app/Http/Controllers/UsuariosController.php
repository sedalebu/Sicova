<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\UsuarioFormRequest;
use sicova\Usuario;
use DB;

class UsuariosController extends Controller
{
    public function __construct()
     {
          
     }
     public function index(Request $request)
     {
          if ($request)
          {
               $query=trim($request->get('searchText'));
               $usuarios= DB::table('users')
               
               ->where('documento','LIKE','%'.$query.'%')
               ->orwhere('name','LIKE','%'.$query.'%')
               ->orwhere('email','LIKE','%'.$query.'%')
               
               ->orderBy('id','asc')
               ->paginate(7);
               return view('admin.usuarios.index',["usuarios"=>$usuarios,"searchText"=>$query]);
          }
     } 
     public function create()
     {
          return view('admin.usuario.create');
     }
     public function store(UsuarioFormRequest $request)
     {
          $id= Auth::id();
          $usuario=Usuario::findOrFail($id);
           if ($request->get('estado')==true) {
               $usuario->estado='1';
           }else{
               $usuario->estado='0';
           }
           if ($request->get('tp_user')==true) {
               $usuario->tp_user='2';
           }else{
              $usuario->tp_user='1';
           }
          $usuario->tipo_documento=$request->get('tipo_documento');
          $usuario->documento=$request->get('documento');
          $usuario->name=$request->get('nombres');
          $usuario->genero=$request->get('genero');
          $usuario->last_name=$request->get('apellidos');
          $usuario->email=$request->get('email');
          $usuario->password=bcrypt($request->get('contraseña')) ;
          $usuario->update();
          return Redirect::to('admin/usuario');
     }
     public function show($id)
     {
         
     }
      public function edit($id)
     {
          return view("admin.usuarios.edit",["usuario"=>Usuario::findOrFail($id)]);
     }
     public function update(UsuarioFormRequest $request,$id)
     {
          
          $usuario=Usuario::findOrFail($id);
           if ($request->get('estado')==true) {
               $usuario->estado='1';
           }else{
               $usuario->estado='0';
           }
           if ($request->get('tp_user')==true) {
               $usuario->tp_user='2';
           }else{
              $usuario->tp_user='1';
           }
          $usuario->tipo_documento=$request->get('tipo_documento');
          $usuario->documento=$request->get('documento');
          $usuario->name=$request->get('name');
          $usuario->genero=$request->get('genero');
          $usuario->last_name=$request->get('last_name');
          $usuario->email=$request->get('email');
          $usuario->password=bcrypt($request->get('contraseña')) ;
          $usuario->update();
          return Redirect::to('admin/usuarios');
     }
     public function destroy($id)
     {
          $sede=Sede::findOrFail($id);
          $sede->estado_sede='3';
          $sede->update();
          return Redirect::to('admin/centro/sede');
     }
}
