<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ];

        if ($this->method() === 'PUT') {
            $rules['name'] = [
                'sometimes', // O campo é obrigatório apenas se estiver presente
                'string',
                'min:3',
                'max:255',
                //Rule::unique('users')->ignore($this->id),
            ];

            $rules['email'] = [
                'sometimes', // O campo é obrigatório apenas se estiver presente
                'string',
                'email',
                'max:255',
                //Rule::unique('users')->ignore($this->id),
            ];

        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'name.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'name.unique' => 'Este nome já está em uso.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            //'email.unique' => 'Este email já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.', // não aplica unique para senhas hash. pois ela é unica.
        ];
    }
}
