<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Request\RegistroFormularioFormRequest;
use sicova\Http\Request\RespuestaFormRequest;
use sicova\RegistroFormulario;
use sicova\Respuesta;
use Illuminate\Support\Facades\Auth;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class RespuestaController extends Controller
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
            $dresta= DB::table('tbl_detallerespuesta as dta')
            ->join('tbl_respuesta as rta','dta.tbl_respuesta_idrespuesta','=','rta.idrespuesta')

            ->orderBy('idrespuesta','desc')
            ->paginate(7);
            return view('admin.gestion.registroformulario.index',["dresta"=>$dresta,"searchText"=>$query]);
        }
    } 
}
