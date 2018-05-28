<?php

namespace sicova;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable = [
        'name', 'email', 'password','last_name','tipo_documento','documento','estado','tp_user','genero'
    ];
    protected $guarded =[
        
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
