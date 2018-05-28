<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests; 


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\AmbienteFormRequest;
use sicova\Ambiente;
use DB;


class AmbienteController extends Controller
{
 public function __construct()
 {

 }
 public function index(Request $request)
 {
    if ($request)
    {
        $query=trim($request->get('searchText'));
        
        $ambientes= DB::table('tbl_ambiente as a')

        ->join('tbl_sede as s','a.sede','=','s.idsede')
        ->select('a.idambiente','a.nombre_ambiente','a.estado_ambiente','s.nombre_sede as nsede','s.idsede as dsede')
        ->where('a.nombre_ambiente','LIKE','%'.$query.'%')
        ->orwhere('s.nombre_sede','LIKE','%'.$query.'%')
        ->orwhere('a.estado_ambiente','!=','3')
        ->orderBy('a.idambiente','asc')
        ->paginate(7);
        return view('admin.centro.ambiente.index',["ambientes"=>$ambientes,"searchText"=>$query]);
   }
} 
public function create()
{
    $sedes=DB::table('tbl_sede')->where('estado_sede','=','1')->get();
    return view('admin.centro.ambiente.create',["sedes"=>$sedes]);
}
public function store(AmbienteFormRequest $request)
{
     $ambiente=new Ambiente;
     $ambiente->nombre_ambiente=$request->get('ambiente');
     $ambiente->sede=$request->get('idsede');
     $ambiente->estado_ambiente='1';
     $ambiente->save();
     return Redirect::to('admin/centro/ambiente');
}
public function show($id)
{
    return view("admin.centro.ambiente.show",["ambiente"=>Ambiente::findOrFail($id)]);
}
public function edit($id)
{

    $ambiente=Ambiente::findOrFail($id);
    $sedes=DB::table('tbl_sede')->where('estado_sede','=','1')->get();
    return view("admin.centro.ambiente.edit",["ambiente"=>$ambiente,"sedes"=>$sedes]);
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
public function destroy($id)
{
    $ambiente=Ambiente::findOrFail($id);
    $ambiente->estado_ambiente='0';
    $ambiente->update();
    return Redirect::to('admin/centro/ambiente');
}
}
