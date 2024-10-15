<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        return [
            'name_admin'=>'required',
            'email'=>'required|email',
            'profession_admin'=>'required',
            'password'=>'required|min:8',
            'pass_conf'=> 'required|min:8|same:password', 
            'phone_admin'=>'required|min:8|numeric',
            'address_admin'=>'required|min:3',
            'path_admin'=>'image',


            'name_enterprise'=>'required|min:3',
            'logo_enterprise'=>'image',
            'font_path_enterprise'=>'image',
            'phone_enterprise'=>'required|min:8|numeric',
            'address_enterprise'=>'required|min:3',
            'describ_enterprise'=>'required|min:50',
            'num_Id_enterprise'=>'required',
            'argument_enterprise'=>'required|min:20',
            'email_enterprise'=>'required|email',
            'created_enterprise'=>'required',
            // 'status_enterprise'=>'required',|before:2024-01-01
    
        ];
    }
    public function messages()
    {
        return [

            'name_admin.required'=>'Ce champ est requis',
            'profession_admin.required'=>'Ce champ est requis',
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            // 'email.exists'=>'Email déjà utilisé',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'le caractère minumum est 8',
            'pass_conf.same'=>'mot de passe sont différents',
            'pass_conf.required'=>'Le mot de passe est requis',
            'pass_conf.min'=>'Le minumum est 8 caractères',            
            'phone_admin.required'=>'Ce champ est requis',
            'address.required'=>'Ce champ est requis',
            'path_admin.image'=>'Type image',


            'name_enterprise.required'=>'Ce champ est requis',
            'name_enterprise.min'=>'Le minumum est 3 caractères',
            'logo_enterprise.image'=>'Type image',
            'font_path_enterprise.image'=>'Type image',
            'phone_enterprise.required'=>'Ce champ est requis',
            'phone_enterprise.min'=>'Le minumum est 8 caractères',
            'phone_enterprise.numeric'=>'Numero phone',
            'address_enterprise.required'=>'Ce champ est requis',
            'address_enterprise.min'=>'Le minumum est 8 caractères',
            'describ_enterprise.required'=>'Ce champ est requis',
            'describ_enterprise.min'=>'Le minumum est 50 caractères',
            'num_Id_enterprise'=>'required',
            'argument_enterprise.required'=>'Ce champ est requis',
            'argument_enterprise.min'=>'Le minumum est 20 caractères',
            'email_enterprise.required'=>'Ce champ est requis',
            'email_enterprise.email'=>'Email non valide',
            // 'email_enterprise.exists'=>'Email déjà utilisé',
            'created_enterprise.required'=>'Ce champ est requis',
        ];
    }
}
