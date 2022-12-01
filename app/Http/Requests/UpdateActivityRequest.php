<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required|max:100',
            'picture' => 'file|max:10240',
            'date' => 'date|required',
            'description' => 'string|max:200',
        ];
    }
}
