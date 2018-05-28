<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Request\RegistroFormularioFormRequest;
use sicova\Http\Request\RespuestaFormRequest;
use sicova\RegistroFormulario;
use sicova\Respuesta;
use sicova\Ficha;
use sicova\AsignacionFicha;
use Illuminate\Support\Facades\Auth;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class RegistroFormularioController extends Controller
{
	public function __construct()
	{

	}

     #permite visualizar la paina principal
	public function index(Request $request)     
	{
		if ($request)
		{
			$query=trim($request->get('searchText'));
			$resta= DB::table('tbl_respuesta as r')

			->join('tbl_formulario as f','r.tbl_formulario_idformulario','=','f.idformulario')
			->join('users as u','r.users_id','=','u.id')
			->join('tbl_ambiente as a','r.ambiente','=','a.idambiente')
			->join('tbl_sede as s','a.sede','=','s.idsede')
			->join('tbl_ficha as fa','r.tbl_ficha_idficha','=','fa.idficha')
			->join('tbl_programa as p','fa.programa','=','p.idprograma')
			

			->select('r.fecha','f.version','f.descripcion','u.name','u.last_name','a.nombre_ambiente','s.nombre_sede','fa.codigo','p.programa')



			
			->orderBy('idrespuesta','desc')
			->paginate(7);
			return view('admin.gestion.registroformulario.index',["resta"=>$resta,"searchText"=>$query]);
		}
	} 

	#permite retornar a la vista para crear
	public function create()
	{ 
		$id = Auth::id();
	
		$respuesta=DB::table('users as us')
		->join('tbl_asignacionficha as asgf','us.id','=','asgf.users_id')
		->join('tbl_ficha as fa','asgf.ficha_idficha','=','fa.idficha')
		->join('tbl_programa as pr','fa.programa','=','pr.idprograma')
		->join('tbl_asignacionambiente as asga','fa.idficha','=','asga.tbl_ficha_idficha')
		->join('tbl_ambiente as am','asga.ambiente_idambiente','=','am.idambiente')
		->join('tbl_sede as se','am.sede','=','se.idsede')

		->select('us.id','us.name','us.last_name','fa.codigo','fa.idficha','fa.codigo','pr.idprograma','pr.programa','pr.descripcion','am.idambiente','am.nombre_ambiente','se.idsede','se.nombre_sede')

		->get();


		

		

		return view('admin.gestion.registroformulario.create',["respuesta"=>$respuesta]);
	}

	//Corresponde con una ruta que devuelve todos los niveles de ficha, Recibicmo desde la ruta el id del proyecto
	public function byFicha($id)
	{
		//devolvemos los niveles por medio de una consulta
      $agficha=DB::table('tbl_asignacionficha as asgf')
      ->join('users as us','asgf.users_id','=','us.id')
      ->join('tbl_ficha as fi','asgf.ficha_idficha','=','fi.idficha')
	  ->where('id','=',''.$id.'')
	  ->select('fi.idficha','fi.codigo')
	  ->get();
		return $agficha;

	//	return Ficha::where('idficha',$id)->get();
	}
	public function byAmbiente($id)
	{
		//devolvemos los niveles por medio de una consulta
    $agambiente=DB::table('tbl_asignacionambiente as asga')
    ->join('tbl_ficha as fi','asga.tbl_ficha_idficha','=','fi.idficha')
    ->join('tbl_ambiente as am','asga.ambiente_idambiente','=','am.idambiente')
    ->where('fi.idficha','=',''.$id.'')
    ->select('am.idambiente','am.nombre_ambiente')
    ->get();
		return $agambiente;

	//	return Ficha::where('idficha',$id)->get();
	}
}	 