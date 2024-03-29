<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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

            'date_debut'=>'required',
            'date_fin'=>'required',
            'admin_id'=>'required',
        ];
    }
    public function messages()
    {
        return [

            'date_debut.required'=>'Date de debut est requis',
            'date_fin.required'=>'Date de fin est requis',
            'admin_id.required'=>'Selection est requis',

        ];
    }
}
