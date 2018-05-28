<?php

namespace sicova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'estado'=>'',
            'tp_user'=>'',
            'tipo_documento'=>'required|string',
            'documento'=>'required|string',
            'genero'=>'required|string',
            'name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'email'=>'required|max:200|email',  
            'password'=>'max:200|confirmed',     
        ];
    }
}
