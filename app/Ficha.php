<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    /*
		El modelo es el encargdo de gestional las tablas de las bases de datos;
	*/

    protected $table='tbl_ficha';
    protected $primaryKey='idficha';
    public $timestamps=false;

    protected $filleble=[
        'idficha',
    	'codigo',
    	'programa',
    	'jornada',
    	'estado',

    	

    ];
    protected $guarded =[
    	
    ];
}
