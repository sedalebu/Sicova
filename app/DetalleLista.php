<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class DetalleLista extends Model
{
     /*
		El modelo es el encargdo de gestional las tablas de las bases de datos;
	*/

    protected $table='tbl_detallerespuesta';
    protected $primaryKey='iddetallerespuesta';
    public $timestamps=false;

    protected $filleble=[
      
        'iddetallerespuesta',
        'tbl_respuesta_idrespuesta',
    	'tbl_pregunta_idpreguna',
        'detallerespuesta',
    	'observaciones',
        'tbl_detallerespuesta_iddetallerspuesta',


    ];
    protected $guarded =[
    	
    ];
}
