<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table='tbl_respuesta';
    protected $primaryKey='idrespuesta';
    public $timestamps=false;

    protected $filleble=[
    	
    	'tbl_formulario_idformulario',
        'users_id',
        'ambiente',
        'tbl_ficha_idficha',

    ];
    protected $guarded =[
    	
    ];
}
