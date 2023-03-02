<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name'          =>'required|string|unique:roles,name|min:2|max:20',
            'guard_name'    =>'required|string',
            'permission'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Veuillez remplir ce champ',
            'name.unique'   =>'Cette valeur existe déjà',
            'name.min'      =>'Trop court',
            'name.max'      =>'Trop long',
            'permission.required'=>'Veuillez choisir une permission',
        ];
    }
}
