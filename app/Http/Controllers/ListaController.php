<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

//use sicova\http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\http\Request\ListaFormRequest;

use sicova\Lista;
use sicova\DetalleLista;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;




class ListaController extends Controller
{
    #	
     public function __construct()
     {

     }

     #permite visualizar la paina principal
     public function index()     
     {
        return view('instructor.lista.index');//,"searchText"=>$query
     	
        /*if ($request)
     	{
     		$query=trim($request->get('searchText'));
     		$lista= DB::table('tbl_respuesta as r')
     			//->join('users as u','r.users_id','=','u.id')
     			//->join('tbl_formulario as f','r.tbl_formulario_idformulario','=','f.idformulario')
     			//->join('tbl_detallerespuesta as dr','r.tbl_detallerespuesta','=','dr.iddetallerespuesta')
     			//->join('tbl_ambiente as a','r.ambiente','=','a.idambiente')
             	//->where('','LIKE','%'.$query.'%')
             	//->orwhere('estado','LIKE',''.$query.'%')
     			//->where('condicion','=','1')
     			->orderBy('idrespuesta','desc')
     			->paginate(7);
     		 return view('instructor.lista.index',["lista"=>$lista]);//,"searchText"=>$query
     	}*/
     } 

}
