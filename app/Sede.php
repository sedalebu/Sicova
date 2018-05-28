<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table='tbl_sede';
    protected $primaryKey='idsede';
    public $timestamps=false;

    protected $filleble=[
    	'idsede',
    	'nombre_sede',
    	'direccion_sede',
        'estado_sede'

    ];
    protected $guarded =[
    	
    ];
}
