<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaFormRequest extends FormRequest
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
           'nome'    => 'required|min:3|max:30',
           'periodo' => 'required|min:3|max:30',
           'ch'      => 'required|min:2|max:10',
        ];
    }


    public function messages(){
        return [
            'nome.required'    => 'Campo nome é de preenchimento obrigatório',
            'periodo.required' => 'Campo periodo é de preenchimento obrigatório',
            'ch.required'      => 'Campo ch é de preenchimento obrigatório',
            'nome.min'         => 'Campo nome precisa ter no mínimo 3 caracteres',
            'periodo.min'      => 'Campo periodo precisa ter no mínimo 3 caracteres',
            'ch.min'           => 'Campo ch precisa ter no mínimo 2 caracteres',
            'nome.max'         => 'Campo nome precisa ter no máximo 30 caracteres',
            'periodo.max'      => 'Campo periodo precisa ter no máximo 30 caracteres',
            'ch.max'           => 'Campo ch precisa ter no máximo 10 caracteres',
            
        ];
    }
}
