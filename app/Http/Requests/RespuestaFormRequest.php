<?php

namespace sicova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespuestaFormRequest extends FormRequest
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
            'tbl_formulario_idformulario'=>'required',
            'users_id'=>'required',
            'ambiente'=>'required',
            'tbl_ficha_idficha',
            
        ];
    }
}
