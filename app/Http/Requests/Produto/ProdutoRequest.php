<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome_produto' => ['required', 'unique:produtos,nome_produto'],
            'tipo_produto' => 'required',
            'preco' => ['required', 'numeric']
        ];
    }

    public function attributes()
    {
        return [
            'nome_produto' => 'nome do produto',
            'tipo_produto' => 'tipo do produto',
            'preco' => 'preço'
        ];
    }
}
