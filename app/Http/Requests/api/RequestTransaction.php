<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class RequestTransaction extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|integer',
            'to_id' => 'required|integer',
            'amount_brl' => 'required|integer',
            'password' => 'required|string'
        ];
    }
}
