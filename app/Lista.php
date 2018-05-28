<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    /*
		El modelo es el encargdo de gestional las tablas de las bases de datos;
	*/

    protected $table='tbl_respuesta';
    protected $primaryKey='idrespuesta';
    public $timestamps=false;

    protected $filleble=[
      
        'idrespuesta',
        'fecha',
    	'tbl_formulario_idformulario',
        'users_id',
    	'ambiente',
       
    ];
    protected $guarded =[
    	
    ];
}
