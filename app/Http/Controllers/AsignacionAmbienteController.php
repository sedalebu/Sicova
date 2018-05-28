<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\AsignacionFichaRequest;
use sicova\Http\Requests\AsignacionAmbienteRequest;
use sicova\AsignacionAmbiente;
use sicova\AsignacionFicha;
use sicova\user;
use sicova\Sede;
use sicova\Ambiente;

use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class AsignacionAmbienteController extends Controller
{
  public function __construct()
  {

  }
  public function index(Request $request)
  { 
    if($request){



      $query=trim($request->get('searchText'));
      $ambiasing= DB::table('tbl_asignacionambiente as aa')
      ->join('tbl_ambiente as a','aa.ambiente_idambiente','=','a.idambiente')
      ->join('tbl_ficha as f','aa.tbl_ficha_idficha','=','f.idficha')
      ->join('tbl_programa as p','f.programa','=','p.idprograma')
      ->join('tbl_sede as s','a.sede','=','s.idsede')



      ->select('aa.idasignacionambiente',DB::raw('CONCAT(f.codigo, " - ", p.programa) AS fp '),DB::raw('CONCAT(a.nombre_ambiente," / Sede " ,s.nombre_sede) AS asd'),'a.nombre_ambiente','aa.idasignacionambiente','aa.fecha_asignacion','aa.estado_asgambiente')

      ->where('a.nombre_ambiente','LIKE','%'.$query.'%')
      ->orwhere('s.nombre_sede','LIKE','%'.$query.'%')
      ->orwhere('f.codigo','LIKE','%'.$query.'%')
      ->orwhere('p.programa','LIKE','%'.$query.'%')
      ->orwhere('aa.estado_asgambiente','LIKE','%'.$query.'%')
      ->orderBy('aa.idasignacionambiente','DESC')
      ->paginate(7);


      return view('admin.gestion.asgambiente.index',["ambiasing"=>$ambiasing,"searchText"=>$query]);
    }
  }

  public function create()
  {
    $ambi = DB::table('tbl_ambiente as amb')
    ->join('tbl_sede as sed','amb.sede','=','sed.idsede')
    ->select('amb.idambiente','amb.nombre_ambiente','amb.descripcion','sed.nombre_sede')
    ->get();

    $fich = DB::table('tbl_ficha as fich')
    ->join('tbl_programa as pro','fich.programa','=','pro.idprograma')
    ->select('fich.idficha','fich.codigo','pro.programa','pro.descripcion')
    ->get();


    return view('admin.gestion.asgambiente.create',["ambi"=>$ambi,"fich"=>$fich]);
  }

  public function store(AsignacionAmbienteRequest $request)
{
  try {

    DB::beginTransaction();

    $asigambi=new AsignacionAmbiente;
    $asigambi->ambiente_idambiente=$request->get('ambiente_idambiente');
    $asigambi->tbl_ficha_idficha=$request->get('tbl_ficha_idficha');    
    $mytime = Carbon::now('America/Bogota');
    $asigambi->fecha_asignacion = $mytime->toDateTimeString();
    $asigambi->estado_asgambiente=$request->get('estado_asgambiente');      
    $asigambi->save();

    DB::commit();

  } catch (Exception $e) {

   DB::rollback(); 

 }
 return Redirect::to('admin/gestion/asgambiente');
}

public function edit($id)
{
  $asignacionambiente=AsignacionAmbiente::findOrFail($id);

   $a = DB::table('tbl_ambiente as amb')
    ->join('tbl_sede as sed','amb.sede','=','sed.idsede')
    ->select('amb.idambiente','amb.nombre_ambiente','amb.descripcion','sed.nombre_sede')
    ->get();


    $f= DB::table('tbl_ficha as fich')
    ->join('tbl_programa as pro','fich.programa','=','pro.idprograma')
    ->select('fich.idficha','fich.codigo','pro.programa','pro.descripcion')
    ->get();



  return view("admin.gestion.asgambiente.edit",["asignacionambiente"=>$asignacionambiente,"a"=>$a,"f"=>$f]);
}

public function update(AsignacionAmbienteRequest $request,$id)
{
 $asignacionambiente=AsignacionAmbiente::findOrFail($id);
 $asignacionambiente->tbl_ficha_idficha=$request->get('tbl_ficha_idficha');
 $asignacionambiente->ambiente_idambiente=$request->get('ambiente_idambiente');
 $asignacionambiente->estado_asgambiente=$request->get('estado_asgambiente');  
 $asignacionambiente->update();

 return Redirect::to('admin/gestion/asgambiente');
}

public function destroy($id)
{
  $asignacionambiente=AsignacionAmbiente::findOrFail($id);
  $asignacionambiente->estado_asgambiente='Inactivo';
  $asignacionambiente->update();
  return Redirect::to('admin/gestion/asgambiente');
}

}