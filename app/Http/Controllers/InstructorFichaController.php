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


class InstructorFichaController extends Controller
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
        ->where('af.users_id','=',$id)
        ->orderBy('af.idasignacionficha','asc')
        ->paginate(8);

        return view('instructor.ficha.index',["fichaasing"=>$fichaasing,"searchText"=>$query]);

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
      $as = DB::table('tbl_asignacionficha')->get();
      return view("admin.gestion.asignacion.edit",["asignacionficha"=>$asignacionficha,"usuario"=>$usuario]);

}
public function update(AmbienteFormRequest $request,$id)
     {
       $ambiente=Ambiente::findOrFail($id);
       $ambiente->nombre_ambiente=$request->get('ambiente');
           $ambiente->sede=$request->get('idsede');
           if ($request->get('estado')==true) {
               $ambiente->estado_ambiente='1';
           }else{
               $ambiente->estado_ambiente='2';
           }
       $ambiente->update();
       return Redirect::to('admin/centro/ambiente');
     }
}
