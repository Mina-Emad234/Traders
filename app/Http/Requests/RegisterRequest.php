<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=>"required",
            "email"=>"required|email|unique:landlord.tenants,email",
            "password"=>"required|confirmed|min:8",
            'domain'=>'required|unique:landlord.tenants,domain'
        ];
    }
    public function messages()
    {
        return [
            "required"=>"field is required",
            "email"=>"type email field",
            "email.unique"=>"Email is already exists in database",
            "domain.unique"=>"Domain is already exists in database",
            "confirmed"=>"confirmed password doesn't match with password",
            "min"=>"password must be more than or equal 8 characters",
        ];
    }
}
