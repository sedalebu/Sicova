<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table='tbl_ambiente';
    protected $primaryKey='idambiente';
    public $timestamps=false;
    
    

    protected $filleble=[
    	'idambiente',
    	'nombre_ambiente',
    	'estado_ambiente',
        'sede'

    ];

     public static function ambientes($id){
        return Ambiente::where('sede','=',$id)
        ->get();
    }

    protected $guarded =[
    	
    ];
}
