<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class AsignacionFicha extends Model
{
    protected $table='tbl_asignacionficha';
    protected $primaryKey='idasignacionficha';
    public $timestamps=false;

    protected $filleble=[

    	'idasignacionficha',
    	'ficha_idficha',
        'users_id',
        'fecha_asignacion',
        'estado_asgficha ',   

    ];
    protected $guarded =[
    	
    ];
}
