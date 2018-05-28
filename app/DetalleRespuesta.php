<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class DetalleRespuesta extends Model
{
    protected $table='tbl_detallerespuesta';
    protected $primaryKey='iddetallerespuesta';
    public $timestamps=false;

    protected $filleble=[
    	'iddetallerespuesta',
    	'tbl_respuesta_idrespuesta',
    	'tbl_pregunta_idpregunta',
        'detallerespuesta',
        'observaciones'

    ];
    protected $guarded =[
    	
    ];
}
