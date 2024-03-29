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
            'name_business_admin'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'phone_admin'=>'required',
            'address_admin'=>'required',

        ];
    }
    public function messages()
    {
        return [

            'name_admin.required'=>'Ce champ est requis',
            'name_business_admin.required'=>'Ce champ est requis',
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'le caractère minumum est 8',
            'phone_admin.required'=>'Ce champ est requis',
            'address.required'=>'Ce champ est requis',

        ];
    }
}
