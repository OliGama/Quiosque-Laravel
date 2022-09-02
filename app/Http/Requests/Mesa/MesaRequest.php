<?php

namespace App\Http\Requests\Mesa;

use Illuminate\Foundation\Http\FormRequest;

class MesaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'numero' => 'required',
            'ocupada'
        ];
    }
    
}
