<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required|max:100',
            'picture' => 'required|file|max:10240',
            'date' => 'date|required',
            'description' => 'string|max:200',
        ];
    }
}
