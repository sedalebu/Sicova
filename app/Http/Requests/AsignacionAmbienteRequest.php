<?php

namespace sicova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionAmbienteRequest extends FormRequest
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

            //'idasignacionambiente'=>'required',
            'ambiente_idambiente'=>'required',
            'tbl_ficha_idficha'=>'required',
            'estado_asgambiente'=>'required',

        ];
    }
}
