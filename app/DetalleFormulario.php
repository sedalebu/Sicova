<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class DetalleFormulario extends Model
{
    /*
		El modelo es el encargdo de gestional las tablas de las bases de datos;
	*/

    protected $table='tbl_detalleformulario';
    protected $primaryKey='iddetalleformulario';
    public $timestamps=false;

    protected $filleble=[
        'iddetalleformulario',
        'tbl_formulario_idformulario',
        'tbl_pregunta_idpregunta',

    ];
    protected $guarded =[
    	
    ];
}
