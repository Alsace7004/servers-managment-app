<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Veuillez remplir ce champ',
            'name.string'=>'Veuillez entrer des chaines de caractère',
            'name.min'=>'Trop court...',
            'name.max'=>'Trop long...',
            'email.required'=>'Veuillez remplir ce champ',
            'email.email'=>'Veuillez entrer une adresse mail valide',
            'email.unique'=>'Mail déjà utilisé.',
            'password.required'=>'Veuillez remplir ce champ',
            'password.string'=>'Veuillez entrer des chaines de caractère',
            'password.min'=>'Trop court...',
            'roles.required'=>'Veuillez remplir ce champ...'
        ];
    }
}
