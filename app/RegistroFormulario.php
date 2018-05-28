<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class RegistroFormulario extends Model
{
    /*
		El modelo es el encargdo de gestional las tablas de las bases de datos;
	*/

    protected $table='tbl_detallerespuesta';|
    protected $primaryKey=' iddetallerespuesta';
    public $timestamps=false;

    protected $filleble=[
      
        'tbl_pregunta_idpregunta',
    	'detallerespuesta',
        'observaciones',
    	

    ];
    protected $guarded =[
    	
    ];
}
