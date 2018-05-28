<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\FichaFormRequest;
use sicova\Ficha;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class FichaController extends Controller
{
    //'idficha',
    //'codigo',
    //'programa',
    //'jornada',
    //'estado',

     #	
   public function __construct()
   {

   }

     #permite visualizar la paina principal
   public function index(Request $request)     
   {
      if ($request)
      {
        $id=Auth::id();
        
        $query=trim($request->get('searchText'));

        $fichas= DB::table('tbl_ficha as f')

        ->join('tbl_programa as p','f.programa','=','p.idprograma')
        ->where('f.codigo','LIKE','%'.$query.'%')
        ->orwhere('f.estado','LIKE',''.$query.'%')
        
        ->orderBy('f.idficha','desc')

        ->paginate(7);
        return view('admin.gestion.gfichas.index',["fichas"=>$fichas,"searchText"=>$query]);
    }
} 

     #permite retornar a la vista
public function create()
{

    $programas=DB::table('tbl_programa')->get();   
    
    return view('admin.gestion.gfichas.create',["programas"=>$programas]);
}

     #permite almacenar el objeto del modelo en la base de datos y me redirecciona al index nuevamente.
public function store(FichaFormRequest $request)
{
    
    try {    

        DB::beginTransaction();

        $fichas = new Ficha;

        $fichas->codigo=$request->get('codigo');
        $fichas->programa=$request->get('programa');
        $fichas->jornada=$request->get('jornada');
        $fichas->estado=$request->get('estado');
        $fichas->save();           
        
        
        
        DB::commit();
    } catch (\Exception $e) {

        DB::rollback(); 
        
    }       
    
    return Redirect::to('admin/gestion/gfichas');
}

     #permite retornar una vista y envia los datos en una matriz 
public function show($id)
{
     	/*
     	$formularios = DB::table('tbl_formulario as f') 
        ->join('tbl_detalleformulario as df', 'f.idformulario', '=', 'df.tbl_formulario_idformulario')
        ->select('f.idformulario', 'f.fecha', 'f.descripcion','f.version', 'f.estado') 
        //->groupBy('f.idformulario', 'f.fecha', 'f.estado') 
        ->where('f.idformulario','=', $id) 
        ->first(); 
      

      $detalles=DB::table('tbl_detalleformulario as d') 
      ->join('tbl_pregunta as p','d.tbl_pregunta_idpregunta','=','p.idpregunta') 
      ->select('p.idpregunta','p.pregunta','p.descripcion as pdescripcion','p.estado as pestado') 
      ->where('d.tbl_formulario_idformulario','=',$id) 
      ->get(); */

      return view("gestion.gfichas.show", ["fichas"=>Ficha::findOrFail($id)]); 
  }

     # #llama un formulario para modificar los datos de una categoria especifica y envia los datos en una matriz 
  public function edit($id)
  {
    $fic=Ficha::findOrFail($id);
    $programas=DB::table('tbl_programa')->get();
    
    return view("admin.gestion.gfichas.edit",["fic"=>$fic,"programas"=>$programas]);          
}

     #Recibe dos parametros, envia los datos a modificar y redirije la vista a el index
public function update(FichaFormRequest $request,$id)
{
 $ficha=Ficha::findOrFail($id);
 $ficha->codigo=$request->get('codigo');
 $ficha->programa=$request->get('programa');
 $ficha->jornada=$request->get('jornada');
 $ficha->estado=$request->get('estado');
 $ficha->update();
 return Redirect::to('admin/gestion/gfichas');
}

     #permite la destuccion de un objeto y la eliminacion en la base de datos. cambiando el estado del los registros.
public function destroy($id)
{
  $ficha=Ficha::findOrFail($id);
  $ficha->estado='0';
  $ficha->update();
  return Redirect::to('admin/gestion/asignacion');
}


}
