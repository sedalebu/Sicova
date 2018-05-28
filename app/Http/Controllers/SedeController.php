<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests; 


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\SedeFormRequest;
use sicova\Sede;
use DB;

class SedeController extends Controller
{
  public function __construct()
  {
    
  }
  public function index(Request $request)
  {
    if ($request)
    {
     $query=trim($request->get('searchText'));
     $sedes= DB::table('tbl_sede')
     ->where('nombre_sede','LIKE','%'.$query.'%')
     ->orwhere('direccion_sede','LIKE','%'.$query.'%')
     ->orwhere('estado_sede','LIKE','%'.$query.'%')
     
     
         
     ->orderBy('idsede','asc')
     ->paginate(7);
     return view('admin.centro.sede.index',["sedes"=>$sedes,"searchText"=>$query]);
   }
 } 
 public function create()
 {
  return view('admin.centro.sede.create');
}
public function store(SedeFormRequest $request)
{
  $sede=new Sede;
  $sede->nombre_sede=$request->get('sede');
  $sede->direccion_sede=$request->get('direccion');
  $sede->estado_sede='1';
  $sede->save();
  return Redirect::to('admin/centro/sede');
}
public function show($id)
{
  return view("admin.centro.sede.show",["sede"=>Sede::findOrFail($id)]);
}
public function edit($id)
{
  return view("admin.centro.sede.edit",["sede"=>Sede::findOrFail($id)]);
}
public function update(SedeFormRequest $request,$id)
{
 $sede=Sede::findOrFail($id);
 $sede->nombre_sede=$request->get('sede');
 $sede->direccion_sede=$request->get('direccion');
 if ($request->get('estado')==true) {
   $sede->estado_sede='1';
 }else{
   $sede->estado_sede='0';
 }
 $sede->update();
 return Redirect::to('admin/centro/sede');
}
public function destroy($id)
{
  $sede=Sede::findOrFail($id);
  $sede->estado_sede='3';
  $sede->update();
  return Redirect::to('admin/centro/sede');
}
}
