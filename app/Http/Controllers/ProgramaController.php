<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\ProgramaFormRequest;
use sicova\Programa;
use DB;

/*El controlador es el encargado de trabajar asociando las peticiones con los metodos: 

GET: index, create, show, edit.
POST: store.
PUT: update.
DELETE: destroy.
PATCH: uptade.

*/

class ProgramaController extends Controller
{
     #	
     public function __construct()
     {

     }

     #permite visualizar la paina principal
     public function index(Request $request)     
     {
     	if ($request)
     	{
     		$query=trim($request->get('searchText'));
     		$programas= DB::table('tbl_programa')
               ->where('programa','LIKE','%'.$query.'%')
               ->orwhere('estado','LIKE',''.$query.'%')
     		// ->where('condicion','=','1')
     		->orderBy('idprograma','desc')
     		->paginate(7);
     		 return view('admin.gestion.programas.index',["programas"=>$programas,"searchText"=>$query]);
     	}
     } 

     #permite retornar a la vista
     public function create()
     {
     	return view('admin.gestion.programas.create');
     }

     #permite almacenar el objeto del modelo en la base de datos y me redirecciona al index nuevamente.
     public function store(ProgramaFormRequest $request)
     {
     	$programa=new Programa;
     	$programa->programa=$request->get('programa');
     	$programa->descripcion=$request->get('descripcion');
     	$programa->estado=$request->get('estado');
     	$programa->save();
     	return Redirect::to('admin/gestion/programas');
     }

     #permite retornar una vista y envia los datos en una matriz 
     public function show($id)
     {
     	return view("admin.gestion.programas.show",["programa"=>programa::findOrFail($id)]);
     }

     # #llama un formulario para modificar los datos de una categoria especifica y envia los datos en una matriz 
     public function edit($id)
     {          
     	return view("admin.gestion.programas.edit",["programa"=>Programa::findOrFail($id)]);          
     }

     #Recibe dos parametros, envia los datos a modificar y redirije la vista a el index
     public function update(ProgramaFormRequest $request,$id)
     {
     	 $programa=programa::findOrFail($id);
     	 $programa->programa=$request->get('programa');
     	 $programa->descripcion=$request->get('descripcion');
           $programa->estado=$request->get('estado');
     	 $programa->update();
     	 return Redirect::to('admin/gestion/programas');
     }

     #permite la destuccion de un objeto y la eliminacion en la base de datos. cambiando el estado del los registros.
     public function destroy($id)
     {
     	$programa=programa::findOrFail($id);
     	$programa->estado='0';
     	$programa->update();
     	return Redirect::to('admin/gestion/programas');
     }
}
