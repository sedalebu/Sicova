<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class AsignacionAmbiente extends Model
{
    protected $table='tbl_asignacionambiente';
    protected $primaryKey='idasignacionambiente';
    public $timestamps=false;

    protected $filleble=[
        'idasignacionambiente',
        'ambiente_idambiente',
        'tbl_ficha_idficha',
        'fecha_asignacion',
        'estado_asgambiente',
        
    ];
    protected $guarded =[
    	
    ];
}
