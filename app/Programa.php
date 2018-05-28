<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    /*
		El modelo es el encargdo de gestional las tablas de las bases de datos;
	*/

    protected $table='tbl_programa';
    protected $primaryKey='idprograma';
    public $timestamps=false;

    protected $filleble=[
        'idprograma',
    	'programa',
    	'descripcion',
    	'estado',

    ];
    protected $guarded =[
    	
    ];
}
