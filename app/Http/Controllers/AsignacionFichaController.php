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
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class AsignacionFichaController extends Controller
{

 public function __construct()
 {

 }
 public function index(Request $request)
 { 
  if($request){

    $id=Auth::id();

    $query=trim($request->get('searchText'));
    $fichaasing= DB::table('tbl_asignacionficha as af')

    ->join('tbl_ficha as f','af.ficha_idficha','=','f.idficha')
    ->join('users as u','af.users_id','=','u.id')
    ->select('af.idasignacionficha','f.codigo','u.name','u.last_name','af.fecha_asignacion','af.estado_asgficha as est')
        //->where('af.users_id','=','f.$idficha')
    ->orderBy('af.idasignacionficha','asc')
    ->paginate(8);

    return view('admin.gestion.asignacion.index',["fichaasing"=>$fichaasing,"searchText"=>$query]);

  }
}
public function create()
{
  $ficha=DB::table('tbl_ficha')->get();
  $id=DB::table('users')->get();

  return view('admin.gestion.asignacion.create',["ficha"=>$ficha,"id"=>$id]);
}
public function show()
{
  return view("admin.gestion.asignacion.show");
}
public function store(AsignacionFichaRequest $request)
{
  try {

    DB::beginTransaction();

    $asigficha=new AsignacionFicha;
    $asigficha->ficha_idficha=$request->get('ficha_idficha');
    $asigficha->users_id=$request->get('users_id');    
    $mytime = Carbon::now('America/Bogota');
    $asigficha->fecha_asignacion = $mytime->toDateTimeString();
    $asigficha->estado_asgficha=$request->get('estado_asgficha');      
    $asigficha->save();



    DB::commit();



  } catch (Exception $e) {

   DB::rollback(); 

 }
 return Redirect::to('admin/gestion/asignacion');
}

public function edit($id)
{


  $asignacionficha=AsignacionFicha::findOrFail($id);
  $usuario = DB::table('users')->get();
  $ficha = DB::table('tbl_ficha')->get();
  return view("admin.gestion.asignacion.edit",["asignacionficha"=>$asignacionficha,"usuario"=>$usuario,"ficha"=>$ficha]);

}
public function update(AsignacionFichaRequest $request,$id)
{
 $asignacionficha=AsignacionFicha::findOrFail($id);
 $asignacionficha->ficha_idficha=$request->get('ficha_idficha');
 $asignacionficha->users_id=$request->get('users_id');
 $asignacionficha->estado_asgficha=$request->get('estado_asgficha');  
 $asignacionficha->update();
 return Redirect::to('admin/gestion/asignacion');
}
public function destroy($id)
{
  $asignacionficha=AsignacionFicha::findOrFail($id);
  $asignacionficha->estado='Inactivo';
  $asignacionficha->update();
  return Redirect::to('admin/gestion/asignacion');
}

}
