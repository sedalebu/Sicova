<?php

namespace sicova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //'fecha'=>'max:500',
            'tbl_formulario_idformulario'=>'',            
            'users_id'=>'',
            'tbl_formulario_idformulario'=>'',
            'ambiente'=>'',
            'tbl_detallerespuesta_iddetallerspuesta'=>'',
            'iddetallerespuesta'=>'',
            'tbl_respuesta_idrespuesta'=>'',
            'tbl_pregunta_idpregunta'=>'',
            'detallerespuesta '=>'',
            'observaciones '=>'max(200)'

            
        ];
    }
}
