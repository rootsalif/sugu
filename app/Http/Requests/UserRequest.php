<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        if($this->path()!== 'admin/user'){
            return [
                'name_user' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255|min:8',
                'pass_conf'=> 'required|min:8|same:password', 
                'phone_user'=>'required|min:8|numeric',
            ];
        }else{
            return [
                'name_user' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|max:255|min:8',
                'pass_conf'=> 'required|min:8|same:password', 
                'phone_user'=>'required|min:8|numeric',
            ];
        }

    }

    public function messages()
    {
        return [
            'name_user.required'=>'Ce champ est requis',
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            'email.unique'=>'Email déjà utilisé',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'le caractère minumum est 8',
            'pass_conf.same'=>'mot de passe sont différents',
            'pass_conf.required'=>'Le mot de passe est requis',
            'pass_conf.min'=>'Le minumum est 8 caractères',            
            'phone_user.required'=>'Ce champ est requis',
        ];
    }
}
