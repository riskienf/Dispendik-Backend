<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required|max:100',
            'email' => 'string|required|max:100|unique:App\Models\User,email',
            'date_of_birth' => 'date|required',
            'phone_number' => 'string|required',
            'password' => 'confirmed|required|string|max:100|min:5',
            'password_confirmation' => 'required|string',
            'institution_id' => 'required|exists:institutions,id',
        ];
    }

    public function attributes()
    {
        return [
            'date_of_birth' => 'tanggal lahir',
            'phone_number' => 'nomor telepon',
            'institution_id' => 'ID institusi',
        ];
    }
}
