<?php

namespace Domain\Client\Requests;

use Domain\Core\Http\Request as BaseRequest;

class Store extends BaseRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|max:60',
            'cpf'       => 'cpf',
            'birthdate' => 'date|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'cpf.cpf' =>'CPF invalido'
        ];
    }
}
