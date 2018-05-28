<?php

namespace sicova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroFormularioFormRequest extends FormRequest
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
            
             'tbl_respuesta_idrespuesta'=>'required',
             'tbl_pregunta_idpregunta'=>'required',
             'detallerespuesta'=>'required',
             'observaciones'=>'required',
             


        ];
    }
}
