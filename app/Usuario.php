<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable = [
        'estado',
        'tp_user',
        'tipo_documento',
        'documento',
        'name',
        'last_name',
        'genero',
        'email',
        'password'       
    ];
    protected $guarded =[
        
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
