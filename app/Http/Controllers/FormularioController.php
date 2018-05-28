<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\FormularioFormRequest;

use sicova\Formulario;
use sicova\DetalleFormulario;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class FormularioController extends Controller
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
     		$formularios= DB::table('tbl_formulario')
               ->where('descripcion','LIKE','%'.$query.'%')
               ->orwhere('estado','LIKE','%'.$query.'%')
     		// ->where('condicion','=','1')
     		->orderBy('idformulario','desc')
     		->paginate(7);
     		 return view('admin.gestion.formularios.index',["formularios"=>$formularios,"searchText"=>$query]);
     	}
     } 

     #permite retornar a la vista
     public function create()
     {

        $preguntas=DB::table('tbl_pregunta as p')
        //->join('tbl_detalleformulario as df','p.idpregunta','=','df.tbl_pregunta_idpregunta')
        ->select(DB::raw('CONCAT(p.idpregunta, " - ",p.pregunta) AS preguntaconcat'),'p.idpregunta','p.pregunta','p.descripcion')
        ->where('p.estado','=','1')
   
        ->get();   
        $formularios=DB::table('tbl_formulario')->where('estado','=','1')->get();   
        return view('admin.gestion.formularios.create',["preguntas"=>$preguntas,"formularios"=>$formularios]);
     }

     #permite almacenar el objeto del modelo en la base de datos y me redirecciona al index nuevamente.
     public function store(FormularioFormRequest $request)
     {
        
        try {   
            DB::beginTransaction();

            $formulario = new Formulario;
            $mytime = Carbon::now('America/Bogota');
            $formulario->fecha = $mytime->toDateTimeString();

            $formulario->descripcion=$request->get('descripcion');
            $formulario->version=$request->get('version');
            $formulario->estado=$request->get('estado');
            $formulario->save();           
            
            $idpregunta=$request->get('tbl_pregunta_idpregunta');            
            $contador=$request->get('contador');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idpregunta))
            {  
                # code...
                $detalle = new DetalleFormulario();
                $detalle->tbl_formulario_idformulario=$formulario->idformulario;
                $detalle->tbl_pregunta_idpregunta=$idpregunta[$cont];
                $detalle->save();
                $cont=$cont+1; 
            }
        
            DB::commit();
            } catch (\Exception $e) {

            DB::rollback(); 
        }       
          
       	return Redirect::to('admin/gestion/formularios');
     }

     #permite retornar una vista y envia los datos en una matriz 
     public function show($id)
     {
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
      ->get(); 

      return view("admin.gestion.formularios.show", ["formularios"=>$formularios,"detalles"=>$detalles]); 
     }

     # #llama un formulario para modificar los datos de una categoria especifica y envia los datos en una matriz 
     public function edit($id)
     {          
     	return view("admin.gestion.formularios.edit",["formulario"=>Formulario::findOrFail($id)]);          
     }

     #Recibe dos parametros, envia los datos a modificar y redirije la vista a el index
     public function update(FormularioFormRequest $request,$id)
     {
     	 $formulario=pregunta::findOrFail($id);
     	 $formulario->descripcion=$request->get('descripcion');
     	 $formulario->version=$request->get('version');
         $formulario->estado=$request->get('estado');
     	 $formulario->update();
     	 return Redirect::to('admin/gestion/formularios');
     }

     #permite la destuccion de un objeto y la eliminacion en la base de datos. cambiando el estado del los registros.
     public function destroy($id)
     {
     	$formulario=Formulario::findOrFail($id);
     	$formulario->estado='0';
     	$formulario->update();
     	return Redirect::to('admin/gestion/formularios');
     }
}
