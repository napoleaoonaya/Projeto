<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Sem permissão de cadastrar e editar deixa false
        //Cadastrar e Editar muda para true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);
        // segment(2) pega na url o valor posts/edit/valor

        $rules = [
            //Todas validações
            'nome' => ['required','min:10','max:255','unique:posts'],
            'email' =>['required', 'min:20', 'max:255'],
            'telefone' =>['required', 'min:10', 'max:20'],
            'inicio_tarefa' =>['required'],
            'termino_tarefa' =>['required'],
            'observacao_tarefa' =>['required']
        ];

        return $rules;
        
    }
}
