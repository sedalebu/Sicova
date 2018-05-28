<?php

namespace sicova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilFormRequest extends FormRequest
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
            'nombres'=>'required|max:100',
            'apellidos'=>'required|max:100',
            'email'=>'required|max:200|email',  
            'contraseña'=>'required|max:200',     
        ];
    }
}
